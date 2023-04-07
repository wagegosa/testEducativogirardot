<table class="table table-bordered">
    <thead>
    <td>Nombre</td>
    <td>Email</td>
    <td>Género</td>
    <td>Fecha de nacimiento</td>
    <td>Edad</td>
    <td>Carrera</td>
    </thead>
    <tbody>
    @foreach($students_list as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->format_date }}</td>
            <td>{{ $user->age }}</td>
            <td>{{ $user->career->career }}</td>
        </tr>
    @endforeach
    </tbody>
</table>