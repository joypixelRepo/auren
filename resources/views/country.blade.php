@include('head')
<body>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <a href="javascript: history.go(-1)" title="Volver al inicio">
            <button class="come-back">
              <i class="fa-sharp fa-solid fa-arrow-left"></i>Volver atrás
            </button>
          </a>
          <div class="col-1 mt-3">
            <div class="flag">
              <img src="{{$countryApi[0]->flags->svg}}" alt="bandera">
            </div>
          </div>
          <table class="countries">
            <thead>
              <tr>
                <td>Nombre común</td>
                <td>Nombre oficial</td>
                <td>Capital</td>
                <td>Población</td>
                <td>Región</td>
                <td>Subregión</td>
                <td>Área</td>
                <td>CCA2</td>
              </tr>
            </thead>
            <tbody>
              @foreach ($countryApi as $countryData)
              <tr>
                <td>{{$countryData->name->common}}</td>
                <td>{{$countryData->name->official}}</td>
                <td>{{$countryData->capital[0]}}</td>
                <td>{{number_format($countryData->population, 0, ',', '.')}} hab.</td>
                <td>{{$countryData->region}}</td>
                <td>{{$countryData->subregion}}</td>
                <td>{{number_format($countryData->area, 0, ',', '.')}}km<sup>2</sup></td>
                <td>{{$countryData->cca2}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="google-maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d4023504.9113436965!2d{{$countryApi[0]->latlng[1]}}!3d{{$countryApi[0]->latlng[0]}}!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1670239027956!5m2!1ses!2ses" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <a href="javascript: history.go(-1)" title="Volver al inicio">
            <button class="come-back">
              <i class="fa-sharp fa-solid fa-arrow-left"></i>Volver atrás
            </button>
          </a>
        </div>
      </div>
    </div>
  <div>
</body>
</html>