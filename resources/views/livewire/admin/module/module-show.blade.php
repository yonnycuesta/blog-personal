@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Detalles del módulo</h3>
                            <a href="{{ route('modules.index') }}" class="btn btn-primary float-right bg-info border-0">
                                <i class="fas fa-arrow-left"></i>
                                <span>Regresar</span>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <strong> Titulo del módulo</strong>
                                    <p class="text-muted">
                                        {{ $module->title }}
                                    </p>
                                    <hr>
                                </div>
                                <div class="col-md-4">
                                    <strong>Subtitulo</strong>

                                    <p class="text-muted">
                                        {{ $module->subtitle }}
                                    </p>

                                    <hr>
                                </div>
                                <div class="col-md-4">
                                    <strong>Nombre de la Publicación</strong>

                                    <p class="text-muted">
                                        {{ $module->post->title ?? '' }}
                                    </p>

                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <strong>Contenido</strong>
                                    <p class="text-muted">
                                        {{ $module->content }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
