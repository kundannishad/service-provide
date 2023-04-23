@extends('layouts.dashboard')
@section('content')

    <div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Tables</span> - Styling</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            
        </div>
    </div>
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="table_styling.html" class="breadcrumb-item">Tables</a>
                <span class="breadcrumb-item active">Styling</span>
            </div>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        
    </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Cancel service</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Booking_id</th>
                            <th>First Name</th>
                            <th>Category</th>
                            <th>Services</th>
                            <th>Promo Code</th>
                            <th>Amount</th>
                            <th>Booking Date</th>
                            <th>Booking Time</th>
                            <th>Provider Name</th>
                            <th>Requirement</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; ?>
                    @foreach ($bookings as $key => $booking)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $booking->booking_id }}</td>
                            <td>{{ $booking->first_name }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->service_name }}</td>
                            <td>{{ $booking->promocode_id }}</td>
                            <td>{{ $booking->amount }}</td>
                            <td>{{ $booking->booking_date }}</td>
                            <td>{{ $booking->booking_time }}</td>
                            <td>{{ $booking->provider_name }}</td>
                            <td>{{ $booking->user_requirement }}</td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $bookings->render() !!}
        </div>
    </div>
    @endsection