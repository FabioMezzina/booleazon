@extends ('layouts.main')

@section ('content')

 <section>
     <ul>
         @foreach ($products as $product)
             <li>
                <h3>{{ $product->name }}</h3>
                <small>{{ $product->price }}</small>
                @if (!empty($product->image)) 
                    <img width="200" src="{{ asset('storage/'. $product->image) }}" alt="">
                @else 
                    <img width="200" src="{{ asset('img/no_img_available.svg') }}" alt="">
                @endif
                <a class="btn btn-primary" href="{{ route('products.show', $product->slug) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('products.edit', $product->slug) }}">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger" type="submit" value="Delete">
                </form>
             </li>
         @endforeach
     </ul>
     {{ $products->links() }}
 </section>

@endsection