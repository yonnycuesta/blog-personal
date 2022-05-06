<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h1 class="card-title">Actualizar modulo</h1>
                    <a href="{{ route('modules.index') }}" class="btn btn-primary float-right bg-info border-0">
                        <i class="fas fa-arrow-left"></i>
                        <span>Regresar</span>
                    </a>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title" class="text-muted">Titulo</label>
                                    <input type="text" class="form-control form-control-sm" wire:model="module.title">
                                    @error('module.title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="subtitle" class="text-muted">Subtitulo</label>
                                    <input type="text" class="form-control form-control-sm"
                                        wire:model="module.subtitle">
                                    @error('module.subtitle')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div wire:ignore>
                                    <div class="form-group">
                                        <label for="post" class="text-muted">Publicación</label>
                                        <select class="form-control form-control-sm select2" wire:model="module.post_id"
                                            name="module.post_id">
                                            <option value="">Seleccione una publicación</option>
                                            @foreach ($posts as $post)
                                                <option value="{{ $post->id }}">{{ $post->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('module.post_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="content" class="text-muted">Contenido</label>
                                    <textarea class="form-control form-control-sm" wire:model="module.content" rows="8">
                                        {{ $module->content }}
                                    </textarea>
                                    @error('module.content')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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

@section('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2()
            // Capturar el evento para el cambio de valor del select2
            $('.select2').on('change', function() {
                @this.set('module.post_id', $(this).val())
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
