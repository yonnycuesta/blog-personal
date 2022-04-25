<a href="index3.html" class="brand-link">
    <span class="brand-text font-weight-light">Panel Administrador</span>
</a>

<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
            <a href="#" class="d-block"></a>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-header">ADMINISTRATOR</li>
            <li class="nav-item">
                <a href="{{ route('categories') }}" class="nav-link">
                    <i class="nav-icon far fa-calendar-alt"></i>
                    <p>
                        Categories
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('aboutme.index') }}" class="nav-link">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                        Aboutme
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('awards.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-award"></i>
                    <p>
                        Awards
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('services.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-award"></i>
                    <p>
                        Services
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('testimonials.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-award"></i>
                    <p>
                        Testimonials
                    </p>
                </a>
            </li>
        </ul>
    </nav>
</div>
