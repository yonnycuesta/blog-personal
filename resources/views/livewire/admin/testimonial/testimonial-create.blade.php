    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Registrar testimonio</h1>
                        <a href="{{ route('testimonials.index') }}" class="btn btn-primary float-right bg-info border-0">
                            <i class="fas fa-arrow-left"></i>
                            <span>Regresar</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="store">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="text-muted">Nombre del cliente</label>
                                        <input type="text" class="form-control" wire:model="name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="designation" class="text-muted">Cargo o Profesión</label>
                                        <input type="text" class="form-control" wire:model="designation">
                                        @error('designation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description" class="text-muted">Comentario</label>
                                        <textarea class="form-control" wire:model="description" rows="3"></textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
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
