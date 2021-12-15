@extends('backend.index')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Add Team <i class="fa fa-user-circle-o"></i></a>
                <div id="modal-form" class="modal fade" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12"><h3 class="m-t-none m-b">Add Team</h3>
                                        <form role="form" enctype="multipart/form-data" method="POST" action="{{route('add.team')}}">
                                            @csrf
                                            <div class="form-group"><label>Name</label> 
                                                <input type="text" placeholder="Enter name" class="form-control" name="name">
                                            </div>
                                            <div class="form-group"><label>Position</label> 
                                                <input type="text" placeholder="Enter position" class="form-control" name="position">
                                            </div>
                                            <div class="form-group"><label>Whatsapp</label> 
                                                <input type="text" placeholder="Enter whatsapp" class="form-control" name="whatsapp">
                                            </div>
                                            <div class="form-group"><label>Email</label> 
                                                <input type="text" placeholder="Enter email" class="form-control" name="email">
                                            </div>
                                            <div class="form-group"><label>Status</label> 
                                                <select class="form-control m-b" name="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Non-Active</option>
                                                </select>
                                            </div>
                                            <div class="form-group"><label>Upload Image</label> 
                                                <div class="custom-file">
                                                    <input id="logo" type="file" class="custom-file-input" name="img">
                                                    <label for="logo" class="custom-file-label">Choose file...</label>
                                                </div>
                                            </div>

                                            <div>
                                                <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Add Team</strong></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" class="dropdown-item">Config option 1</a>
                        </li>
                        <li><a href="#" class="dropdown-item">Config option 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Image</th>
                <th>Email</th>
                <th>Position</th>
                <th>Whatsapp</th>
                <th>Status</th>
                <th>Created By</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($team as $u)
            <tr class="gradeX">
                <td>{{$no++}}</td>
                <td>{{$u->name}}</td>
                <td><img src="{{asset('team/'.$u->path)}}" alt="" width="50px"></td>
                <td>{{$u->email}}</td>
                <td>{{$u->position}}</td>
                <td>{{$u->whatsapp}}</td>
                <td class="center">@if($u->status==1)Active @else Non-Active @endif</td>
                <td>{{$u->uname}}</td>
                <td>{{date('d F Y', strtotime($u->created_at))}}</td>
                <td class="center">
                    <a href="{{route('edit.team.'.Auth::user()->is_admin,$u->id)}}"><span class="btn btn-warning"><i class="fa fa-edit"></i></span></a>
                    <button class="btn btn-danger" onclick="deleteTeam({{$u->id}})"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>
@endsection