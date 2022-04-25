@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Detalles del proyecto</h3>
                            <a href="{{ route('portfolios.index') }}" class="btn btn-primary float-right bg-info border-0">
                                <i class="fas fa-arrow-left"></i>
                                <span>Regresar</span>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-img-top img-fluid">
                                        @if ($portfolio->photo)
                                            <img src="{{ asset($portfolio->photo) }}" alt="{{ $portfolio->title }}"
                                                class="img-fluid" style="width: 100%; height:300px">
                                        @else
                                            <span class="badge badge-primary">No hay imagen</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <ul>
                                        <li>
                                            <strong>Título:</strong>
                                            <p class="text-muted">{{ $portfolio->title }}</p>
                                        </li>
                                        <li>
                                            <strong>Categoría:</strong>
                                            <p class="text-muted">{{ $portfolio->category->name ?? '' }}</p>
                                        </li>
                                        <li>
                                            <strong>Nombre del cliente:</strong>
                                            <p class="text-muted">
                                                {{ $portfolio->portf_client }}</p>
                                        </li>
                                        <li>
                                            <strong>Enlace del proyecto:</strong>
                                            <p class="text-muted">
                                                <a href="{{ $portfolio->portf_url }}" target="_blank"
                                                    class="text-muted">{{ $portfolio->portf_url }}</a>
                                            </p>
                                        </li>
                                        <li>
                                            <strong>Fecha de publicación:</strong>
                                            <p class="text-muted">{{ $portfolio->date_created }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <strong>Descripción:</strong>
                                    <p class="text-muted">
                                        {{ $portfolio->description }}
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
