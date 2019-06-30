@extends('layouts.nav')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card" style="width: 55rem;">
                    <div class="card-header">Display all Animals</div>
                    <div class="card-body">
                        Filters:
                        <select name="type" onchange="location = this.value;">
                            <option value="animals">No Filter</option>
                            <option value="animals/?type=Mammal" {{ $_SERVER['REQUEST_URI'] == '/animals?type=Mammal' ? 'selected' : '' }}>Mammal</option>
                            <option value="animals/?type=Bird" {{ $_SERVER['REQUEST_URI'] == '/animals?type=Bird' ? 'selected' : '' }}>Bird</option>
                            <option value="animals/?type=Fish" {{ $_SERVER['REQUEST_URI'] == '/animals?type=Fish' ? 'selected' : '' }}>Fish</option>
                            <option value="animals/?type=Reptile" {{ $_SERVER['REQUEST_URI'] == '/animals?type=Reptile' ? 'selected' : '' }}>Reptile</option>
                        </select>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>@sortablelink('name', 'Name')</th>
                                <th>@sortablelink('date_of_birth', 'Date Of Birth')</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Availability</th>
                                <th>View Images</th>
                                @cannot ('admin', auth()->user())
                                    <th>Request?</th>
                                    @else
                                    <th>Edit</th>
                                    <th>Delete</th>
                                @endcan

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($animals as $animal)
                                @if (!App\RequestsDbs::where('user_id', '=', auth()->user()->id)->where('animal_id', '=', $animal['id'])->first())


                                    <tr>
                                        <td>{{$animal['name']}}</td>
                                        <td>{{ \Carbon\Carbon::parse($animal['date_of_birth'])->format('d/m/Y')}}</td>
                                        <td>{{$animal['description']}}</td>
                                        <td>{{$animal['type']}}</td>
                                        <td>{{$animal['availability']}}</td>
                                        <td><a href="{{action('AnimalsDbsController@show', $animal['id'])}}" class="btn
btn-primary">Details</a></td>
                                        @cannot ('admin', auth()->user())
                                            <td>
                                                <a href="{{action('RequestsDbsController@request', $animal['id'] )}}"
                                                   class="btn
btn-primary">Make a request</a></td>
                                        @endcan
                                        @can ('admin', auth()->user())
                                            <td><a href="{{action('AnimalsDbsController@edit', $animal['id'])}}" class="btn
btn-warning">Edit</a></td>
                                            <td>
                                                <form action="{{action('AnimalsDbsController@destroy', $animal['id'])}}"
                                                      method="post"> @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-danger" type="submit"> Delete</button>
                                                </form>

                                            </td>
                                        @endcan
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        {{$animals->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection