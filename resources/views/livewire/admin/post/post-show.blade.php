@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Detalles de la publicación</h3>
                            <a href="{{ route('posts.index') }}" class="btn btn-primary float-right bg-info border-0">
                                <i class="fas fa-arrow-left"></i>
                                <span>Regresar</span>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-img-top img-fluid">
                                        @if ($post->photo)
                                            <img src="{{ asset($post->photo) }}" alt="{{ $post->title }}"
                                                class="img-fluid" style="width: 100%; height:250px">
                                        @else
                                            <span class="badge badge-primary">No hay imagen</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <ul>
                                        <li>
                                            <strong>Título:</strong>
                                            <p class="text-muted">{{ $post->title }}</p>
                                        </li>
                                        <li>
                                            <strong>Categoría:</strong>
                                            <p class="text-muted">{{ $post->category->name ?? '' }}</p>
                                        </li>

                                        <li>
                                            <strong>Fecha de publicación:</strong>
                                            <p class="text-muted">{{ $post->datetime_created }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <strong>Descripción:</strong>
                                    <p class="text-muted">
                                        {{ $post->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
