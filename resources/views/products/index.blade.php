@extends ('layouts.main')

@section ('content')
    <div class="container">

    
 <section>
        <h2 class='text-center mt-3'>Lista Bici</h2>
        <div class="row mt-3">
         @foreach ($products as $product)
         <div class="col-sm-3 text-center mb-5">
                <h3>{{ $product->name }}</h3>
                @if (!empty($product->image)) 
                <img class='mb-3' width="200" src="{{ asset('storage/'. $product->image) }}" alt="">
                @else 
                <img class='mb-3' width="200" src="{{ asset('img/no_img_available.svg') }}" alt="">
                @endif
                <small class='d-block mb-3'>€ {{ $product->price }}</small>
                <a class="btn btn-primary" href="{{ route('products.show', $product->slug) }}">Mostra</a>
                <a class="btn btn-primary" href="{{ route('products.edit', $product->slug) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                <form class='d-inline' action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger " type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
            </div>
         @endforeach
</div>
     {{ $products->links() }}
 </section>
 </div>
@endsection