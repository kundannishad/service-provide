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
            <a href="#" class="btn btn-link btn-float text-default"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
            <a href="#" class="btn btn-link btn-float text-default"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
            <a href="#" class="btn btn-link btn-float text-default"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
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
      <div class="header-elements d-none">
         <div class="breadcrumb justify-content-center">
            <a href="#" class="breadcrumb-elements-item">
            <i class="icon-comment-discussion mr-2"></i>
            Support
            </a>
            <div class="breadcrumb-elements-item dropdown p-0">
               <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
               <i class="icon-gear mr-2"></i>
               Settings
               </a>
               <div class="dropdown-menu dropdown-menu-right">
                  <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
                  <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                  <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Content area -->
<div class="content">
   <!-- Default styling -->
   <div class="card">
      <div class="card-header header-elements-inline">
         <h5 class="card-title">Default styling</h5>
         <div class="header-elements">
            <div class="list-icons">
               <a class="list-icons-item" data-action="collapse"></a>
               <a class="list-icons-item" data-action="reload"></a>
               <a class="list-icons-item" data-action="remove"></a>
            </div>
         </div>
      </div>
      <div class="card-body">
        
       </div>
        <div class="table-responsive">
         <table class="table">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Mobile No</th>
                  <th>Status</th>
                 
               </tr>
            </thead>
            <tbody>
            @foreach ($data as $key => $user)
               <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $user->image }}</td>
                  <td>{{ $user->first_name }}</td>
                  <td>{{ $user->last_name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->phone_no }}</td>
                  <td>{{ $user->status }}</td>
                </tr>
            @endforeach
         </table>
         
      </div>
      
   </div>
   {!! $data->render() !!}
</div>

@endsection
