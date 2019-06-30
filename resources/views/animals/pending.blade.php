@extends('layouts.nav')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card" style="width: 55rem;">
                    <div class="card-header">Pending Adaptions</div>
                    <!-- display the success status -->
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br/> @endif
                    <div class="card-body">

                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                @can ('admin', auth()->user())
                                    <th>Username</th>
                                @endcan
                                <th>@sortablelink('name', 'Name')</th>
                                <th>@sortablelink('date_of_birth', 'Date Of Birth')</th>
                                <th>Description</th>
                                    <th>Type</th>
                                <th>Action</th>
                                <th>Status</th>
                                @can ('admin', auth()->user())
                                    <th>Approve</th>
                                    <th>Reject</th>
                                    @else
                                        <th>Delete</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @cannot('admin', auth()->user())
                                @foreach($requests as $request)
                                    @if (auth()->user()->id == $request['user_id'])

                                        <tr>
                                            <td>{{App\AnimalsDb::find($request['animal_id'])['name']}}</td>
                                            <td>{{\Carbon\Carbon::parse(App\AnimalsDb::find($request['animal_id'])['date_of_birth'])->format('d/m/Y')}}</td>
                                            <td>{{App\AnimalsDb::find($request['animal_id'])['description']}}</td>
                                            <td>{{App\AnimalsDb::find($request['animal_id'])['type']}}</td>
                                            <td>
                                                <a href="{{action('AnimalsDbsController@show', App\AnimalsDb::find($request['animal_id'])['id'])}}"
                                                   class="btn
btn-primary">Details</a></td>
                                            <td><b class="btn btn-warning">{{$request['status']}}</b></td>

                                            <td>
                                                <a href="{{action('RequestsDbsController@delete', $request['id']) }}"
                                                   class="btn
btn-danger">Delete</a></td>


                                        </tr>
                                    @endif

                                @endforeach
                            @endcan
                            @can('admin', auth()->user())
                                @foreach($requests as $request)

                                    <tr>
                                        <td>{{App\UsersDbs::find($request['user_id'])['name']}}</td>
                                        <td>{{App\AnimalsDb::find($request['animal_id'])['name']}}</td>
                                        <td>{{\Carbon\Carbon::parse(App\AnimalsDb::find($request['animal_id'])['date_of_birth'])->format('d/m/Y')}}</td>
                                        <td>{{App\AnimalsDb::find($request['animal_id'])['description']}}</td>
                                        <td>{{App\AnimalsDb::find($request['animal_id'])['type']}}</td>
                                        <td>
                                            <a href="{{action('AnimalsDbsController@show', App\AnimalsDb::find($request['animal_id'])['id'])}}"
                                               class="btn
btn-primary">Details</a></td>


                                        <td><b class="btn btn-warning">{{$request['status']}}</b></td>

                                        <td>
                                            <a href="{{ action('RequestsDbsController@approve', [$request['id'],$request['animal_id'] ])}}"
                                               class="btn
btn-primary">Approve</a></td>
                                        <td>
                                            <a href="{{action('RequestsDbsController@reject', $request['id'])}}"
                                               class="btn
btn-danger">Reject</a></td>
                                    </tr>

                                @endforeach
                            @endcan
                            </tbody>
                        </table>
                        @can ('admin', auth()->user())
                            {{$requests->links()}}
                        @else
                            @if (auth()->user()->id == $requests['user_id'])
                                {{$requests->links()}}
                            @endif
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection