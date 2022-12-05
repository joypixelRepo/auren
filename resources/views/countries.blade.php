@include('head')
<body>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <a href="/" title="Volver al inicio">
            <button class="come-back">
              <i class="fa-sharp fa-solid fa-arrow-left"></i>Volver al inicio
            </button>
          </a>
          <table class="countries">
            <thead>
              <tr>
                <td></td>
                <td>Nombre común</td>
                <td>Nombre oficial</td>
                <td>Capital</td>
                <td>Región</td>
                <td>CCA2</td>
                <td class="bg-white"></td>
              </tr>
            </thead>
            <tbody>
              @foreach ($countriesApi as $key => $country)
              <tr>
                <td>
                  <a href="/view/{{$country->cca2}}">
                    <img class="mini-flag" src="{{ $country->flags->svg }}" alt="bandera">
                  </a>
                </td>
                <td class="fw600">
                  <a class="cblack" href="/view/{{$country->cca2}}">{{ $country->name->common }}</a>
                </td>
                <td>{{ $country->name->official }}</td>
                @if (!empty($country->capital))
                  <td>{{$country->capital[0]}}</td>
                @else
                  <td>Sin capital</td>
                @endif
                <td>{{ $country->region }}</td>
                <td class="fw600">{{ $country->cca2 }}</td>
                <td class="text-start bg-white">
                  <!-- <a href="/view/{{$country->cca2}}"
                    title="Ver más información de {{$country->name->common}}">
                    <button class="read">
                      <i class="fa-solid fa-circle-info"></i>
                    </button>
                  </a> -->
                  @if (!in_array($country->cca2, $countriesInDb))
                  <a href="/add/{{$country->cca2}}?ret={{$_SERVER['REQUEST_URI']}}"
                    class="confirm"
                    onclick="return confirm('¿Quieres crear el país {{$country->name->common}}?')" 
                    title="Guardar {{$country->name->common}}">
                    <button class="create">
                      <i class="fa-solid fa-floppy-disk"></i>
                    </button>
                  </a>
                  @else
                    <a href="/upd/{{$country->cca2}}?ret={{$_SERVER['REQUEST_URI']}}"
                      class="confirm"
                      onclick="return confirm('¿Quieres actualizar {{$country->name->common}}?')"
                      title="Actualizar {{$country->name->common}}">
                      <button class="update">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </button>
                    </a>
                  @endif
                  @if (in_array($country->cca2, $countriesInDb))
                  <a href="/del/{{$country->cca2}}?ret={{$_SERVER['REQUEST_URI']}}"
                    class="confirm"
                    onclick="return confirm('¿Quieres eliminar {{$country->name->common}}?')"
                    title="Borrar {{$country->name->common}}">
                    <button class="delete">
                      <i class="fa-solid fa-trash-can"></i>
                    </button>
                  </a>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a href="/" title="Volver al inicio">
            <button class="come-back">
              <i class="fa-sharp fa-solid fa-arrow-left"></i>Volver al inicio
            </button>
          </a>
        </div>
      </div>
    </div>
  <div>
</body>
</html>