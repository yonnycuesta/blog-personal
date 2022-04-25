<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Actualizar servicio</h1>
                    <a href="{{ route('services.index') }}" class="btn btn-primary float-right">
                        <i class="fas fa-arrow-left"></i>
                        <span>Regresar</span>
                    </a>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="text-muted">Nombre</label>
                                    <input type="text" class="form-control" wire:model="service.name">
                                    @error('service.name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="icon" class="text-muted">Icono</label>
                                    <input type="text" class="form-control" wire:model="service.icon">
                                    @error('service.icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    @if ($service->icon)
                                        <div class="mt-2">
                                            <label for="" class="text-muted">Icono actual: </label>
                                            <i class="{{ $service->icon }}"></i>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description" class="text-muted">Descripción</label>
                                    <textarea class="form-control" wire:model="service.description" rows="3">
                                        {{ $service->description }}
                                    </textarea>
                                    @error('service.description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-secondary">Actualizar</button>
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
