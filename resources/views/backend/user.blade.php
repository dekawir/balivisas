@extends('backend.index')
@section('content')
                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                            For more information about DataTables, please visit the <a target="_blank"
                                href="https://datatables.net">official DataTables documentation</a>.</p>
    
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
         
                                        <tbody>
                                            @forelse ($user as $u)
                                            <tr>      
                                                 <td>{{$u->name}}</td>
                                                 <td>@if($u->is_admin=='1')Admin @else User @endif</td>
                                                 <td><a href="{{route('edit',$u->id)}}"><i class="fas fa-fw fa-edit"></i></a>|<a href=""><i class="fas fa-fw fa-trash"></i></a></td>
                                            </tr>
                                            @empty
                                                <tr>Data Kosong</tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    
                    </div>
                    <!-- /.container-fluid -->
@endsection