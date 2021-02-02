      <div class='logo'>
            <h1 class='bike'>Bike</h1><h1 class='azon'>azon &#128690;</h1>
        </div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item {{ (request()->is('products')) ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('products.index') }}">Shop</a>
        </li>
        <li class="nav-item  {{ (request()->is('products/create')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('products.create') }}">Crea nuovo prodotto</a>
        </li>
      </ul>
    
    </div>
</nav>


        <script src="{{asset('js/app.js')}}"></script>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
