@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Detalles del testimonio</h3>
                            <a href="{{ route('testimonials.index') }}" class="btn btn-primary float-right bg-info border-0">
                                <i class="fas fa-arrow-left"></i>
                                <span>Regresar</span>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong> Nombre del cliente</strong>
                                    <p class="text-muted">
                                        {{ $testimonial->name }}
                                    </p>
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <strong>Cargo o Profesión</strong>

                                    <p class="text-muted">
                                        {{ $testimonial->designation }}
                                    </p>

                                    <hr>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <strong>Comentario</strong>
                                    <p class="text-muted">
                                        {{ $testimonial->description }}
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
