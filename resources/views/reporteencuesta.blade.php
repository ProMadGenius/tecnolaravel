<h1>Reporte de Encuestas</h1>
<table class="table table-hover">
    <thead>
    <tr>
        <th>IDfacultad</th>
        <th>Fecha inicio</th>
        <th>Fecha Finalizada</th>
        <th>Usuario1</th>
        <th>Usuario2</th>
        <th>Usuario3</th>
        <th>Usuario4</th>
        <th>Usuario5</th>
        <th>Usuario6</th>
        <th>Usuario7</th>
        <th>Usuario8</th>
        <th>Usuario9</th>
        <th>Usuario10</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td class="table-text">{{\App\Facultad::findOrFail($user->idfacultad)->descripcion}}</td>
            <td class="table-text">{{$user->fechainicio}}</td>
            <td class="table-text">{{$user->fechafin}}</td>
            <td class="table-text">{{\App\Usuario::findOrFail($user->idusuario1)->name}}</td>
            <td class="table-text">{{\App\Usuario::findOrFail($user->idusuario2)->name}}</td>
            <td class="table-text">{{\App\Usuario::findOrFail($user->idusuario3)->name}}</td>
            <td class="table-text">{{\App\Usuario::findOrFail($user->idusuario4)->name}}</td>
            <td class="table-text">{{\App\Usuario::findOrFail($user->idusuario5)->name}}</td>
            <td class="table-text">{{\App\Usuario::findOrFail($user->idusuario6)->name}}</td>
            <td class="table-text">{{\App\Usuario::findOrFail($user->idusuario7)->name}}</td>
            <td class="table-text">{{\App\Usuario::findOrFail($user->idusuario8)->name}}</td>
            <td class="table-text">{{\App\Usuario::findOrFail($user->idusuario9)->name}}</td>
            <td class="table-text">{{\App\Usuario::findOrFail($user->idusuario10)->name}}</td>



        </tr>
    @endforeach
    </tbody>
</table>
