<!-- inherite master template app.blade.php -->
@extends('layouts.nav')
<!-- define the content section -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="card">
                <div class="card-header">Create an new Animal</div>
                <!-- display the errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul> @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li> @endforeach
                        </ul>
                    </div><br /> @endif
            <!-- display the success status -->
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div><br /> @endif
            <!-- define the form -->
                <div class="card-body">
                    <form class="form-horizontal" method="POST"
                          action="{{url('animals') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-8">
                            <label >Name</label>
                            <input type="text" name="name"
                                   placeholder="Name" />
                        </div>
                        <div class="col-md-8">
                            <label>Date of Birth</label>
                            <input type="date" name="date_of_birth" placeholder=""/>

                        </div>
                        <div class="col-md-8">
                            <label >Description</label>
                            <textarea rows="4" cols="50" name="description">Details... </textarea>
                        </div>
                        <div class="col-md-8">
                            <label >Type</label>
                            <select name="type" >
                                <option value="Mammal">Mammal</option>
                                <option value="Bird">Bird</option>
                                <option value="Fish">Fish</option>
                                <option value="Reptile">Reptile</option>
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
                            <label>Image</label>
                            <input type="file" class="form-control" name="pictures[]"
                                   placeholder="Image file"  multiple/>
                        </div>
                        <div class="col-md-6 col-md-offset-4">
                            <input type="submit" class="btn btn-primary" />
                            <input type="reset" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection