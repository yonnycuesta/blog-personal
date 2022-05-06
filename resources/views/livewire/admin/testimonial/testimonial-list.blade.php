<div class="row">
    <div class="col-12 mt-4">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold">Testimonios |Listado</h3>
                <div class="mt-5">
                    <div class="input-group input-group-sm">
                        <input type="text" name="search" wire:model="search" class="form-control float-right"
                            placeholder="Buscar por nombre, cargo del usuario o descripción del testimonio.">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('testimonials.create') }}" class="btn btn-primary btn-sm float-right">
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
                            <th scope="col">Cargo o Profesión</th>
                            <th scope="col">Comentario</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            @foreach ($testimonials as $testimonial)
                                <td>{{ $testimonial->name }}</td>
                                <td>
                                    {{ $testimonial->designation }}
                                </td>
                                <td>
                                    @php
                                        $s = $testimonial->description;
                                        $s = substr($s, 0, 50);
                                        echo $s . '..';
                                    @endphp
                                </td>
                                <td>
                                    <a href="{{ route('testimonials.show', $testimonial->id) }}"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                        Detalles
                                    </a>

                                    <a href="{{ route('testimonials.edit', $testimonial->id) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="fas fa-pencil-alt"></i>
                                        Editar
                                    </a>

                                    <button type="button" wire:click="confirmDelete({{ $testimonial->id }})"
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
                {{ $testimonials->links() }}
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

@section('js')
    <script>
        // Mostrar toastr
        window.addEventListener('toastr-delete', event => {
            toastr.warning(event.detail.message);
        })
    </script>
@endsection
