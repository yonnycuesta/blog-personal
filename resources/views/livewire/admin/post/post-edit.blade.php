<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Actualizar publicación</h1>
                    <a href="{{ route('posts.index') }}" class="btn btn-primary float-right bg-info border-0">
                        <i class="fas fa-arrow-left"></i>
                        <span>Regresar</span>
                    </a>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="title" class="text-muted">Título</label>
                                    <input type="text" class="form-control form-control-sm" wire:model="post.title">
                                    @error('post.title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div wire:ignore>
                                    <div class="form-group">
                                        <label for="category" class="text-muted">Categoría</label>
                                        <select class="form-control form-control-sm select2"
                                            wire:model="post.category_id" name="post.category_id">
                                            <option value="">Seleccione una categoría</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('post.category_id')
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description" class="text-muted">Descripción</label>
                                    <textarea class="form-control form-control-sm" wire:model="post.description" rows="6">
                                        {{ $post->description }}
                                    </textarea>
                                    @error('post.description')
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
            // Capturar el evento para el cambio de la categoría
            $('.select2').on('change', function() {
                @this.set('post.category_id', $(this).val())
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
