@extends('layouts.admin')

@section('title')
    Admin: Hotels - View Rooms
@endsection
@section('style')
<link rel="stylesheet" href="/css/admin.css">
@endsection

@section('content')
<div class="container m-5">
    <div class="my-3">
        <h3>
            <i class="bi bi-123"></i>
            {{$hotel['name']}}'s Rooms
        </h3>
    </div>

    <div class="my-2">
        <a href="{{route('admin.hotels.index')}}" class="btn btn-primary">
            <i class="bi bi-arrow-counterclockwise"></i>
            Go back</a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
        <tr class="table-dark">
            <th scope="col">#</th>
            <th scope="col">Room Number</th>
            <th scope="col">Description</th>
            <th scope="col">Room Type</th>
            <th scope="col">Capacity</th>
            <th scope="col">Price</th>

        </tr>
        </thead>
        <tbody>
            @if (count($rooms))
                @foreach ($rooms as $room)
                    <tr class="align-middle">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->description }}</td>
                        <td>{{ $room->room_type }}</td>
                        <td>{{ $room->capacity }}</td>
                        <td>${{ $room->price }}</td>
                    </tr>
                @endforeach
                
            @else
            <tr class="align-middle">
                <td colspan="20" class="text-center">This hotel has no avilable rooms for booking.</td>
            </tr>
            @endif
        </tbody>
        </table>
        
</div>
@endsection