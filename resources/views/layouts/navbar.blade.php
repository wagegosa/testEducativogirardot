<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">
                            {{ Auth::user()->name }}
                        </span>
                        <span class="text-muted text-xs block">
                            <i class="fa fa-user-circle-o fa-3" aria-hidden="true"></i> {{ Auth::user()->getRoleNames()->first() }}<b class="caret"></b>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ route('usuarios.perfil', Auth::id()) }}">Perfil</a></li>
                        <li><a href="">Cambiar contaseña</a></li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               class="dropdown-item"
                               onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                {{__('Logout')}}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    OES
                </div>
            </li>
            <li class="{{ setActive('home') }}">
                <a href="{{ route('home') }}"><i class="fa fa-home"></i> <span
                        class="nav-label">Inicio</span></a>
            </li>
            <li class="{{ setActive('modules*') }}">
                <a href="#" aria-expanded="false"><i class="fa fa-th-list"></i> <span class="nav-label">Módulos</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                    <li class="{{ setActive('modules/preguntas*') }}">
                        <a href="{{ route('preguntas.index') }}">Preguntas</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('cuestionario.create') }}"><i class="fa fa-comments-o"></i> <span
                        class="nav-label">Cuestionario</span>
                </a>
            </li>
            @hasanyrole('Super-Admin|Administrador')
            <li class="{{ setActive('sistema*') }}">
                <a href="#" aria-expanded="false"><i class="fa fa-desktop"></i> <span class="nav-label">Sistema</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" aria-expanded="false" style="height: 0px;">
                    <li class="{{ setActive('sistema/roles*') }}">
                        <a href="{{ route('roles.index') }}">Roles</a>
                    </li>
                    <li class="{{ setActive('sistema/permisos*') }}">
                        <a href="{{ route('permisos.index') }}">Permisos</a>
                    </li>
                    <li class="{{ setActive('sistema/usuarios*') }}">
                        <a href="{{ route('usuarios.index') }}">Usuarios</a>
                    </li>
                </ul>
            </li>
            @endhasanyrole
        </ul>

    </div>
</nav>