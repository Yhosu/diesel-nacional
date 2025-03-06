<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description', 'Administrador del sitio web '.config('app.name'))">
    <meta name="keywords" content="@yield('keywords', 'admin, administrator, administrador')">
    <meta name="author" content="{{ config('app.author') }}">
    <title>Administrador | @yield('title', config('app.name'))</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    @include('templates.admin.styles')
    
    @stack('prehead')

    @vite([
        // Custom
        // 'resources/css/app.css',
        'resources/scss/main.scss',
        'resources/js/main.js',
    ])

    @stack('head')
</head>
<body class="admin-cy-web vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="" data-framework="laravel" data-asset-path="../../../assets/">

    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item">
                        <a class="nav-link menu-toggle" href="#">
                            <i class="ficon" data-feather="menu"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item dropdown dropdown-language">
                    <a class="nav-link dropdown-toggle" id="dropdown-flag" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="flag-icon flag-icon-us"></i><span class="selected-language">{{ __('english') }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-flag">
                        <a class="dropdown-item {{ \App::getLocale() == 'en' ? 'active' : '' }}" href="{{ route('language', ['lang' => 'en']) }}" data-language="en">
                            <i class="flag-icon flag-icon-us"></i> {{ __('english') }}
                        </a>
                        <a class="dropdown-item {{ \App::getLocale() == 'es' ? 'active' : '' }}" href="{{ route('language', ['lang' => 'es']) }}" data-language="es">
                            <i class="flag-icon flag-icon-es"></i> {{ __('spanish') }}
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-style">
                        <i class="ficon" data-feather="moon"></i>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-notification me-25">
                    <a class="nav-link" href="#" data-bs-toggle="dropdown">
                        <i class="ficon" data-feather="bell"></i>
                        <span class="badge rounded-pill bg-danger badge-up">5</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 me-auto">Notificaciones</h4>
                                <div class="badge rounded-pill badge-light-primary">6 New</div>
                            </div>
                        </li>
                        <li class="scrollable-container media-list">
                            <div class="list-item d-flex align-items-center">
                                <h6 class="fw-bolder me-auto mb-0">Notificaciones del sistema</h6>
                                <div class="form-check form-check-primary form-switch">
                                    <input class="form-check-input" id="systemNotification" type="checkbox" checked="">
                                    <label class="form-check-label" for="systemNotification"></label>
                                </div>
                            </div>
                            <a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-danger">
                                            <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i></div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Server down</span>&nbsp;registered</p>
                                        <small class="notification-text"> USA Server is down due to high CPU usage</small>
                                    </div>
                                </div>
                            </a>
                            <a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-success">
                                            <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i></div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">Sales report</span>&nbsp;generated</p>
                                        <small class="notification-text"> Last month sales report generated</small>
                                    </div>
                                </div>
                            </a>
                            <a class="d-flex" href="#">
                                <div class="list-item d-flex align-items-start">
                                    <div class="me-1">
                                        <div class="avatar bg-light-warning">
                                            <div class="avatar-content"><i class="avatar-icon" data-feather="alert-triangle"></i></div>
                                        </div>
                                    </div>
                                    <div class="list-item-body flex-grow-1">
                                        <p class="media-heading"><span class="fw-bolder">High memory</span>&nbsp;usage</p>
                                        <small class="notification-text"> BLR Server using high memory</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-menu-footer">
                            <a class="btn btn-primary w-100" href="#">Todas las notificaciones</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown dropdown-user">
                    @if (auth()->check())
                        <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name fw-bolder" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:account-updated.window="name = $event.detail.name"></span>
                                <span class="user-status">Admin</span>
                            </div>
                            <span class="avatar">
                                <img class="round" src="{{ asset('assets/img/avatar.svg') }}" alt="{{ auth()->user()->name }}" height="40" width="40">
                                <span class="avatar-status-online"></span>
                            </span>
                        </a>
                        <form id="logout-form" action="{{ url('process/auth/logout') }}" method="POST" class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                            <a class="dropdown-item {{ request()->is('admin/account') ? 'active' : '' }}" href="{{ url('admin/account') }}">
                                <i class="me-50" data-feather="user"></i> Mi cuenta
                            </a>
                            @csrf
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                                <i class="me-50" data-feather="power"></i> Cerrar sesión
                            </a>
                        </form>
                    @else
                        <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name fw-bolder">Inicia sesión</span>
                                <span class="user-status">Admin</span>
                            </div>
                            <span class="avatar">
                                <img class="round" src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40">
                                <span class="avatar-status-online"></span>
                            </span>
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </nav>

    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto">
                    <a class="navbar-brand" href="{{ url('') }}">
                        <span class="brand-logo">
                            <img src="{{ asset('assets/img/isologo.svg') }}" alt="{{ config('title') }}" height="35">
                        </span>
                        {{-- <h2 class="brand-text">{{ config('app.name') }}</h2> --}}
                        <h2 class="brand-text">
                            <img src="{{ asset('assets/img/logo-text.svg') }}" alt="{{ config('title') }}" width="177" height="30">
                        </h2>
                    </a>
                </li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                        <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            @php
                \App\Helpers\Func::renderMenuHtml($menu);
            @endphp
        </div>
    </div>

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                @if (Session::has('message_success'))
                    <x-cy-alert type="success">
                        {{ Session::get('message_success') }}
                    </x-cy-alert>
                    @elseif(Session::has('message_error'))
                    <x-cy-alert type="error">
                        {{ Session::get('message_error') }}
                    </x-cy-alert>
                @endif
            </div>
            <div class="content-body">
                {{ $slot }}
            </div>
        </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0">
            <span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; {{ date('Y') }}<b class="ms-25">{{ config('app.name') }}</b><span class="d-none d-sm-inline-block">, Todos los derechos reservados</span></span>
        </p>
    </footer>

    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>

    @include('templates.admin.scripts')

    @livewireScripts

    {{-- scripts --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Livewire.on('alertErrors', (data) => {
                console.log(data);
                const item = data[0];
                if (item) {
                    Swal.fire({
                        title: (item.message ?? 'Error'),
                        html: (item['errors'] ? textFormat(item['errors']) : (item.message ?? 'Error')),
                        icon: 'error',
                        showCancelButton: true,
                        showConfirmButton: false,
                        showDenyButton: false,
                        cancelButtonText: 'Cerrar'
                    });
                }
            });
        });

        function textFormat(description) {
            let data = '';
            for(let item of description) {
                data = data.concat(`<p>${item}</p>`);
            }
            return data;
        }
    </script>

    @stack('scripts')
</body>
</html>