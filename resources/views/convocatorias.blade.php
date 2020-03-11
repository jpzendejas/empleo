<div id="myCarousel" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
@foreach($convocatorias as $key => $convocatoria)
@if($key == 0)
<li data-target="#myCarousel" data-slide-to="{{$convocatoria->id}}" class="active"></li>
@else
<li data-target="#myCarousel" data-slide-to="{{$convocatoria->id}}"></li>
@endif
@endforeach
</ol>
<div class="carousel-inner">
  @foreach($convocatorias as $key => $convocatoria)
  @if($key == 0)
  <div class="item active">
    <img src="elementos/{{$convocatoria->imagen}}" alt="{{$convocatoria->titulo}}" style="width:100%;">
  </div>
  @else
  <div class="item">
    <img src="elementos/{{$convocatoria->imagen}}" alt="{{$convocatoria->titulo}}" style="width:100%;">
  </div>
  @endif
@endforeach
</div>
<a class="left carousel-control" href="#myCarousel" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right"></span>
  <span class="sr-only">Next</span>
</a>
</div>
