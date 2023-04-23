@extends('layouts.dashboard')
@section('content')
<div class="page-header page-header-light">
   <div class="page-header-content header-elements-md-inline">
      <div class="page-title d-flex">
         <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Role</span> - Edit</h4>
         <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
      </div>
      <div class="header-elements d-none">
         <div class="d-flex justify-content-center">
            @can('role-create')
            <a href="{{ route('users.index') }}" class="btn btn-primary"><i class="icon-plus"></i>Back</a>
            @endcan
         </div>
      </div>
   </div>
   <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
      <div class="d-flex">
         <div class="breadcrumb">
            <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
            <a href="#" class="breadcrumb-item">User</a>
            <span class="breadcrumb-item active">Add</span>
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
      {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
         <fieldset class="mb-3">
            <legend class="text-uppercase font-size-sm font-weight-bold">Role</legend>
            <!-- Number range -->
            <div class="form-group row">
               <label class="col-form-label col-lg-3">First Name <span class="text-danger">*</span></label>
               <div class="col-lg-9">
                  {!! Form::text('first_name', null, array('placeholder' => 'Enter your first name','class' => 'form-control')) !!}
               </div>
            </div>

            <div class="form-group row">
               <label class="col-form-label col-lg-3">Last Name <span class="text-danger"></span></label>
               <div class="col-lg-9">
                  {!! Form::text('last_name', null, array('placeholder' => 'Enter your last name','class' => 'form-control')) !!}
               </div>
            </div>


            <div class="form-group row">
               <label class="col-form-label col-lg-3">Email<span class="text-danger"></span>*</label>
               <div class="col-lg-9">
                  {!! Form::text('email', null, array('placeholder' => 'Enter your Email','class' => 'form-control')) !!}
               </div>
            </div>

            <div class="form-group row">
               <label class="col-form-label col-lg-3">Phone No<span class="text-danger"></span>*</label>
               <div class="col-lg-9">
                  {!! Form::text('phone_no', null, array('placeholder' => 'Enter your Phone No','class' => 'form-control')) !!}
               </div>
            </div>


            <div class="form-group row">
               <label class="col-form-label col-lg-3">Password<span class="text-danger"></span>*</label>
               <div class="col-lg-9">
                 {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
               </div>
            </div>

            <div class="form-group row">
               <label class="col-form-label col-lg-3">Confirm Password<span class="text-danger"></span>*</label>
               <div class="col-lg-9">
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
               </div>
            </div>


            <div class="form-group row">
               <label class="col-form-label col-lg-3">Roles<span class="text-danger"></span>*</label>
               <div class="col-lg-9">
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
               </div>
            </div>

         </fieldset>
         <fieldset class="mb-3">
            <legend class="text-uppercase font-size-sm font-weight-bold">Manage Permissions</legend>
            <!-- Basic single checkbox -->
            
         </fieldset>
         <div class="d-flex justify-content-end align-items-center">
            <button type="reset" class="btn btn-light" id="reset">Reset <i class="icon-reload-alt ml-2"></i></button>
            <button type="submit" class="btn btn-primary ml-3">Submit <i class="icon-paperplane ml-2"></i></button>
         </div>
         {!! Form::close() !!}
      </div>
   </div>
   <!-- /form validation -->
</div>
<!-- /content area -->
@endsection