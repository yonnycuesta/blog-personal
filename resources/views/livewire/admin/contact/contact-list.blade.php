<div class="row">
    <div class="col-12 mt-4">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Contactos |Listado</h3>
                <div class="mt-5">
                    <div class="input-group input-group-sm">
                        <input type="text" name="search" wire:model="search" class="form-control float-right"
                            placeholder="Buscar por el nombre o correo electrónico.">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>

                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Mensaje</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            @foreach ($contacts as $contact)
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>
                                   {{ $contact->description }}
                                </td>
                                <td>
                                    <a href="{{ route('contacts.show', $contact->id) }}"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                        Detalles
                                    </a>

                                    <button type="button" wire:click="confirmDelete({{ $contact->id }})"
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
                {{ $contacts->links() }}
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

    <script>
        // Mostrar toastr
        window.addEventListener('toastr-delete', event => {
            toastr.warning(event.detail.message);
        })
    </script>
@endsection
