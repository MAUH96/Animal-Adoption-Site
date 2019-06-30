<?php

namespace App\Http\Controllers;

use App\AnimalsDb;
use App\ImagesDbs;
use Illuminate\Http\Request;

class AnimalsDbsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // create store edit etc.. are each of the methods below.
        $this->middleware('admin', ['only' => ['create', 'store', 'edit', 'update', 'destroy', 'deleteimage']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Illuminate\Support\Facades\Gate::allows('admin', auth()->user())) {
            $animals = AnimalsDb::sortable()->paginate(5);
            if (request()->has('type')){
                $animals = AnimalsDb::where('type',request('type'))->paginate(5)->appends('type', request('type'));
            }
        } else {
            $animals = AnimalsDb::sortable()->where('availability', "!=", 'no')->paginate(5);
            if (request()->has('type')){
                $animals = AnimalsDb::where('type',request('type'))->paginate(5)->appends('type', request('type'));
            }

        }

        return view('animals.index', compact('animals'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('animals.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // form validation
        $animal = $this->validate(request(), [
            'name' => 'required',
            'date_of_birth' => 'required|date',
            'pictures' => 'sometimes',
            'pictures.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);

        // create a Animal object and set its values from the input
        $animal = new AnimalsDb;

        $animal->name = $request->input('name');
        $animal->user_id = auth()->user()->id;
        $animal->date_of_birth = $request->input('date_of_birth');
        $animal->description = $request->input('description');
        $animal->type = $request->input('type');
        $animal->availability = $request->input('availability');
        $animal->created_at = now();

        $animal->save();

        $pictures = array();
        //Handles the uploading of the image
        if ($files = $request->file('pictures')) {

            foreach ($files as $file) {
                //Gets the filename with the extension
                $fileNameWithExt = $file->getClientOriginalName();
                //just gets the filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //Just gets the extension
                $extension = $file->getClientOriginalExtension();
                //Gets the filename to store
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                //Uploads the image
                $path = $file->storeAs('storage/images', $fileNameToStore);

                $file->move('storage/images', $fileNameToStore);
                $pictures[] = $fileNameToStore;

                $image = new ImagesDbs();
                $image->user_id = auth()->user()->id;
                $image->animal_id = $animal->id;
                $image->image = $fileNameToStore;
                $image->save();
            }


        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $animal->picture_count = ImagesDbs::where('animal_id', $animal->id)->count();
        $animal->save();
// generate a redirect HTTP response with a success message
        return back()->with('success', 'Animal has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = AnimalsDb::find($id);
        $images = ImagesDbs::where('animal_id', $id)->get();
        return view('animals.show', ['animal' => $animal, 'images' => $images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = AnimalsDb::find($id);
        $images = ImagesDbs::where('animal_id', $id)->get();
        return view('animals.edit', compact('animal'), compact('images'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $animal = AnimalsDb::find($id);
        $this->validate(request(), [
            'name' => 'required',
            'date_of_birth' => 'required|date',
            'pictures.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);
        $animal->name = $request->input('name');
        $animal->date_of_birth = $request->input('date_of_birth');
        $animal->description = $request->input('description');
        $animal->type = $request->input('type');
        $animal->availability = $request->input('availability');
        $animal->updated_at = now();


        $pictures = array();
        //Handles the uploading of the image
        if ($files = $request->file('pictures')) {

            foreach ($files as $file) {
                //Gets the filename with the extension
                $fileNameWithExt = $file->getClientOriginalName();
                //just gets the filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //Just gets the extension
                $extension = $file->getClientOriginalExtension();
                //Gets the filename to store
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                //Uploads the image
                $path = $file->storeAs('storage/images', $fileNameToStore);

                $file->move('storage/images', $fileNameToStore);
                $pictures[] = $fileNameToStore;

                $image = new ImagesDbs;
                $image->user_id = auth()->user()->id;
                $image->animal_id = $animal->id;
                $image->image = $fileNameToStore;
                $image->save();
            }


        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $animal->picture_count = ImagesDbs::where('animal_id', $animal->id)->count();
        $animal->save();
        return redirect('animals/'. $animal->id)->with('success', 'Animal has been updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $animal = AnimalsDb::find($id);
        $animal->delete();
        return redirect('animals')->with('success', 'Animal has been deleted');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int id
     * @param  int $image_id
     * @return \Illuminate\Http\Response
     */
    public function deleteimage($id, $image_id)
    {

        $image = ImagesDbs::find($image_id);
        $animal = AnimalsDb::find($id);
        $animal->picture_count --;
        $animal->save();
        $image->delete();

        return redirect('animals/'.$id.'/edit')->with('success', 'Image: '.$image->image.' has been deleted');

    }


    //
}
