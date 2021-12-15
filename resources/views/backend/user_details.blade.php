@extends('backend.index')
@section('content')
<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        <div class="col-md-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Profile Detail</h5>
                </div>
                <div>
                    <div class="ibox-content no-padding border-left-right">
                        <img alt="image" class="img-fluid" src="{{asset('balivisas.png')}}" width="300px">
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong>{{$user->name}}</strong></h4>
                        <p><i class="fa fa-map-marker"></i> Balivisas</p>
                        <div class="row m-t-lg">
                            <div class="col-md-4">
                                <span class="bar">Email</span>
                                <h5><strong>{{$user->email}}</strong> </h5>
                            </div>
                            <div class="col-md-4">
                                <span class="bar">Join Since</span>
                                <h5>{{date('d F Y', strtotime($user->created_at))}}</h5>
                            </div>
                            <div class="col-md-4">
                                <span class="line">User Level</span>
                                <h5>@if($user->is_admin==1)Admin @else User @endif</h5>
                            </div>
                        </div>
                        {{-- <div class="user-button">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-envelope"></i> Send Message</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-default btn-sm btn-block"><i class="fa fa-coffee"></i> Buy a coffee</button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
            </div>
        </div>
        </div>
        <div class="col-md-8">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Data Detail</h5>
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
                    <div>
                        <div class="feed-activity-list">
                            <div class="feed-element">
                                <form action="{{route('update')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" id="" value="{{$user->id}}">
                                    <div class="form-group row"><label class="col-lg-2 col-form-label">Email</label>
                                        <div class="col-lg-10"><input type="text" placeholder="Name" name="name" class="form-control" value="{{$user->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-lg-2 col-form-label">Email</label>
                                        <div class="col-lg-10"><input type="email" placeholder="Email" name="email" class="form-control" value="{{$user->email}}"> <span class="form-text m-b-none">This form must be email format</span>
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-lg-2 col-form-label">Password</label>
                                        <div class="col-lg-10"><input type="password" placeholder="Password" name="password" class="form-control"></div>
                                    </div>
                                    <div class="form-group row"><label class="col-lg-2 col-form-label">Password Confirm</label>
                                        <div class="col-lg-10"><input type="password" placeholder="Password" name="passwordconfirm" class="form-control"></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection