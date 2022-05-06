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
                 <a href="#" class="dropdown-item">
                     <i class="fas fa-user mr-2"></i> Cerrar sesión
                 </a>
                 <div class="dropdown-divider"></div>
                 <a href="{{ route('home') }}" class="dropdown-item">
                     <i class="fas fa-arrow-left mr-2"></i> Página principal
                 </a>
             </div>
         </li>
     </ul>
