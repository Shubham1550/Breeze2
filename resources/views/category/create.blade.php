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
    @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    {{-- </div> --}}


    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Category Form</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-footer">
            <a href="{{route('category.index')}}"><button class="btn btn-primary">Back</button></a>
        </div>
        <!-- form start -->
        <form action="{{route('category.store')}}" method="POST">
            @csrf
        <div class="card-body">
            <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" >
            </div>
            <div class="form-group">
                <label for="title">Status</label>
                <select name="status" select id="status" class="form-control" >
                    <option value="{{old('status')}}" class="option_color">Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                </select>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

    </div>
</div>

@endsection
