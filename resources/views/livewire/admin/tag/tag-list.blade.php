<div class="row">
    <div class="col-12 mt-4">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Etiquetas |Listado</h3>
                <div class="mt-5">
                    <div class="input-group input-group-sm">
                        <input type="text" name="search" wire:model="search" class="form-control float-right"
                            placeholder="Buscar por el nombre de la etiqueta, proyecto o publicación.">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('tags.create') }}" class="btn btn-primary btn-sm float-right">
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
                            <th scope="col">Nombre del Portfolio</th>
                            <th scope="col">Nombre de la Publicación</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($tags as $tag)
                                <td>{{ $tag->name }}</td>
                                <td>
                                    {{ $tag->portfolio->title ?? '' }}
                                </td>
                                <td>
                                    {{ $tag->post->title ?? '' }}
                                </td>
                                <td>
                                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-pencil-alt"></i>
                                        Editar
                                    </a>

                                    <button type="button" wire:click="confirmDelete({{ $tag->id }})"
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
                {{ $tags->links() }}
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
                confirmButtonText: 'Sí, quiero eliminarla!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('delete', event.detail.id);
                }
            })
        })
    </script>
    <script>
        // Mostrar toastr
        window.addEventListener('toastr-delete', event => {
            toastr.warning(event.detail.message);
        })
    </script>
@endsection
