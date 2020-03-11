<div class="row">
@foreach($imagenesindex as $key => $imagenindex)
<div class="column">
  <img src="./galeria/{{$imagenindex->img}}" style="width:100%" onclick="openModal();currentSlide({{$key}})" class="hover-shadow cursor">
</div>
@endforeach
</div>

<div id="myModal" class="modal">
<span class="close cursor" onclick="closeModal()">&times;</span>
<div class="modal-content">
@foreach($imagenes as $key=>$imagen)
  <div class="mySlides">
    <div class="numbertext">{{$key+1}} / </div>
    <img src="galeria/{{$imagen->img}}" style="width:1200px;height:600px;">
  </div>
@endforeach
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

<div class="caption-container">
  <p id="caption"></p>
</div>
@foreach($imagenesfooter as $key=> $imagenefooter)
<div class="column">
    <img class="demo cursor" src="./galeria/{{$imagenefooter->img}}" style="width:100%" onclick="currentSlide({{$key}})" alt="{{$imagenefooter->titulo}}">
</div>
@endforeach
</div>
</div>

<script>
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
