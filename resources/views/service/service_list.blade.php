@extends('layouts.dashboard')
@section('content')
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Tables</span> - Styling</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            
        </div>
        <div class="header-elements d-none">
            <div class="d-flex justify-content-center">
                @can('service-create')
                <a href="{{ route('services.create') }}" class="btn btn-primary"><i class="icon-plus"></i>Create</a>
                @endcan
            </div>
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
                <h5 class="card-title">Roles</h5>
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
                            <th>Image</th>
                            <th>Category </th>
                            <th>Service </th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Time Duration</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($services as $key => $service)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>@if($service->service_image)
                            <img src="{{ url('public/uploads/service/')}}/{{$service->service_image}}" class="rounded-square" width="100" height="100" alt="">
                            @else 
                            <img src="{{ url('images')}}/fallbackthumbnail.png" class="rounded-square" width="100" height="100" alt="">
                            @endif
                            </td>
                            <td>{{ $service->category->name }}</td>
                            <td>{{ $service->service_name }}</td>
                            <td>{{ $service->price }}</td>
                            <td>{{ $service->discount_price }}</td>
                            <td>{{ $service->time_duration }}</td>
                            <td>
                                @if($service->status==1)
                                <a class="btn btn-info" href="{{ route('services.show',$service->id) }}">Active</a>
                                 @else
                                 <a class="btn btn-info" href="{{ route('services.show',$service->id) }}">Deactive</a> 
                                 @endif
                            </td>
                            <td class="text-center">
                                
                            @can('service-edit')
                                <a class="btn btn-primary" href="{{ route('services.edit',$service->id) }}">Edit</a>
                            @endcan
                            @can('service-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['services.destroy', $service->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $services->render() !!}
        </div>
    </div>
    @endsection