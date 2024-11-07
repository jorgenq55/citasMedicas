<header class="main-header">

    <a href="{{ url('Inicio')}}" class="logo">
        <span class="logo-mini"><b>C M</span>
        <span class="logo-lg"><b>CLINICA MEDICA</span>
    </a>

    <nav class="navbar navbar-static-top">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav ">
                <li class="pestaña">
                     {{ __(auth()->user()->rol) }}
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                
                <li class="dropdown user user-menu  ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        {{ auth()->user()->name}}
                        <span class="hidden-xs"></span>
                    </a>

                    <ul class="dropdown-menu">

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ url('Mis-Datos')}}" class="btn btn-primary btn-flat">Mis Datos</a>
                            </div>

                            <div class="pull-right">
                                <a href="{{ route('logout')}}"
                                class="btn btn-danger btn-flat">Salir</a>
                            </div>

                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                            @csrf
                        

                            </form>

                        </li>
                    </ul>
                </li>
               
            </ul>
        </div>
    </nav>

</header>