<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SRF - Sistema de Relatório Financeiro</title>

        <!-- Latest compiled and minified CSS -->

        <!-- Bootstrap URL - CSS -->
        <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="{{ url('/themes/theme.css') }}">
        <!-- Ajax Script -->
        <script src="{{ url('/js/jquery-3.3.1.slim.js') }}"></script>
        <script src="{{ url('/js/bootstrap.min.js') }}"></script>

        @yield('script')

    </head>

    <body role="document">
        <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">SRF - Sistema de Relatório Financeiro</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                                <a href="{{ url('/') }}"> Home </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->email }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container theme-showcase" role="main">

            <div class="page-header">

                <div class="page-header">
                    <h1 class="form-signin-heading">
                        @yield('cabecalho')
                    </h1>
                </div>

                @yield('conteudo')

            </div>

            <!-- <div class="page-header"> -->
                <b>&copy;2018
                    &nbsp;&nbsp;&raquo;&nbsp;&nbsp;
                    Gil Eduardo de Andrade
                    &nbsp;&nbsp;&raquo;&nbsp;&nbsp;
                    SRF
                </b>
            <!-- </div> -->
    </body>
</html>
