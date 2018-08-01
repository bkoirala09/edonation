@extends('master')

@section('content')
    <script>
        function  eventClick(btn) {
            console.log(btn.getAttribute("event_id"));

        }
    </script>

    <div class="container">


        @if(isset($viewsdata))








            @foreach ($viewsdata as $data)

                  <br>  <div id={{$data->id}}>


                        <div class="jumbotron"> <h1 class="display-4">{{ $data->events_title}}</h1>

                        <p class="lead">{{ $data->description}}</p>       <hr class="my-4"><p class="lead">

                                <button type="button" class="btn btn-outline-success"><a href="/events/approve?event_id={{$data->id}}" >Verify</a></button>
                                <button type="button"  class="btn btn-outline-success"><a href="/events/delete?event_id={{$data->id}}">Delete</a></button>

                        </p> </div>


                    </div><br>


                @endforeach






        @endif

    </div>


    @endsection