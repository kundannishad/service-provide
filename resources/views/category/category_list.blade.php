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
                @can('category-create')
                <a href="{{ route('categories.create') }}" class="btn btn-primary"><i class="icon-plus"></i>Create</a>
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
                <h5 class="card-title">Categories</h5>
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
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $category->name }}</td>
                            <td>@if($category->icon_image)
                            <img src="{{ url('public/public/uploads/category/')}}/{{$category->icon_image}}" class="rounded-square" width="60" height="60" alt="">
                            @endif
                            </td>
                            <td>
                                @if($category->status==1)
                                <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">Active</a>
                                 @else
                                 <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">Deactive</a> 
                                 @endif
                            </td>
                            <td class="text-center">
                                
                            @can('category-edit')
                                <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>
                            @endcan
                            @can('category-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {!! $categories->render() !!}
        </div>
    </div>
    @endsection