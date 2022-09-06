@extends('partials.admin.app')
@section('adminTitle','Super Admin Home')
@section('admin-content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <!-- <p class="mb-0">Your business dashboard template</p> -->
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Update Profile</a></li>
                </ol>
            </div>
        </div>

        <!-- row -->
        <div class="row">
            <div class="col-xl-7 col-lg-7">
                <!-- Change Profile -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for=""><b>Name:</b><span class="text-danger">*</span></label>
                                            <input type="text" class="form-control input-default " placeholder="Enter Name">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for=""><b>Email:</b><span class="text-danger">*</span></label>
                                            <input type="email" class="form-control input-default " placeholder="Enter Email" readonly>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for=""><b>Phone:</b><span class="text-danger">*</span></label>
                                            <input type="text" class="form-control input-default " placeholder="Enter Phone">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for=""><b>Image:</b><span class="text-danger">*</span></label>
                                            <input type="file" class="form-control input-default " placeholder="">
                                            <img src="{{asset('image')}}/{{auth()->user()->image}}" alt="image" width="100px" height="100px">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for=""><b>Address:</b><span class="text-danger">*</span></label>
                                            <textarea class="form-control input-default" placeholder="Type your message..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Update">

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--Change Password  -->
            <div class="col-xl-5 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Change Password</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form>
                                <div class="form-group">
                                    <label for=""><b>Current Password</b><span class="text-danger">*</span></label>
                                    <input type="password" name="" class="form-control input-rounded" placeholder="Cruurent Password">
                                </div>
                                <div class="form-group">
                                    <label for=""><b>New Password</b><span class="text-danger">*</span></label>
                                    <input type="password" name="" class="form-control input-rounded" placeholder="New Password">
                                </div>

                                <div class="form-group">
                                    <label for=""><b>Re-Type Password</b><span class="text-danger">*</span></label>
                                    <input type="password" name="" class="form-control input-rounded" placeholder="Re-Type Password">
                                </div>
                                <input type="submit" class="btn btn-primary" value="Save">
                            </form>
                        </div>
                    </div>
                </div>
            </div>








        </div>

    </div>
</div>

@endsection