@extends('master')

@section('content')


{{--<script src="jquery.min.js"></script>--}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<style>
    .upcase{
        text-transform:uppercase;
    }
</style>

    <div class="container">
        @if(isset($username))
           <br> <h1>Welcome <b style="color:indianred;">{{ $username }} </b></h1>
            <br>
            @endif

        <h2> <a  href="/fundraiserform/create"><b style="color:indigo">Create new event</b></a></h2><br>



            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All Events</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Recommended Events</a>
                                    </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


                    @if(isset($viewsdata))








                        @foreach ($viewsdata as $data)

                            <div id={{$data->id}}>


                                <div class="jumbotron"> <h1 class="display-4 upcase">{{ $data->events_title}}</h1>

                                    <p class="lead">{{ $data->description}}</p>       <hr class="my-4"><p class="lead">


                                        <button class="btn btn-default"> <a  href="/donate?event_id={{$data->id}}&user={{$username}}&event_title={{$data->events_title}}"> Donate</a>
                                        </button>
                                    </p> </div>


                            </div><br>


                        @endforeach






                    @endif


                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                    @if(isset($events))

                        @foreach ($events as $data)

                            <div id={{$data['event_id']}}>


                                <div class="jumbotron"> <h1 class="display-4 upcase">{{ $data['events_title']}}</h1>

                                    <p class="lead">{{ $data['description']}}</p>       <hr class="my-4"><p class="lead">


                                        <button class="btn btn-default"> <a  href="/donate?event_id={{$data['event_id']}}&user={{$username}}&event_title={{$data['events_title']}}"> Donate</a>
                                        </button>
                                    </p> </div>


                            </div><br>


                        @endforeach






                    @endif






                </div>
            </div>





    </div>




@endsection