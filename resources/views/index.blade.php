@extends('master')

@section('content')
    <style>
        .full-width-div { position: absolute; width: 100%; left: 0; }

        body {
            background-color: #ddd;

        }

        #newsletter{
            height:100%;
        }
        .carousel-item.active,
        .carousel-item-next,
        .carousel-item-prev{
            display:block;
        }
        .upcase{
            text-transform: uppercase;
        }
        .txtcolor{
            color: #454545;
            font-weight: bold;
        }
    </style>


    {{--<section id="showcase">--}}
        {{--<div class="container">--}}
            {{--<h1>Giving is the greatest act of Grace</h1>--}}
            {{--<p>“It's not enough to have lived.--}}
                {{--We should be determined to live for something.--}}
                {{--May I suggest that it be creating joy for others,--}}
                {{--sharing what we have for the betterment of personkind,--}}
                {{--bringing hope to the lost and love to the lonely.” </p>--}}
        {{--</div>--}}
    {{--</section>--}}

    <section id="newsletter"  >
        <div class="full-width-div bgimage">
            <div id="carouselContent" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active text-center p-4">
                        <p>Please Donate</p>
                    </div>


                    @if(isset($viewsdata))

                        @foreach ($viewsdata as $data)
                            <div class="carousel-item text-center p-4">




                            <div id={{$data->id}}>


                                <h2 class=" upcase txtcolor" >{{ $data->events_title}}</h2>

                                <h3> <p class="lead txtcolor">{{ $data->description}}</p></h3>
                            </div><br>

                            </div>
                        @endforeach

                    @endif

                </div>
                <a class="carousel-control-prev" href="#carouselContent" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselContent" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>



    @endsection