@extends ('layouts.main')

@section ('content')


<section class='carousel'>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
             <ol class="carousel-indicators">
                 <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
             </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('img/bicycle.jpg')}}" alt="First slide">
                 <div class="carousel-caption">
                     <h3>Scegli la bici perfetta per te</h3>
                     
                 </div>   
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('img/bicycle2.jpg')}}" alt="Second slide">
                <div class="carousel-caption">
                     <h3>Per ogni tipo di strada</h3>
                      
                 </div> 
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('img/mountain-bike.jpg')}}" alt="Third slide">
                <div class="carousel-caption">
                     <h3>Per ogni tipo di occasione</h3>
                 </div> 
            </div>
        </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        </section> 

@endsection