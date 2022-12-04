@include('head')
<body>

  <table>
    <thead>
      <tr>
        <td>Nombre común</td>
        <td>Nombre oficial</td>
        <td>Capital</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($countries as $key => $country)
      <tr>
        <td>{{ $country->name->common }}</td>
        <td>{{ $country->name->official }}</td>
        @foreach ($country->capital as $capitals)
          <td>{{ $capitals }}</td>
        @endforeach
      </tr>
      @endforeach
    </tbody>
  </table>
  
</body>
</html>