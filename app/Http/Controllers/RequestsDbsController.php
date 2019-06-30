<?php

namespace App\Http\Controllers;

use App\AnimalsDb;
use App\RequestsDbs;

class RequestsDbsController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['approve', 'reject']]);
        $this->middleware('users', ['only' => ['request', 'delete']]);
    }

    public function pending()
    {
        $requests = RequestsDbs::where('status', 'Pending')->paginate(5);
        $animal = AnimalsDb::where('id','pending')->paginate(5);

        return view('animals.pending', compact('requests'), compact('animal'));

    }

    public function show()
    {


        $requests = RequestsDbs::where('status', '!=', 'Pending')->paginate(5);


        return view('animals.request', compact('requests'));

    }

    public function request($id)
    {


        $request = new RequestsDbs;
        $request->user_id = auth()->user()->id;
        $request->animal_id = $id;
        $request->created_at = now();

        $request->save();


        // generate a redirect HTTP response with a success message
        return redirect('animals/pending')->with('success', 'Request has been made');

    }

    public function approve($id, $animal_id)
    {

        $request = RequestsDbs::find($id);
        $request->status = "Approved";

        $request->save();

        $animal = AnimalsDb::find($request['animal_id']);
        $animal->availability = "no";
        $animal->save();

        $request2 = RequestsDbs::where('animal_id', $animal_id)->where('id', '!=', $id);

        $request2->update(array('status' => 'Rejected'));


        return redirect('animals/request')->with('success', 'Request Approved');

    }

    public function reject($id)
    {

        $request = RequestsDbs::find($id);
        $request->status = "Rejected";
        $request->save();

        $animal = AnimalsDb::find($request['animal_id']);
        $animal->availability = "yes";
        $animal->save();
        return redirect('animals/request')->with('success', 'Request Rejected');

    }

    public function delete($id)
    {

        $request = RequestsDbs::find($id);
        $request->delete();

        return redirect('animals/pending')->with('success', 'Request Deleted');

    }


}
