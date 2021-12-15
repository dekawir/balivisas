@extends('backend.index')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Add User <i class="fa fa-user-plus"></i></a>
                <div id="modal-form" class="modal fade" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12"><h3 class="m-t-none m-b">Add User</h3>
                                        <form role="form" method="POST" action="{{route('add')}}">
                                            @csrf
                                            <div class="form-group"><label>Name</label> 
                                                <input type="text" placeholder="Enter name" class="form-control" name="name">
                                            </div>
                                            <div class="form-group"><label>Email</label> 
                                                <input type="email" placeholder="Enter email" class="form-control" name="email">
                                            </div>
                                            <div class="form-group"><label>Password</label> 
                                                <input type="password" placeholder="Password" class="form-control" name="password">
                                            </div>
                                            <div class="form-group"><label>User Level</label> 
                                                <select class="form-control m-b" name="is_admin">
                                                    <option value="1">Admin</option>
                                                    <option value="0">User</option>
                                                </select>
                                            </div>
                                            <div>
                                                <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Add</strong></button>
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
                <th>Email</th>
                <th>User Level</th>
                <th>Created Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($user as $u)
            <tr class="gradeX">
                <td>{{$no++}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td>@if($u->is_admin == '1') Admin @else User @endif</td>
                <td class="center">{{date('d F Y',strtotime($u->created_at))}}</td>
                <td class="center">
                    <a href="{{route('edit',$u->id)}}"><span class="btn btn-warning"><i class="fa fa-edit"></i></span></a>
                    <button class="btn btn-danger" onclick="deleteUser({{$u->id}})"><i class="fa fa-trash"></i></button>
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