<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 mt-4">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if ($about->photo)
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset($about->photo) }}"
                                    alt="User profile picture" style="width: 100px; height:100px; border:50%">
                            @else
                            @endif
                        </div>

                        <h3 class="profile-username text-center">{{ $about->fullname }}</h3>

                        <p class="text-muted text-center">{{ $about->designation }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Edad</b> <a class="float-right">{{ $about->age }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Correo</b> <a class="float-right">{{ $about->email }}</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9 mt-4">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                        <a href="{{ route('aboutme.index') }}" class="btn btn-primary float-right bg-info border-0">
                            <i class="fas fa-arrow-left"></i>
                            <span>Regresar</span>
                        </a>
                    </div>

                    <div class="card-body">
                        <strong><i class="fas fa-phone mr-1"></i> Teléfono</strong>

                        <p class="text-muted">
                            {{ $about->phone }}
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Dirección</strong>

                        <p class="text-muted">{{ $about->address }}</p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i>Perfil</strong>

                        <p class="text-muted">
                            {{ $about->profile }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
