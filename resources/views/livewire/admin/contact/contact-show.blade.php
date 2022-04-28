@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Detalles del contacto</h3>
                            <a href="{{ route('contacts.index') }}" class="btn btn-primary float-right bg-info border-0">
                                <i class="fas fa-arrow-left"></i>
                                <span>Regresar</span>
                            </a>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul>
                                        <li>
                                            <strong>Nombre:</strong>
                                            <p class="text-muted">{{ $contact->name }}</p>
                                        </li>

                                        <li>
                                            <strong>Correo:</strong>
                                            <p class="text-muted">{{ $contact->email }}</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    
                                    <strong>Descripción:</strong>
                                    <p class="text-muted">
                                        {{ $contact->description }}
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
