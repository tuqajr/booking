@extends('layouts.admin')

@section('title')
    Booking History
@endsection
@section('style')
<link rel="stylesheet" href="/css/admin.css">
@endsection

@section('content')
<div class="container m-5">
    <div class="my-3">
        <h3>
            <i class="bi bi-ticket-detailed"></i>
            Booking History
        </h3>
    </div>

    <div class="my-2">
        <a href="{{route('admin.users.index')}}" class="btn btn-primary">
            <i class="bi bi-arrow-counterclockwise"></i>
            Go back</a>
    </div>

    <table class="table table-striped table-hover">
        <thead>
        <tr class="table-dark">
            <th scope="col">Booked at</th>
            <th scope="col">Hotel</th>
            <th scope="col">address</th>
            <th scope="col" class="text-center" colspan="2">Check In - Check Out</th>
            <th scope="col">Price</th>
            <th scope="col">Coupon</th>
            <th scope="col">Status</th>

        </tr>
        </thead>
        <tbody>
            @if (count($bookings))
                @foreach ($bookings as $booking)
                    <tr class="align-middle">
                        <td>{{ $booking->created_at }}</td>
                        <td>{{ $booking->room->hotel->name }}</td>
                        <td>{{ $booking->room->hotel->address }}</td>
                        <td class="text-end">{{ $booking->check_in }}</td>
                        <td class="text-start">{{ $booking->check_out }}</td>
                        <td>${{ $booking->price }}</td>
                        <td>
                            @if ( isset($booking->coupon->code) )
                                {{ $booking->coupon->code }}
                            @else
                                {{ 'None' }}
                            @endif
                        </td>
                        <td>{{ $booking->status }}</td>

                    </tr>
                @endforeach
                
            @else
            <tr class="align-middle">
                <td colspan="20" class="text-center">This user has no bookings yet.</td>
            </tr>
            @endif
        </tbody>
        </table>
        
</div>
@endsection