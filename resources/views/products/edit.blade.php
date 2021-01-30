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
  <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
      
      @csrf
      @method('PATCH')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value=" {{ old('name', $product->name)}} ">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description"> {{ old('description', $product->description)}} </textarea>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name="price" value=" {{ old('price', $product->price)}} ">
    </div>
    <div class="form-group">
        <label for="brand">Brand</label>
        <input type="text" class="form-control" id="brand" name="brand" value=" {{ old('brand', $product->brand)}} ">
    </div>
    <div class="form-group">
        <label for="image">Upload an image</label>
        @isset($product->image)
            <img src=" {{ old('image', $product->image)}} " width="200" alt="{{ old('name', $product->name)}}">
        @endisset
        <input type="file" accept="image/*" class="form-control" id="image" name="image">
    </div>

    {{-- SPECS --}}

    <div class="form-row mb-3">
        <div class="col">
            <label for="category">Categoria:</label>
            <input type="text" class="form-control" value="{{ old('category', $product->specs->category) }}" id="category" name="category">
        </div>
        <div class="col">
            <label for="genre">Genere:</label>
            <input type="text" class="form-control" value="{{ old('genre', $product->specs->genre)}}" id="genre" name="genre">
        </div>
        <div class="col">
            <label for="handlebar">Manubrio:</label>
            <input type="text" class="form-control" value="{{ old('handlebar', $product->specs->handlebar)}}" id="handlebar" name="handlebar">
        </div>
    </div>
    <div class="form-row mb-3">
        <div class="col">
            <label for="saddle">Sella:</label>
            <input type="text" class="form-control" value="{{ old('saddle', $product->specs->saddle)}}" id="saddle" name="saddle">
        </div>
        <div class="col">
            <label for="wheels">Ruote:</label>
            <input type="text" class="form-control" value="{{ old('wheels', $product->specs->wheels)}}" id="wheels" name="wheels">
        </div>
        <div class="col">
            <label for="tires">Copertoni:</label>
            <input type="text" class="form-control" value="{{ old('tires', $product->specs->tires)}}" id="tires" name="tires">
        </div>
    </div>
    <div class="form-row mb-3">
        <div class="col">
            <label>Parafango:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="fenders" id="fenders1" value="true" {{ $product->specs->fenders == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="fenders1">
                  Sì
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="fenders" id="fenders2" value="false" {{ $product->specs->fenders == 0 ? 'checked' : '' }}>
                <label class="form-check-label" for="fenders2">
                  No
                </label>
            </div>
        </div>
        <div class="col">
            <label>Luci:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="light" id="light1" value="true" {{ $product->specs->light == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="light1">
                  Sì
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="light" id="light2" value="false" {{ $product->specs->light == 0 ? 'checked' : '' }}>
                <label class="form-check-label" for="light2">
                  No
                </label>
            </div>
        </div>
        <div class="col">
            <label>E-bike:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="electrical" id="electrical1" value="true" {{ $product->specs->electrical == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="electrical1">
                  Sì
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="electrical" id="electrical2" value="false" {{ $product->specs->electrical == 0 ? 'checked' : '' }}>
                <label class="form-check-label" for="electrical2">
                  No
                </label>
            </div>
        </div>
    </div>
    <div class="form-row  mb-3">
        <div class="col">
            <label for="brakes">Freni:</label>
            <input type="text" class="form-control" value="{{ old('brakes', $product->specs->brakes)}}" id="brakes" name="brakes">
        </div>
        <div class="col">
            <label for="gear">Rapporti:</label>
            <input type="text" class="form-control" value="{{ old('gear', $product->specs->gear)}}" id="gear" name="gear">
        </div>
    </div>

    <input type="submit" class="btn btn-primary" value="Edit">
  </form>

@endsection