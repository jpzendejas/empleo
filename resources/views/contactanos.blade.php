@extends('layouts.contact')
@section('content')
<div class="page-wrap">
  <div class="page-wrapper">
    <div class="primary-content marRight30">
      <div class="mid-panel">
        <div class="mid-panel-content">
          <div class="title">
            <h1>contáctanos</h1>
          </div>
          <div class="border"></div>
          <h2>Envio de Correo Electrónico</h2>
          <form action="{{mail.php}}">
            <div class="contact-form margin-top">
              <label> <span>Nombre</span>
              <input type="text" class="input_text" name="name" id="name"/>
              </label>
              <label> <span>Email</span>
              <input type="text" class="input_text" name="email" id="email"/>
              </label>
              <label> <span>Asunto</span>
              <input type="text" class="input_text" name="subject" id="subject"/>
              </label>
              <label> <span>Mensaje</span>
              <textarea class="message" name="feedback" id="feedback"></textarea>
              <input type="submit" class="button" value="Enviar" />
              </label>
            </div>
          </form>
          <div class="clearing"></div>
          <div class="address">
            <div class="panel">
              <div class="title">
                <h1>Zona Centro</h1>
              </div>
              <div class="content">
                <p>Portal Octaviano Muñoz Ledo s/n,<br />
                  Salamanca, Guanajuato, México</p>
                <p><span>Telefono :</span> (464) 641-4500</p>
                <p><span>Correo :</span> <a href="mailto:info@companyname.com">info@companyname.com</a></p>
              </div>
            </div>
            <div class="panel">
              <div class="title">
                <h1>Leona Vicario</h1>
              </div>
              <div class="content">
                <p>C.Leona Vicario #323, Col. San Juan Chihuahua.<br />
                  Salamanca, Guanajuato, México</p>
                  <p><span>Telefono :</span> (464) 641-4500</p>
                <p><span>Email :</span> <a href="mailto:info@companyname.com">info@companyname.com</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="sidebar">
      <div class="search-panel">
        <div class="content">
          <div class="title">
            <h1>Buscar</h1>
          </div>
          <div class="border"></div>
          <h2>Buscar en el sitio...</h2>
          <div class="searchbox">
            <input type="text" class="input" value="" />
            <div class="button"><a href="#"></a></div>
          </div>
        </div>
      </div>
      <div class="midpanel">
        <div class="content marginBottom">
          <div class="title">
            <h1>Accesos Directos</h1>
          </div>
          <div class="border"></div>
          <ul>
            <li><a href="/salamanca/pdfs/ProgramadeGobiernoMunicipalultimofoto2.pdf" target="_blank">Programa de Gobierno Municipal</a></li>
            <li><a href="https://www.youtube.com/watch?v=uPedd3AJk84" target="_blank">15a Sesión Ordinaria del H. Ayuntamiento.</a></li>
            <li><a href="/salamanca/pdfs/CONVOCATORIA_PEJ_2019.pdf" target="_blank">Premio Estatal de la Juventud 2019</a></li>
            <li><a href="https://www.youtube.com/watch?v=Wz5UEZPl3eE" target="_blank">14a Sesión Ordinaria del H. Ayuntamiento</a></li>
            <li><a href="http://www.salamanca.gob.mx/Transparencia/Transparencia.htm" target="_blank">Transparencia</a></li>
            <li><a href="http://saresalamanca.mx/sare/" target="_blank">SARE</a></li>
            <!-- <li class="borderNone padBottom20"><a href="#">In condimentum velit at ipsum portti</a></li> -->
          </ul>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
