<!-- inherite master template app.blade.php -->
@extends('layouts.nav')
<!-- define the content section -->
@section('content')
    @auth
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 ">
                    <div class="card">
                        <div class="card-header">Page Not Found!</div>
                        <div class="card-body">
                            <div class="alert alert-danger">
                                Please check the link.
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

    @else
        <script>window.location = "/login";</script>
    @endauth
@endsection
