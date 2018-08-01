@extends('master')

@section('content')

    <body>
        <div class="container">
            @if(isset($user_amount))



                <br><br><div class="jumbotron"> <h1 class="display-4"></h1>
                    <h1 style="color:maroon">Thank you for donating. Your donation amount {{$user_amount}} is successfully posted.</h1>
                    <br>

                       <hr class="my-4"><p class="lead">
                    <h2 style="color:lightcoral">Event {{$event_title}} has collected a total amount of {{$amount}}</h2>



                    </div><br> <br>
                @endif

        </div>
    </body>






@endsection