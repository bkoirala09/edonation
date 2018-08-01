@extends('master');

@section('content')
    <div>
        <a href="{{ url("/fundraiserform/create") }}">

            <button style="
        border:none;
        padding: 10px;
        color: #fff;
        background-color: #0000F0;
        margin: 50px 0 0 100px;
        ">Add New Event</button>
        </a>
    </div>

<table border="2">
    <thead>
        <th>EVENT NAME</th>
        <th>DESCRIPTION</th>
        <th>CREATED_AT</th>
    </thead>
    <tbody>
    @foreach($results as $result)
        <tr>
            <td>{{ $result->events_title }}</td>
            <td>{{ $result->description }}</td>
            <td>{{ $result->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection