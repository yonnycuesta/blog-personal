<div class="row">
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-bold">Sobre mi|Listado</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <input type="text" name="search" wire:model="search" class="form-control float-right"
                            placeholder="Nombre, email o phone">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="m-4">
                        <a href="{{ route('aboutme.create') }}" class="btn btn-primary btn-sm float-right">
                            <i class="fas fa-plus"></i>
                            Agregar nuevo
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($aboutme as $about)
                                <td>{{ $about->fullname }}</td>
                                <td>{{ $about->email }}</td>
                                <td>{{ $about->phone }}</td>
                                <td>
                                    @if ($about->photo)
                                        <img src="{{ asset($about->photo) }}" alt="{{ $about->fullname }}"
                                            class="img-fluid" style="max-width: 100px;">
                                    @else
                                        <span class="badge badge-primary">No hay imagen</span>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{ route('aboutme.details', $about->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                        Detalles
                                    </a>

                                    <a href="{{ route('aboutme.edit', $about->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-pencil-alt"></i>
                                        Editar
                                    </a>

                                    <button type="button" wire:click="confirmDelete({{ $about->id }})"
                                        class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                        Eliminar
                                    </button>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{ $aboutme->links() }}
            </div>
        </div>

    </div>
</div>

@section('scripts')
    <script>
        // Eliminar
        window.addEventListener('confirm-delete', event => {
            Swal.fire({
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.icon,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, quiero eliminarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('delete', event.detail.id);
                }
            })
        })
    </script>
@endsection
