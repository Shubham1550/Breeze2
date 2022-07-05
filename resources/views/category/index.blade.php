@extends('layouts.master')
@section('content')


<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Category </li>
          </ol>
        </div>
      </div>
    </div>
</div>

    <div class="container">
        <div class="row">
            <div class="col-12">

                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Category Table</h3>
                  <div class="card-tools">
                    <a href="{{route('category.create')}}"><button type="button" class="btn  btn-primary">Add</button></a>

                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>

                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $c)
                      <tr>
                        <td>{{$c->id}}</td>
                        <td>{{$c->name}}</td>

                        <td>
                          @if($c->status == 1)

                          <span class="badge badge-primary">Active</span>
                          @else
                          <span class="badge badge-danger">Deactive</span>
                          @endif
                        </td>
                        <td><a href="{{route('category.edit',$c->id)}}"><button type="button" class="btn  btn-success">Edit</button></a>
                            <a href="{{route('category.delete',$c->id)}}"><button type="button" class="btn  btn-danger">Delete</button></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{$category->links()}}
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
    </div>
@endsection
