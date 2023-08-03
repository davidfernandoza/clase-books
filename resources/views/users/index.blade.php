<x-app title="Usuarios">
    <section class="container">
        <div class="d-flex justify-content-center my-4">
            <h1>Listado de usuarios</h1>
        </div>

        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Crear usuario</a>
            </div>
            <div class="card-body">
                <div class="table-responsive my-4 mx-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Cedula</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Email</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->number_id }}</th>
                                    <th scope="row">{{ $user->name }}</th>
                                    <th scope="row">{{ $user->last_name }}</th>
                                    <th scope="row">{{ $user->email }}</th>
                                    <th scope="row">
                                        <div class="d-flex">
                                            <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                                class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="ms-2 btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-app>
