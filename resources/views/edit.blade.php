@extends('layouts.master')
@section('content')
{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/
  npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body> --}}

<div class="container"><br>
  <h2>Note Update</h2>
  @if (count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form action="{{Route('update',$product->id)}}" method="POST" >
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="" placeholder="Enter title" name="title" value="{{$product->title}}" value="{{old('title')}}">
    </div>
    <div class="form-group">
      <label for="">Description</label><br>
      <textarea type="text" name="description" id="" cols="30" rows="5" placeholder="Write here!" value="{{$product->description}}">{{$product->description}}</textarea>
    </div>

    <button type="update" class="btn btn-primary">Update</button>
  </form>
</div>

{{-- </body>
</html>
</x-app-layout> --}}
@endsection
