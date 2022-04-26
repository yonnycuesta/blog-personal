<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Actualizar testimonio</h1>
                    <a href="{{ route('testimonials.index') }}" class="btn btn-primary float-right bg-info border-0">
                        <i class="fas fa-arrow-left"></i>
                        <span>Regresar</span>
                    </a>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="text-muted">Nombre del cliente</label>
                                    <input type="text" class="form-control" wire:model="testimonial.name">
                                    @error('testimonial.name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="designation" class="text-muted">Cargo o Profesión</label>
                                    <input type="text" class="form-control" wire:model="testimonial.designation">
                                    @error('testimonial.designation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description" class="text-muted">Comentario</label>
                                    <textarea class="form-control" wire:model="testimonial.description" rows="5">
                                        {{ $testimonial->description }}
                                    </textarea>
                                    @error('testimonial.description')
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
