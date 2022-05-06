<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Crear registro</h1>
                    <a href="{{ route('aboutme.index') }}" class="btn btn-primary float-right bg-info border-0">
                        <i class="fas fa-arrow-left"></i>
                        <span>Regresar</span>
                    </a>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fullname" class="text-muted">Nombre</label>
                                    <input type="text" class="form-control form-control-sm" wire:model="fullname">
                                    @error('fullname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="age" class="text-muted">Edad</label>
                                    <input type="number" class="form-control form-control-sm" wire:model="age">
                                    @error('age')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="text-muted">Correo electrónico</label>
                                    <input type="email" class="form-control form-control-sm" wire:model="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone" class="text-muted">Teléfono</label>
                                    <input type="tel" class="form-control form-control-sm" wire:model="phone">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="designation" class="text-muted">Profesión</label>
                                    <input type="text" class="form-control form-control-sm" wire:model="designation">
                                    @error('designation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="cvs" class="text-muted">Hoja de vida </label>
                                    <input type="file" class="form-control-file form-control-sm" wire:model="cvs">
                                    @error('cvs')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address" class="text-muted">Dirección</label>
                                    <input type="text" class="form-control form-control-sm" wire:model="address">
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="photo" class="text-muted">Imagen </label>
                                    <input type="file" class="form-control-file form-control-sm" wire:model="photo">
                                    @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="profile" class="text-muted">Perfil</label>
                                    <textarea class="form-control form-control-sm" wire:model="profile" rows="5"></textarea>
                                    @error('profile')
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

@section('scripts')
    <script>
        window.addEventListener('toastr-success', event => {
            toastr.success(event.detail.message);
        })
    </script>
@endsection
