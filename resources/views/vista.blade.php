<h1>Reporte de usuario</h1>
<table class="table table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Ci</th>
        <th>tipo de Usuario</th>
        <th>Facultad</th>
    </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td class="table-text">{{$user->id}}</td>>
                <td class="table-text">{{$user->name}}</td>
                <td class="table-text">{{$user->apellido}}</td>
                <td class="table-text">{{$user->email}}</td>
                <td class="table-text">{{$user->ci}}</td>
                <td class="table-text">{{\App\TipoUsuario::findOrFail($user->idtipousuario)->descripcion}}</td>

                <td class="table-text">{{\App\Facultad::findOrFail($user->idfacultad)->descripcion}}</td>
            </tr>
            @endforeach
    </tbody>
</table>

