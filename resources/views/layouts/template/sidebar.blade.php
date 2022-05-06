<a href="{{ route('dashboard') }}" class="brand-link">
    <span class="brand-text font-weight-light">Blog Personal</span>
</a>

<div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">Administrador</li>
            <li class="nav-item">
                <a href="{{ route('categories') }}" class="nav-link">
                    <i class="fa-brands fa-font-awesome"></i>
                    <p>
                        Categorias
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('contacts.index') }}" class="nav-link">
                    <i class="fa-solid fa-phone"></i>
                    <p>
                        Contactos
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('tags.index') }}" class="nav-link">
                    <i class="fa-solid fa-tags"></i>
                    <p>
                        Etiquetas
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('galleries.index') }}" class="nav-link">
                    <i class="fa-solid fa-images"></i>
                    <p>
                        Galerias
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('modules.index') }}" class="nav-link">
                    <i class="fa-solid fa-building"></i>
                    <p>
                        Módulos
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('awards.index') }}" class="nav-link">
                    <i class="fa-solid fa-award"></i>
                    <p>
                        Premios
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('posts.index') }}" class="nav-link">
                    <i class="fa-solid fa-blog"></i>
                    <p>
                        Publicaciones
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('portfolios.index') }}" class="nav-link">
                    <i class="fa-solid fa-briefcase"></i>
                    <p>
                        Proyectos
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('resources.index') }}" class="nav-link">
                    <i class="fa-solid fa-kit-medical"></i>
                    <p>
                        Recursos
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('services.index') }}" class="nav-link">
                    <i class="fa-brands fa-servicestack"></i>
                    <p>
                        Servicios
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('aboutme.index') }}" class="nav-link">
                    <i class="fa-solid fa-user"></i>
                    <p>
                        Sobre mi
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('testimonials.index') }}" class="nav-link">
                    <i class="fa-brands fa-teamspeak"></i>
                    <p>
                        Testimonios
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-users"></i>
                    <p>
                        Usuarios
                    </p>
                </a>
            </li>
        </ul>
    </nav>
</div>
