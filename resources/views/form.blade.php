
<div class="container"><br>
  <h2>User Note</h2>
  @if (count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form action="{{Route('store')}}" method="POST" >
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="" placeholder="Enter title" name="title" value="{{old('title')}}" required>
    </div>
    <div class="form-group">
      <label for="">Description</label><br>
      <textarea type="text" name="description" id="" cols="100" rows="5" placeholder="Write here!" required>{{old('description')}}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


