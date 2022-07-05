@extends('layouts.master')
@section('content')

<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Blog</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Blog </li>
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
</div>


<div class="container">
<div class="card card-primary">

    <div class="card-header">

      <h3 class="card-title">Blog Form</h3>

    </div>

    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{old('title')}}" >
        </div>
        <div class="form-group">
          <label for="description"></label><br>
          <textarea name="description" class="form-control" id="body" cols="30" rows="5" placeholder="Write here!">{{old('description')}}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Select Category</label>
            <select name="category_id" select id="category_id" class="form-control" >
                <option value="{{old('category_id')}}" class="option_color">Select Category</option>
                @foreach ($categories as $c )
                <option value="{{$c->id}}">{{$c->name}}</option>

                @endforeach
            </select>
          </div>
        {{-- <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Enter status" value="{{old('status')}}" >
          </div> --}}
        <div class="form-group">
            <label for="title">Status</label>
            <select name="status" select id="status" class="form-control" >
                <option value="{{old('status')}}" class="option_color">Select Status</option>

                <option value="1">Active</option>
                <option value="0">Deactive</option>
            </select>
          </div>
          <div class="form-group">
            <label for="profile_image">Profile Image</label>
            <input type="file" class="form-control" name="profile_image" id="upload_image" placeholder="Upload Profile Image">
          </div>

      </div>-
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    {{-- <a href="{{route('blog.index')}}"><button  class="btn btn-primary">Back</button></a> --}}

    <div class="card-footer">
      <a href="{{route('blog.index')}}"><button type="submit" class="btn btn-primary">Back</button></a>
    </div>
  </div>
  <script>
    ClassicEditor
    .create( document.querySelector( '#body' ) )
    .catch( error => {
    console.error( error );
    } );
    </script>

  @endsection
