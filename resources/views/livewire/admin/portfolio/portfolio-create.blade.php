<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h1 class="card-title">Crear registro</h1>
                    <a href="{{ route('portfolios.index') }}" class="btn btn-primary float-right bg-info border-0">
                        <i class="fas fa-arrow-left"></i>
                        <span>Regresar</span>
                    </a>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title" class="text-muted">Título</label>
                                    <input type="text" class="form-control form-control-sm" wire:model="title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div wire:ignore>
                                    <div class="form-group">
                                        <label for="category" class="text-muted">Categoría</label>
                                        <select class="form-control form-control-sm select2" wire:model="category_id"
                                            name="category_id">
                                            <option value="">Seleccione una categoría</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="photo" class="text-muted">Imagen</label>
                                    <input type="file" class="form-control-file form-control-sm" wire:model="photo">
                                    @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="portf_client" class="text-muted">Nombre del cliente</label>
                                    <input type="text" class="form-control form-control-sm" wire:model="portf_client">
                                    @error('portf_client')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="portf_url" class="text-muted">Enlace del proyecto</label>
                                    <input type="url" class="form-control form-control-sm" wire:model="portf_url"
                                        placeholder="http://www.example.com">
                                    @error('portf_url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="date_created" class="text-muted">Fecha de creación</label>
                                    <input type="date" class="form-control form-control-sm" wire:model="date_created">
                                    @error('date_created')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description" class="text-muted">Descripción</label>
                                    <textarea class="form-control form-control-sm" wire:model="description" rows="5"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2()
            // Capturar el evento para el cambio de la categoría
            $('.select2').on('change', function() {
                @this.set('category_id', $(this).val())
            })
        })
    </script>
@endsection

@section('scripts')
    <script>
        window.addEventListener('toastr-create', event => {
            toastr.success(event.detail.message);
        })
    </script>
@endsection
