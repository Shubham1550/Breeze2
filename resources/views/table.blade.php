<x-app-layout>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>



<div class="container"><br>
  <h2>User Data Table</h2>
  @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Sr.No.</th>
        <th>Title</th>
        <th>Description</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($product as $p)


      <tr>
        <td>{{$p->id}}</td>
        <td>{{$p->title}}</td>
        <td>{{$p->description}}</td>
        <td><a href="{{route('edit',$p->id)}}"><button class="btn btn-success">edit</button></a>
            <a href="{{route('delete',$p->id)}}"><button class="btn btn-danger">delete</button></a></td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
</x-app-layout>
