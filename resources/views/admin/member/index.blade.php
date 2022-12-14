@extends('partials.admin.app')
@section('adminTitle','Super Admin Home')
@section('admin-content')

@push('style')
  <!-- Data Table CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
   
@endpush
<div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back {{auth()->user()->name}}!</h4>
                            <p class="mb-0">Show All Members</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Show Member's</a></li>
                        </ol>
                    </div>
                </div>
                    <!-- Notifications Start-->
                    @if ($msg = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $msg }}</strong>
                    </div>

                    @elseif (Session::get('faild'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ Session::get('faild') }}</strong>
                    </div>

                    @elseif (Session::get('delete'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ Session::get('delete') }}</strong>
                    </div>
                    @endif
                    <!-- Notifications End-->
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Show All Member's</h4>
                                <a href="{{route('admin.addMemberView')}}" class="btn btn-primary float-lg-right" style="background-color: #450b5a; color: #fff;"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                            </div>
                            <div class="card-body">
                                <table id="showCast" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Cast</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=1;
                                        @endphp

                                        @forelse ($showMember as $row)
                                        <tr>
                                            <td scope="row">{{$i++}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->cast_name}}</td>
                                            <td>
                                                <a href="{{url('admin/edit-member')}}/{{$row->id}}" class="btn btn-warning">Edit</a>
                                                <a href="{{url('admin/delete-member')}}/{{$row->id}}" onclick="return confirm('Are You sure Delete this Data')" class="btn btn-danger" return="confirm('Are You Sure Delete This member.....!')">Delete</a>

                                            </td>
                                        </tr>
                                        @empty
                                            <h4 class="text-center">Data Not Found</h4>
                                        @endforelse
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('script')
<!-- Data Table Script -->
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script>
  $(document).ready(function () {
    $('#showCast').DataTable();
});
</script>
    
@endpush