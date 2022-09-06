@extends('partials.admin.app')
@section('adminTitle','Edit Member')
@section('admin-content')

<div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                        <h4>Hi, welcome back {{auth()->user()->name}}!</h4>
                            <!-- <p class="mb-0">Your business dashboard template</p> -->
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Member</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Member Form</h4>
                                <a href="javascript:void(0)" onclick="history.back()" class="btn btn-primary float-lg-right" style="background-color: #450b5a; color: #fff;"><i class="fa fa-backward"></i> Back</a>
                            </div>
                            <div class="card-body">
                                <form action="{{route('admin.memberUpdate')}}" method="post" id="step-form-horizontal" class="step-form-horizontal">
                                  @csrf
                                  <input type="hidden" name="id" value="{{$editMemberView->id}}">
                                    <div>
                                        <!-- <h4>Personal Info</h4> -->
                                        <section>
                                            <div class="row">
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label"><b>Member Name :<strong style="color: red;">*</strong></b></label>
                                                        <input type="text" name="memberName" value="{{$editMemberView->name}}" class="form-control" placeholder="memberName" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label"><b>Email :<strong style="color: red;">*</strong></b></label>
                                                        <input type="text" name="email" value="{{$editMemberView->name}}" class="form-control" placeholder="Email" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label"><b>Password:<strong style="color: red;">*</strong></b></label>
                                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label"><b>Re-type Password :<strong style="color: red;">*</strong></b></label>
                                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Cast" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label"><b>Cast :<strong style="color: red;">*</strong></b></label>
                                                        <select class="form-control" name="cast_id" id="">
                                                            @foreach ($castDatas as $castData)
                                                            <option value="{{$castData->id}}" {{$castData->id == $editMemberView->cast_id ? 'selected' : ''}}>{{$castData->cast_name}}</option>
                                                                
                                                            @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-outline-light text-light" style="background-color: #450b5a;" value="Save">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection