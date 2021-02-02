@extends ('layouts.main')

@section ('content')
   <div class="container">
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
        <input type="text" class="form-control" id="name" name="name" value=" {{ old('name')}} ">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description"> {{ old('description')}} </textarea>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name="price" value=" {{ old('price')}} ">
    </div>
    <div class="form-group">
        <label for="brand">Brand</label>
        <input type="text" class="form-control" id="brand" name="brand" value=" {{ old('brand')}} ">
    </div>
    <div class="form-group">
        <label for="image">Upload an image</label>
        <input type="file" accept="image/*" class="form-control" id="image" name="image">
    </div>

    {{-- SPECS --}}

    <div class="form-row mb-3">
        <div class="col">
            <label for="category">Categoria:</label>
            <input type="text" class="form-control" placeholder="{{ old('category')}}" id="category" name="category">
        </div>
        <div class="col">
            <label for="genre">Genere:</label>
            <input type="text" class="form-control" placeholder="{{ old('genre')}}" id="genre" name="genre">
        </div>
        <div class="col">
            <label for="handlebar">Manubrio:</label>
            <input type="text" class="form-control" placeholder="{{ old('handlebar')}}" id="handlebar" name="handlebar">
        </div>
    </div>
    <div class="form-row mb-3">
        <div class="col">
            <label for="saddle">Sella:</label>
            <input type="text" class="form-control" placeholder="{{ old('saddle')}}" id="saddle" name="saddle">
        </div>
        <div class="col">
            <label for="wheels">Ruote:</label>
            <input type="text" class="form-control" placeholder="{{ old('wheels')}}" id="wheels" name="wheels">
        </div>
        <div class="col">
            <label for="tires">Copertoni:</label>
            <input type="text" class="form-control" placeholder="{{ old('tires')}}" id="tires" name="tires">
        </div>
    </div>
    <div class="form-row mb-3">
        <div class="col">
            <label>Parafango:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="fenders" id="fenders1" value="true" checked>
                <label class="form-check-label" for="fenders1">
                  Sì
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="fenders" id="fenders2" value="false" checked>
                <label class="form-check-label" for="fenders2">
                  No
                </label>
            </div>
        </div>
        <div class="col">
            <label>Luci:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="light" id="light1" value="true" checked>
                <label class="form-check-label" for="light1">
                  Sì
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="light" id="light2" value="false" checked>
                <label class="form-check-label" for="light2">
                  No
                </label>
            </div>
        </div>
        <div class="col">
            <label>E-bike:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="electrical" id="electrical1" value="true" checked>
                <label class="form-check-label" for="electrical1">
                  Sì
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="electrical" id="electrical2" value="false" checked>
                <label class="form-check-label" for="electrical2">
                  No
                </label>
            </div>
        </div>
    </div>
    <div class="form-row  mb-3">
        <div class="col">
            <label for="brakes">Freni:</label>
            <input type="text" class="form-control" placeholder="{{ old('brakes')}}" id="brakes" name="brakes">
        </div>
        <div class="col">
            <label for="gear">Rapporti:</label>
            <input type="text" class="form-control" placeholder="{{ old('gear')}}" id="gear" name="gear">
        </div>
    </div>

    <input type="submit" class="btn btn-primary" value="submit">
  </form>


   </div>
   @endsection 
 