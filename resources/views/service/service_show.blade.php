@extends('layouts.dashboard')
@section('content')
<div class="page-header page-header-light">
   <div class="page-header-content header-elements-md-inline">
      <div class="page-title d-flex">
         <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Role</span> - View</h4>
         <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
      </div>
      <div class="header-elements d-none">
         <div class="d-flex justify-content-center">
            @can('role-create')
            <a href="{{ route('roles.index') }}" class="btn btn-primary"><i class="icon-plus"></i>Back</a>
            @endcan
         </div>
      </div>
   </div>
   <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
      <div class="d-flex">
         <div class="breadcrumb">
            <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
            <a href="#" class="breadcrumb-item">Role</a>
            <span class="breadcrumb-item active">View</span>
         </div>
         <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
      </div>
   </div>
</div>
<!-- Content area -->
<div class="content">
   <!-- Form validation -->
   <div class="card">
      <div class="card-body">
     
         <fieldset class="mb-3">
            <legend class="text-uppercase font-size-sm font-weight-bold">Role</legend>
            <!-- Number range -->
            <div class="form-group row">
               <label class="col-form-label col-lg-3">Role Name <span class="text-danger">*</span></label>
               <div class="col-lg-9">
               {{ $role->name }}
               </div>
            </div>
         </fieldset>
         <fieldset class="mb-3">
            <legend class="text-uppercase font-size-sm font-weight-bold">Manage Permissions</legend>
            <!-- Basic single checkbox -->
            <div class="form-group row">
               <label class="col-lg-3 col-form-label">Permission: <span class="text-danger">*</span></label>
               <div class="col-lg-9">
                  <div class="form-check">
                  @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                        <label class="label label-success">{{ $v->name }},</label>
                    @endforeach
                 @endif
                  </div>
               </div>
            </div>
            <!-- /basic singlecheckbox -->
         </fieldset>
         
       
      </div>
   </div>
   <!-- /form validation -->
</div>
<!-- /content area -->
@endsection