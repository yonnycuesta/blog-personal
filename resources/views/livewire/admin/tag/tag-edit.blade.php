<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h1 class="card-title">Crear etiqueta</h1>
                    <a href="{{ route('tags.index') }}" class="btn btn-primary float-right bg-info border-0">
                        <i class="fas fa-arrow-left"></i>
                        <span>Regresar</span>
                    </a>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="text-muted">Nombre</label>
                                    <input type="text" class="form-control form-control-sm" wire:model="tag.name">
                                    @error('tag.name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div wire:ignore>
                                    <div class="form-group">
                                        <label for="portfolio" class="text-muted">Portafolios</label>
                                        <select class="form-control form-control-sm select2"
                                            wire:model="tag.portfolio_id" name="tag.portfolio_id">
                                            <option value="">Seleccione un proyecto</option>
                                            @foreach ($portfolios as $portfolio)
                                                <option value="{{ $portfolio->id }}">{{ $portfolio->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('tag.portfolio_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div wire:ignore>
                                    <div class="form-group">
                                        <label for="post" class="text-muted">Publicación</label>
                                        <select class="form-control form-control-sm select2-blue"
                                            wire:model="tag.post_id" name="tag.post_id">
                                            <option value="">Seleccione una publicación</option>
                                            @foreach ($posts as $post)
                                                <option value="{{ $post->id }}">{{ $post->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('tag.post_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-secondary">Actualizar</button>
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
        $(document).ready(function() {
            $('.select2').select2()
            // Capturar el evento para el cambio de valor del select2
            $('.select2').on('change', function() {
                @this.set('tag.portfolio_id', $(this).val())
            })
        })
    </script>

    <script>
        $(document).ready(function() {
            $('.select2-blue').select2()
            // Capturar el evento para el cambio de valor del select2
            $('.select2-blue').on('change', function() {
                @this.set('tag.post_id', $(this).val())
            })
        })
    </script>
@endsection

@section('scripts')
    <script>
        window.addEventListener('toastr-update', event => {
            toastr.info(event.detail.message);
        })
    </script>
@endsection
