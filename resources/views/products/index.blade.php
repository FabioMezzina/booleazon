@extends ('layouts.main')

@section ('content')

 <section>
     <ul>
         @foreach ($products as $product)
             <li>
                 <h3>{{ $product->name }}</h3>
                 <small>{{ $product->price }}</small>
                 <img src="{{ $product->image }}" width="200" alt="{{ $product->name }}">
                 <a class="btn btn-primary" href="#">Show</a>
                 <a class="btn btn-primary" href="#">Edit</a>
                 <a class="btn btn-danger" href="#">Delete</a>
             </li>
         @endforeach
     </ul>
 </section>

@endsection