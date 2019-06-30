@extends('layouts.nav')
@section('content')
    <div class="container" xmlns:width="http://www.w3.org/1999/xhtml" xmlns:object-fit="http://www.w3.org/1999/xhtml">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">Edit and update an Animal</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br/>
                    @endif
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br/>
                    @endif
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ action('AnimalsDbsController@update',
$animal['id']) }} " enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="col-md-8">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$animal->name}}"/>
                            </div>
                            <div class="col-md-8">
                                <label>Date of Birth</label>
                                <input type="date" name="date_of_birth" value={{$animal->date_of_birth}}
                                />

                            </div>
                            <div class="col-md-8">
                                <label>Description</label>
                                <textarea rows="4" cols="50" name="description"> {{$animal->description}}
</textarea>
                            </div>
                            <div class="col-md-8">
                                <label >Type</label>
                                <select name="type" value="{{$animal->type}}">
                                    <option value="Mammal" {{ $animal->type == 'Mammal' ? 'selected' : '' }}>Mammal</option>
                                    <option value="Bird" {{ $animal->type == 'Bird' ? 'selected' : '' }}>Bird</option>
                                    <option value="Fish" {{ $animal->type == 'Fish' ? 'selected' : '' }}>Fish</option>
                                    <option value="Reptile" {{ $animal->type == 'Reptile' ? 'selected' : '' }}>Reptile</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label>Availability</label>
                                <select name="availability">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>

                            </div>
                            <div class="col-md-8">
                                <label>Add more Images</label>
                                <input type="file" class="form-control" name="pictures[]"/>
                            </div><p>
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-primary"/>
                                <input type="reset" class="btn btn-primary"/>
                                <button onclick="{{back()}}" class="btn btn-primary">Back</button>
                            </div>
                            </p>
                            @if ($animal->picture_count != 0)
                            <div class="col-md-8">
                                <label>Remove any images</label>
                                <div class="image-contents display-container-image">


                                    @foreach($images as $image)

                                        <a href="{{action('AnimalsDbsController@deleteimage',
[$animal->id , $image['id'] ])}}"> &#10006; </a>
                                        {{$image->image}}

                                            <img src={{asset('storage/images/'.$image->image)}} style="height: 100%; width: 100%; object-fit: contain"/>

                                    @endforeach
                                </div>
                            </div>
@endif

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection