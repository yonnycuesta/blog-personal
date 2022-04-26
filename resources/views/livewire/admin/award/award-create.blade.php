<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Registrar logros</h1>
                    <a href="{{ route('awards.index') }}" class="btn btn-primary float-right bg-info border-0">
                        <i class="fas fa-arrow-left"></i>
                        <span>Regresar</span>
                    </a>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="store">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title" class="text-muted">Nombre</label>
                                    <input type="text" class="form-control" wire:model="title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="icon" class="text-muted">Icono</label>
                                    <input type="text" class="form-control" wire:model="icon">
                                    @error('icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="quantity" class="text-muted">Cantidad</label>
                                    <input type="number" class="form-control" wire:model="quantity">
                                    @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>

                </div>
                <div class="card-footer">

                </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>

@section('scripts')
    <script>
        window.addEventListener('toastr-create', event => {
            toastr.success(event.detail.message);
        })
    </script>
@endsection
