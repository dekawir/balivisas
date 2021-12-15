@extends('backend.index')
@section('content')
<div class="wrapper wrapper-content">
    <div class="row animated fadeInRight">
        <div class="col-md-4">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{$title['title']}}</h5>
                </div>
            <div>
                @foreach($article as $a)
                <div class="ibox-content no-padding border-left-right">
                    <img alt="image" class="img-fluid" src="{{asset('articles/'.$a->path)}}" width="300px">
                </div>
               
                <div class="ibox-content profile-content">
                    <h4><strong>{{$a->title}}</strong></h4>
                    <p><i class="fa fa-map-marker"></i> Balivisas</p>
                    <div class="row m-t-lg">
                        <div class="col-md-4">
                            <span class="bar">Created By</span>
                            <h5><strong>{{$a->name}}</strong> </h5>
                        </div>
                        <div class="col-md-4">
                            <span class="bar">Created At</span>
                            <h5>{{date('d F Y', strtotime($a->created_at))}}</h5>
                        </div>
                        {{-- <div class="col-md-4">
                            <span class="line">User Level</span>
                            <h5></h5>
                        </div> --}}
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
                @endforeach
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
                                @foreach($article as $a)
                                <form action="{{route('update.article')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" id="" value="{{$a->id}}">
                                    <div class="form-group row"><label class="col-lg-2 col-form-label">Title</label>
                                        <div class="col-lg-10"><input type="text" placeholder="Title" name="title" class="form-control" value="{{$a->title}}">
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-lg-2 col-form-label">Description</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" name="description" id="" cols="30" rows="10">{{$a->description}}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row"><label class="col-lg-2 col-form-label">Status</label>
                                        <div class="col-lg-10">
                                            <select class="form-control m-b" name="status">
                                                <option value="1" @if($a->status=='1')selected @endif>Active</option>
                                                <option value="0" @if($a->status=='0')selected @endif>Non-Active</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row"><label class="col-lg-2 col-form-label">Image</label>
                                        <div class="col-lg-10">
                                            <div class="custom-file">
                                                <input id="logo" type="file" class="custom-file-input" name="path">
                                                <label for="logo" class="custom-file-label">Choose file...</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection