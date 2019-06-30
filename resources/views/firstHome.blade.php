@extends('layouts.nav')

@section('content') <!---is in the app.blade.php-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welcome to Aston Animal Sanctuary</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in as
                        @cannot('admin', auth()->user())
                            {{auth()->user()->name}} - Public User
                        @endcan
                        @can('admin', auth()->user())
                            {{auth()->user()->name}} - Staff
                        @endcan
                        !
                    </div>
                </div>

                @cannot('admin', auth()->user())
                    <div class="card">
                        <div class="card-header">Animals available for adaption</div>

                        <div class="card-body">
                            <a href="{{url('animals') }}">Animals available for adaption</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">Make Adaption Request</div>

                        <div class="card-body">
                            <a href="{{url('animals/request') }}">Make Adaption Request</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">View All Pending Adaption Request</div>

                        <div class="card-body">
                            <a href="{{url('animals.request') }}">View All Pending Adaption Request</a>
                        </div>
                    </div>
                @endcan
                @can ('admin', auth()->user())
                    <div class="card">
                        <div class="card-header">List of all Animals in the system</div>

                        <div class="card-body">
                            <a href="{{url('animals') }}">List of all Animals in the system</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Add an animal to the system</div>

                        <div class="card-body">
                            <a href="{{url('animals/create') }}">Add an animal to the system</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Pending Requests</div>

                        <div class="card-body">
                            <a href="{{url('animals/pending') }}">Pending Requests</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">View All Request</div>

                        <div class="card-body">
                            <a href="{{url('animals/request') }}">View All Requests</a>
                        </div>
                    </div>
                @endcan

            </div>
        </div>
    </div>
@endsection
