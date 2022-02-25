<div class="" id="carousel">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        @for($i=1;$i<=count($sliders);$i++)
          <li data-target="#carouselExampleCaptions" data-slide-to="{{$i}}"></li> 
        
        @endfor
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{asset('uploads/slider/'.$first->image)}}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>{{$first->name}}</h5>
          </div>
        </div>
        @foreach ($sliders as $slider)
        <div class="carousel-item">
          <img src="{{asset('uploads/slider/'.$slider->image)}}" class="d-block w-100" alt="{{$slider->name}}">
          <div class="carousel-caption d-none d-md-block">
            <h5>{{$slider->name}}</h5>
          </div>
        </div>
        @endforeach
      </div>
      <button class="carousel-control-prev carouselPrev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </button>
      <button class="carousel-control-next carouselNext" type="button" data-target="#carouselExampleCaptions" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </button>
    </div>
</div>