@extends('layouts.nav')
@section('content')
    <style>
        .mySlides {display:none;}
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">{{$animal['name']}}</div>
                    <div class="card-body">
                        <table class="table table-striped" border="1" >
                            <tr> <td> <b>Name  <td> {{$animal['name']}}</td></tr>
                            <tr> <th>Date of Birth </th> <td>{{ \Carbon\Carbon::parse($animal->date_of_birth)->format('d/m/Y')}}</td></tr>
                            <tr> <th>Description </th> <td>{{$animal->description}}</td></tr>
                            <tr> <th>Type </th> <td>{{$animal->type}}</td></tr>
                            <tr> <td>Availability </th> <td>{{$animal->availability}}</td></tr>
                            <tr> <td>Image count </th> <td>{{$animal->picture_count}}</td></tr>
                            @if ($animal->picture_count != 0)
                            <tr> <td colspan='2' >


                                    <div class="image-contents display-container-image">

                                        @foreach($images as $image)

                                        <img class="mySlides" src={{asset('storage/images/'.$image->image)}} style="width:100%" >

                                        @endforeach

                                        <button class=" black display-left" onclick="plusDivs(-1)">&#10094;</button>
                                        <button class=" black display-right" onclick="plusDivs(1)">&#10095;</button>
                                    </div>



                                </td></tr>
                            @endif
                        </table>
                        <script>
                            var slideIndex = 1;
                            showDivs(slideIndex);

                            function plusDivs(n) {
                                showDivs(slideIndex += n);
                            }

                            function showDivs(n) {
                                var i;
                                var x = document.getElementsByClassName("mySlides");
                                if (n > x.length) {slideIndex = 1}
                                if (n < 1) {slideIndex = x.length}
                                for (i = 0; i < x.length; i++) {
                                    x[i].style.display = "none";
                                }
                                x[slideIndex-1].style.display = "block";
                            }
                        </script>
                        <table><tr>
                                <td><a href="/~mohama32/animals" class="btn btn-primary" role="button">Back to the list</a></td>
                                @can ('admin', auth()->user())
                                <td><a href="{{action('AnimalsDbsController@edit', $animal['id'])}}" class="btn
btn- warning">Edit</a></td>
                                <td><form action="{{action('AnimalsDbsController@destroy', $animal['id'])}}"
                                          method="post"> @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form></td>
                                    @endcan
                            </tr></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection