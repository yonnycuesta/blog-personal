@extends('layouts.app')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Detalles del servicio</h3>
                        <a href="{{ route('services.index') }}" class="btn btn-primary float-right bg-info">
                            <i class="fas fa-arrow-left"></i>
                            <span>Regresar</span>
                        </a>
                    </div>

                    <div class="card-body">
                        <strong> Nombre</strong>

                        <p class="text-muted">
                            {{ $service->name }}
                        </p>

                        <hr>

                        <strong>Icono</strong>

                        <p class="text-muted">
                            <i class="{{ $service->icon }}"></i>
                        </p>

                        <hr>

                        <strong>Descripción</strong>

                        <p class="text-muted">
                            {{ $service->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
