@extends('layouts.master')
@section('content')


    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Blogs</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Blogs </li>
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
                  <h3 class="card-title">Blogs Table</h3>
                  <div class="card-tools">
                    <a href="{{route('blog.create')}}"><button type="button" class="btn  btn-primary">Add</button></a>

                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>

                        <th>Status</th>
                        <th>Profile Image</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $p)
                      <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->title}}</td>
                        <td>
                            {!! Str::words($p->description, 10, ' ...') !!}
                            {{-- {!!$p->description!!} --}}
                        </td>
                        <td>{{@$p->category->name}}</td>
                        <td>
                          @if($p->status == 1)
                          <span class="badge badge-primary">Active</span>

                          @else
                          <span class="badge badge-danger">Deactive</span>


                          @endif
                        </td>
                        <td >
                            @if (empty($p->profile_image))
                            <img src="{{asset('defaultblog.png')}}"  width="100px" height="100px"/>

                            @else

                            <img src="{{asset('uploads/blogs/'.$p->profile_image)}}"  width="100px" height="100px"/>
                            @endif
                        </td>
                        <td><a href="{{route('blog.editform',$p->id)}}"><button type="button" class="btn  btn-success">Edit</button></a>
                            <a href="{{route('delete',$p->id)}}"><button type="button" class="btn  btn-danger">Delete</button></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  {{$product->links()}}
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
    </div>
@endsection
