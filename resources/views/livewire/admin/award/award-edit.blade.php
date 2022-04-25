<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Actualizar logro</h1>
                    <a href="{{ route('awards.index') }}" class="btn btn-primary float-right">
                        <i class="fas fa-arrow-left"></i>
                        <span>Regresar</span>
                    </a>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title" class="text-muted">Nombre</label>
                                    <input type="text" class="form-control" wire:model="award.title">
                                    @error('award.title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="icon" class="text-muted">Icono</label>
                                    <input type="text" class="form-control" wire:model="award.icon">
                                    @error('award.icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if ($award->icon)
                                        <div class="mt-2">
                                            <label for="" class="text-muted">Icono actual: </label>
                                            <i class="{{ $award->icon }}"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="quantity" class="text-muted">Cantidad</label>
                                    <input type="number" class="form-control" wire:model="award.quantity">
                                    @error('award.quantity')
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
        window.addEventListener('toastr-update', event => {
            toastr.info(event.detail.message);
        })
    </script>
@endsection
