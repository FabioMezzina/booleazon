@extends ('layouts.main')

@section ('content')
   
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
      
      @csrf
      @method('POST')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description"></textarea>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name="price">
    </div>
    <div class="form-group">
        <label for="brand">Brand</label>
        <input type="text" class="form-control" id="brand" name="brand">
    </div>
    <div class="form-group">
        <label for="image">Upload an image</label>
        <input type="file" accept="image/*" class="form-control" id="image" name="image">
    </div>

    <input type="submit" class="btn btn-primary" value="submit">
  </form>

@endsection