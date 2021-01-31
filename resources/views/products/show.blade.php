@extends ('layouts.main')

@section ('content')

 <section>
    @if (session('author'))
        <div class="alert alert-success">
          <p>Il commento di {{ session('author') }} è stato eliminato</p>
        </div>
    @endif

     <h2>{{ $product->name }}</h2>
     <small>{{ $product->price }}</small>
     <span class="brand">
        {{ $product->brand }}
     </span>
     <a class="btn btn-primary" href="{{ route('products.edit', $product->slug) }}">Edit</a>
     <form action="{{ route('products.destroy', $product->id) }}" method="POST">
         @csrf
         @method('DELETE')
         <input class="btn btn-danger" type="submit" value="Delete">
     </form>
     <!-- @dump($product) -->
     @if (!empty($product->image)) 
        <img width="200" src="{{ asset('storage/'. $product->image) }}" alt="">
     @else 
        <img width="200" src="{{ asset('img/no_img_available.svg') }}" alt="">
     @endif
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
        <a href="{{ route('reviews.create') }}">Aggiungi recensione</a>
      </div>
      <ul>
        @foreach ($reviews as $review)
        <li>
          <h3>{{ $review->author }}</h3>
          <p>{{ $review->rating }} <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-primary">Edit review</a> </p>
          <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" value="Delete">
          </form>

          <p>{{ $review->body }}</p>
          <p>{{ $review->updated_at->diffForHumans() }}</p>
        </li>
        @endforeach
      </ul>
 </section>

@endsection