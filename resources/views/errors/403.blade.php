<!-- inherite master template app.blade.php -->
@extends('layouts.nav')
<!-- define the content section -->
@section('content')
    @guest
        <script>window.location = "/login";</script>
    @else
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                <div class="card">
                    <div class="card-header">Unauthorized Access</div>
                    <div class="card-body">
                    <div class="alert alert-danger">
                        You are accessing a page which you are not authorized to use.
                    </div>
                        <button type="submit" onclick="location.href = '/home';" class="btn btn-primary">
                            Back
                        </button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endguest
@endsection
