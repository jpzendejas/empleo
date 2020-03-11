<!-- Navigation -->
<h6 class="navbar-heading text-muted">
  @if(auth()->user()->role == 'admin')
  Gestionar Datos
  @else
  Menù
  @endif
</h6>

<ul class="navbar-nav">
  @if(auth()->user()->role == 'admin')
  <li class="nav-item">
    <a class="nav-link" href="/home">
      <i class="ni ni-tv-2 text-red"></i> Menú
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/sliders">
      <i class="ni ni-image text-blue"></i>  Slider
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/videos">
      <i class="ni ni-tablet-button text-yellow"></i> Video capsulas
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/news">
      <i class="ni ni-send text-blue"></i>Boletines
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/governmentmembers">
      <i class="ni ni-satisfied text-yellow"></i>Ayuntamiento
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/governmentmembers">
      <i class="ni ni-collection text-yellow"></i>Sesiones de Ayuntamiento
    </a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" href="/doctors">
      <i class="ni ni-single-02 text-orange"></i> Médicos
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/patients">
      <i class="ni ni-satisfied text-info"></i> Pacientes
    </a>
  </li> -->
  @elseif(auth()->user()->role == 'doctor')
  <li class="nav-item">
    <a class="nav-link" href="/home">
      <i class="ni ni-calendar-grid-58 text-danger"></i> Gestionar horario
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/home">
      <i class="ni ni-time-alarm text-primary"></i> Mis citas
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/patients">
      <i class="ni ni-satisfied text-info"></i>  Mis pacientes
    </a>
  </li>
  @else {{--Patient--}}
  <li class="nav-item">
    <a class="nav-link" href="/home">
      <i class="ni ni-send text-danger"></i> Reservar cita
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/home">
      <i class="ni ni-time-alarm text-primary"></i> Mis citas
    </a>
  </li>

  @endif
  <li class="nav-item">
    <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
      <i class="ni ni-key-25 text-info"></i>Cerrar sesíon
    </a>
    <form  action="{{route('logout')}}" method="post" style="display: none;" id="formLogout">
      @csrf
    </form>
  </li>
</ul>
@if(auth()->user()->role == 'admin')
<!-- Divider -->
      <hr class="my-3">
      <!-- Heading -->
      <h6 class="navbar-heading text-muted">Reportes</h6>
      <!-- Navigation -->
      <ul class="navbar-nav mb-md-3">
        <li class="nav-item">
          <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
            <i class="ni ni-collection text-yellow"></i> Frecuencia de citas
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
            <i class="ni ni-spaceship text-red"></i> Médicos más activos
          </a>
        </li>

      </ul>
@endif
