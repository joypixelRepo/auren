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
                <td>Nombre común</td>
                <td>Nombre oficial</td>
                <td>Capital</td>
                <td>Región</td>
                <td>CCA2</td>
                <td colspan="5"></td>
              </tr>
            </thead>
            <tbody>
              @foreach ($countriesApi as $key => $country)
              <tr>
                <td>{{ $country->name->common }}</td>
                <td>{{ $country->name->official }}</td>
                @if (!empty($country->capital))
                  <td>
                  @foreach ($country->capital as $capitals)
                    {{ $capitals }}
                  @endforeach
                  </td>
                @else
                  <td>Sin capital</td>
                @endif
                <td>{{ $country->region }}</td>
                <td>{{ $country->cca2 }}</td>
                <td>
                  <a href="#" title="Ver más información de {{$country->name->common}}">
                    <button class="read">
                      <i class="fa-solid fa-circle-info"></i>
                    </button>
                  </a>
                </td>
                <td>
                  @if (!in_array($country->cca2, $countriesInDb))
                  <a href="/add/{{$country->cca2}}?ret={{$_SERVER['REQUEST_URI']}}"
                    title="Guardar {{$country->name->common}}">
                    <button class="create">
                      <i class="fa-solid fa-floppy-disk"></i>
                    </button>
                  </a>
                  @else
                    <button disabled title="{{$country->name->common}} ya está guardado" class="created">
                      <i class="fa-solid fa-thumbs-up"></i>
                    </button>
                  @endif
                </td>
                <td>
                  @if (in_array($country->cca2, $countriesInDb))
                  <a href="/upd/{{$country->cca2}}?ret={{$_SERVER['REQUEST_URI']}}" title="Actualizar {{$country->name->common}}">
                    <button class="update">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                  </a>
                  @endif
                </td>
                <td>
                  @if (in_array($country->cca2, $countriesInDb))
                  <a href="/del/{{$country->cca2}}?ret={{$_SERVER['REQUEST_URI']}}" title="Borrar {{$country->name->common}}">
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