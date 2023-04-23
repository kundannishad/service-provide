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
                @can('role-create')
                <a href="{{ route('roles.create') }}" class="btn btn-primary"><i class="icon-plus"></i>Create</a>
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
                <h5 class="card-title">Terms And Conditions  List</h5>
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
                            <th class="text-center">Description</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                            <td class="text-center">{{ substr($basicSettings->term_and_condition,'0','100') }}</td>
                            <td>
                            <a class="btn btn-info" href="{{ route('term-and-condition-edit',$basicSettings->term_and_condition_id) }}">Edit</a>
                            </td>
                        </tr>
                     
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
    @endsection