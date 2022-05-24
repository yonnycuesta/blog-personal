     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="{{ route('dashboard') }}" class="nav-link">Panel Administrador</a>
         </li>
     </ul>
     <ul class="navbar-nav ml-auto">

         <li class="nav-item dropdown">
             <a class="nav-link" data-toggle="dropdown" href="#">
                 <i class="fa-solid fa-gears"></i>
             </a>


             <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                 <span class="dropdown-item dropdown-header">Configuración</span>
                 <div class="dropdown-divider"></div>

                 @if (Auth::check())
                     <a href="{{ route('logout') }}" class="dropdown-item">
                         <i class="fas fa-sign-out-alt"></i>
                         <span>Cerrar sesión</span>
                     </a>
                     <a href="{{ route('home') }}" class="dropdown-item">
                         <i class="fas fa-home"></i>
                         <span>Página Principal</span>
                     </a>
                 @else
                     <a href="{{ route('login') }}" class="dropdown-item">
                         <i class="fas fa-sign-in-alt"></i>
                         <span>Iniciar sesión</span>
                     </a>
                 @endif
             </div>
         </li>
     </ul>
