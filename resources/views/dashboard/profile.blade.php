
@extends('layouts.dashboard')
@section('content')

<!-- /profile navigation -->
<div class="content">
   <!-- Inner container -->
   <div class="d-flex align-items-start flex-column flex-md-row">
      <!-- Left content -->
      <div class="tab-content w-100 order-2 order-md-1">
         <!-- Profile info -->
         <div class="card">
            <div class="card-header header-elements-inline">
               <h5 class="card-title">Profile information</h5>
               <div class="header-elements">
                  <div class="list-icons">
                     <a class="list-icons-item" data-action="collapse"></a>
                     <a class="list-icons-item" data-action="reload"></a>
                     <a class="list-icons-item" data-action="remove"></a>
                  </div>
               </div>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="{{ route('update-profile') }}" enctype="multipart/form-data" method="post" role="form">
             {!! csrf_field() !!}
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-6">
                           <label>First Name</label>
                           <input type="text" value="{{$user->first_name}}" name="first_name" class="form-control">
                        </div>
                        <div class="col-md-6">
                           <label>Last Name</label>
                           <input type="text" value="{{$user->last_name}}" name="last_name" class="form-control">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-6">
                           <label>Email</label>
                           <input type="text" value="{{$user->email}}" name="email" class="form-control">
                        </div>
                        <div class="col-md-6">
                           <label>Mobile No</label>
                           <input type="text" value="{{$user->phone_no}}" name="phone_no" class="form-control">
                        </div>
                     </div>
                  </div>

                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-6">
                        <label>Upload profile image</label>
                        <input type="file" name="image" class="form-input-styled">
                        <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                        </div>
						        <div class="col-md-6">
								         <img class="img-fluid rounded-circle" src="{{ asset('public/uploads/user') }}/{{ $user->image }}" width="100" height="100" alt="">
						    </div>
						
                     </div>

            


                   
                  </div>
                  
                  <div class="text-right">
                     <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
               </form>
            </div>
         </div>
         <!-- /profile info -->
         <!-- Account settings -->
         <div class="card">
            <div class="card-header header-elements-inline">
               <h5 class="card-title">Account settings</h5>
               <div class="header-elements">
                  <div class="list-icons">
                     <a class="list-icons-item" data-action="collapse"></a>
                     <a class="list-icons-item" data-action="reload"></a>
                     <a class="list-icons-item" data-action="remove"></a>
                  </div>
               </div>
            </div>
            <div class="card-body">
            <form class="form-horizontal" action="{{ route('change-password') }}" enctype="multipart/form-data" method="post" role="form">
             {!! csrf_field() !!}
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-6">
                           <label>Email</label>
                           <input type="email" value="{{$user->email}}" readonly="readonly" class="form-control">
                        </div>
                        <div class="col-md-6">
                           <label>Old password</label>
                           <input type="password" name="old_password"  class="form-control">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-6">
                           <label>New password</label>
                           <input type="password" name="password" placeholder="Enter new password" class="form-control">
                        </div>
                        <div class="col-md-6">
                           <label>Confirm Password</label>
                           <input type="password"  name="confirm_password" placeholder="Repeat new password" class="form-control">
                        </div>
                     </div>
                  </div>
                  
                  <div class="text-right">
                     <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
               </form>
            </div>
         </div>
         <!-- /account settings -->
      </div>
      <!-- /left content -->
      <!-- Right sidebar component -->
      <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right wmin-300 border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">
         <!-- Sidebar content -->
         <div class="sidebar-content">
            <!-- User card -->
            <div class="card">
               <div class="card-body text-center">
                  <div class="card-img-actions d-inline-block mb-3">
                  <img class="img-fluid rounded-circle" src="{{ asset('public/uploads/user') }}/{{ $user->image }}" width="170" height="170" alt="">
                     <div class="card-img-actions-overlay card-img rounded-circle">
                        <a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                        <i class="icon-plus3"></i>
                        </a>
                        <a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
                        <i class="icon-link"></i>
                        </a>
                     </div>
                  </div>
                  <h6 class="font-weight-semibold mb-0">{{$user->first_name . $user->last_name }}</h6>
                  <span class="d-block text-muted">UX/UI designer</span>
                  <div class="list-icons list-icons-extended mt-3">
                     <a href="#" class="list-icons-item" data-popup="tooltip" title="Google Drive" data-container="body"><i class="icon-google-drive"></i></a>
                     <a href="#" class="list-icons-item" data-popup="tooltip" title="Twitter" data-container="body"><i class="icon-twitter"></i></a>
                     <a href="#" class="list-icons-item" data-popup="tooltip" title="Github" data-container="body"><i class="icon-github"></i></a>
                  </div>
               </div>
            </div>
            <!-- /user card -->
            <!-- Navigation -->
            <div class="card">
               <div class="card-header bg-transparent header-elements-inline">
                  <span class="card-title font-weight-semibold">Navigation</span>
                  <div class="header-elements">
                     <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                     </div>
                  </div>
               </div>
               <div class="card-body p-0">
                  <ul class="nav nav-sidebar my-2">
                     <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="icon-user"></i>
                        My profile
                        </a>
                     </li>
                    
                  </ul>
               </div>
            </div>
            <!-- /navigation -->
         </div>
         <!-- /sidebar content -->
      </div>
      <!-- /right sidebar component -->
   </div>
   <!-- /inner container -->
</div>
<!-- /content area -->

@endsection