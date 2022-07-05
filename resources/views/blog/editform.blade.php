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
            <li class="breadcrumb-item"><a href="#">Home</a></li>
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

      <h3 class="card-title">Blog Edit Form</h3>
    </div>

    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('update',$product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{$product->title}}" value="{{old('title')}}" >
        </div>
        <div class="form-group">
          <label for="description">Description</label><br>
          <textarea name="description" class="form-control" id="body" cols="30" rows="5" placeholder="Write here!" value="{{$product->description}}">{{$product->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Select Category</label>
            <select name="category_id" select id="category_id" class="form-control" >
                {{-- <option value="">{{$product->category->name}}</option> --}}

                @foreach ($categories as $c )
                {{-- <option value="">{{$c->name == $product->category->name}}</option> --}}
                <option value="{{$c->id}}"  @if($c->id==$product->category->id) selected='selected' @endif >{{ $c->name }}</option>

                @endforeach
            </select>
          </div>
        {{-- <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Enter status" value="{{$product->status}}" value="{{old('status')}}" >
          </div> --}}
          <div class="form-group">
            <label for="title">Status</label>
            <select name="status" select id="status" class="form-control" >
                <option value="" class="option_color">Select Status</option>
                <option value="1" @if($product->status == '1') selected='selected'@endif>Active</option>
                <option value="0" @if($product->status == '0') selected='selected'@endif>Deactive</option>
            </select>
          </div>
          <div class="form-group">
            <label for="profile_image">Profile Image</label>
            <input type="file" class="form-control" name="profile_image" id="upload_image" placeholder="Upload Profile Image"  value="{{$product->profile_image}}" value="{{old('profile_image')}}">
          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
    <div class="card-footer">
        <a href="{{route('blog.index')}}"><button type="submit" class="btn btn-primary">Back</button></a>
      </div>
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
