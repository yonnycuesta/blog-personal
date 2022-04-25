<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header bg-info">
                    <h1 class="card-title">Actualizar registro</h1>
                    <a href="{{ route('aboutme.index') }}" class="btn btn-primary float-right">
                        <i class="fas fa-arrow-left"></i>
                        <span>Regresar</span>
                    </a>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fullname" class="text-muted">Nombre</label>
                                    <input type="text" class="form-control form-control-sm" wire:model.defer="about.fullname">
                                    @error('about.fullname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="age" class="text-muted">Edad</label>
                                    <input type="number" class="form-control form-control-sm" wire:model.defer="about.age">
                                    @error('about.age')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="text-muted">Correo electrónico</label>
                                    <input type="email" class="form-control form-control-sm" wire:model.defer="about.email">
                                    @error('about.email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone" class="text-muted">Teléfono</label>
                                    <input type="tel" class="form-control form-control-sm" wire:model.defer="about.phone">
                                    @error('about.phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="designation" class="text-muted">Profesión</label>
                                    <input type="text" class="form-control form-control-sm" wire:model="about.designation">
                                    @error('about.designation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="address" class="text-muted">Dirección</label>
                                    <input type="text" class="form-control form-control-sm" wire:model="about.address">
                                    @error('about.address')
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
                                    <label for="profile" class="text-muted">Perfil :</label>
                                    <textarea class="form-control form-control-sm" wire:model.defer="about.profile" rows="5"></textarea>
                                    @error('about.profile')
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

