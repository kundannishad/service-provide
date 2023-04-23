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
            <a href="{{ route('services.index') }}" class="btn btn-primary"><i class="icon-plus"></i>Back</a>
            @endcan
         </div>
      </div>
   </div>
   <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
      <div class="d-flex">
         <div class="breadcrumb">
            <a href="#" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
            <a href="#" class="breadcrumb-item">Role</a>
            <span class="breadcrumb-item active">Edit</span>
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
       
          {!! Form::model($service, ['method' => 'PATCH','route' => ['services.update', $service->id],'files'=>true]) !!}
         <fieldset class="mb-3">
            <legend class="text-uppercase font-size-sm font-weight-bold">Role</legend>
            <!-- Number range -->
            <div class="form-group row">
               <label class="col-form-label col-lg-3">Service Name <span class="text-danger">*</span></label>
               <div class="col-lg-9">
               {!! Form::text('service_name', null, array('placeholder' => 'Enter Service Name','class' => 'form-control')) !!}
                  
               </div>
            </div>

            <div class="form-group row">
               <label class="col-form-label col-lg-3">Category Name <span class="text-danger">*</span></label>
               
               <div class="col-lg-9">
               {!! Form::select('category_id', $categories, null, ['class' => 'form-control form-input-styled']) !!}

              
               </div>
            </div>

            <div class="form-group row">
               <label class="col-form-label col-lg-3">Price <span class="text-danger">*</span></label>
               <div class="col-lg-9">
               {!! Form::text('price', null, array('placeholder' => 'Price','class' => 'form-control')) !!}
               </div>
            </div>

            <div class="form-group row">
               <label class="col-form-label col-lg-3">Discount Price <span class="text-danger">*</span></label>
               <div class="col-lg-9">
               {!! Form::text('discount_price', null, array('placeholder' => 'Discount Price','class' => 'form-control')) !!}
               </div>
            </div>

            <div class="form-group row">
               <label class="col-form-label col-lg-3">Time Duration <span class="text-danger">*</span></label>
               <div class="col-lg-9">
               {!! Form::text('time_duration', null, array('placeholder' => 'Discount Price','class' => 'form-control')) !!}
               </div>
            </div>


            <div class="form-group row">
               <label class="col-form-label col-lg-3">Description <span class="text-danger">*</span></label>
               <div class="col-lg-9">
               {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
               </div>
            </div>
            

            <div class="form-group row">
               <label class="col-form-label col-lg-3">Service Image <span class="text-danger">*</span></label>
               <div class="col-lg-9">
               <img class="img-responsive" src="{{ url('public/uploads/service/')}}/{{$service->service_image}}" alt="{{ $service->service_name }}" style="max-width: 150px;">
               </div>
            </div>


            <div class="form-group row">
               <label class="col-form-label col-lg-3">Service Image <span class="text-danger">*</span></label>
               <div class="col-lg-9">
               {!! Form::file('image', null,array('class' => 'form-input-styled')) !!}
               </div>
            </div>

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