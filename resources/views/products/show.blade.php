@extends ('layouts.main')

@section ('content')
  <div class="container">

  
 <section>
    @if (session('author'))
        <div class="alert alert-success">
          <p>Il commento di {{ session('author') }} è stato eliminato</p>
        </div>
    @endif

     <h2>{{ $product->name }}</h2>
     <span class="brand">
       {{ $product->brand }}
      </span>
      <a class="btn btn-primary" href="{{ route('products.edit', $product->slug) }}">Edit</a>
      <form class='d-inline' action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input class="btn btn-danger" type="submit" value="Elimina">
      </form>
      <!-- @dump($product) -->
      @if (!empty($product->image)) 
      <img class='d-block' width="200" src="{{ asset('storage/'. $product->image) }}" alt="">
      @else 
      <img class='d-block' width="200" src="{{ asset('img/no_img_available.svg') }}" alt="">
      @endif
      <small class='d-block'>€ {{ $product->price }}</small>
     <p class="description">
        {{ $product->description }}
     </p>
     <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">Categoria</th>
            <th scope="col">Genere</th>
            <th scope="col">Manubrio</th>
            <th scope="col">Sella</th>
            <th scope="col">Ruote</th>
            <th scope="col">Copertoni</th>
            <th scope="col">Parafanghi</th>
            <th scope="col">Luci</th>
            <th scope="col">Elettrica</th>
            <th scope="col">Freni</th>
            <th scope="col">Cambio</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $product->specs->category }}</td>
            <td>{{ $product->specs->genre }}</td>
            <td>{{ $product->specs->handlebar }}</td>
            <td>{{ $product->specs->saddle }}</td>
            <td>{{ $product->specs->wheels }}</td>
            <td>{{ $product->specs->tires }}</td>
            <td><div class="btn {{$product->specs->fenders ? 'btn-success' : 'btn-danger' }}">{{ $product->specs->fenders ? 'Sì' : 'No' }}</div></td>
            <td><div class="btn {{$product->specs->light ? 'btn-success' : 'btn-danger' }}">{{ $product->specs->light ? 'Sì' : 'No' }}</div></td>
            <td><div class="btn {{$product->specs->electrical ? 'btn-success' : 'btn-danger' }}">{{ $product->specs->electrical ? 'Sì' : 'No' }}</div></td>
            <td>{{ $product->specs->brakes }}</td>
            <td>{{ $product->specs->gear }}</td>
          </tr>
        </tbody>
      </table>

      {{-- Reviews --}}
      <div>
      </div>
      <ul>
        @foreach ($reviews as $review)
        <li>
          <blockquote class="blockquote">
            <p>{{ $review->body }}</p>
            <div class="blockquote-footer">scritta da {{ $review->author }}- <cite title="data">{{ $review->updated_at->diffForHumans() }}</cite></div>
            <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-primary">Edit review</a>
            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <input class="btn btn-danger" type="submit" value="Delete">
            </form>
          </blockquote>
        </li>
        @endforeach
      </ul>





      <h2>Inserisci nuovo commento</h2>
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
    
      <form action="{{ route('reviews.store') }}" method="POST">
        @csrf
        @method ('POST')
        <div class="form-group">
          <label for="author">Inserisci autore</label>
          <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}">
        </div>
        <div class="form-group">
          <label for="rating">Voto</label>
          <input type="number" min="1" max="10" class="form-control" id="rating" name="rating" value="{{ old('rating') }}">
        </div>
        <div class="form-group">
          <label for="body">Commento</label>
          <textarea class="form-control" id="body" name="body">{{ old('body') }}</textarea>
        </div>
        <input hidden type="number" name="product_id" value="{{ $product->id }}">
        <input type="submit" class="btn btn-primary" value="Modifica">
      </form>

 </section>
 </div>
@endsection