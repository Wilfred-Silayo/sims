<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIMS | @yield('title')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div id="app" class="bg-light">
        <!-- Top nav-bar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm d-flex justify-content-between" style="min-height:10vh;">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <h4 class="text-dark fw-bold">STUDENTS INFORMATION MANAGEMENT SYSTEM</h4>
                        </li>
                    </ul>
                    @if(auth()->check())
                    <div class="nav-item dropdown d-flex align-items-center">
                        <div class="dropdown ms-2">
                            <a class="nav-link dropdown-toggle  bg-white" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="text-danger fw-bold">{{ Auth::user()->firstName }}</span>
                                <span class="text-danger fw-bold">{{ Auth::user()->lastName }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </nav>

        <!-- admin -->
        @if(auth()->check() && auth()->user()->hasRole('admin'))
        @include('layouts.admin_side_bar')

        <!-- lecturer -->
        @elseif(auth()->check() && auth()->user()->hasRole('lecturer'))
        @include('layouts.lecturer_side_bar')

        <!-- student -->
        @elseif(auth()->check() && auth()->user()->hasRole('student'))
        @include('layouts.student_side_bar')

        <!-- none -->
        @else
        <main class="py-3">
            @yield('content')
        </main>
        @endif
        <footer class="footer fixed-bottom mt-4 py-3 mb-0 bg-body-transparent">
            <div class="container-fluid d-flex justify-content-end ">
                <span class="text-body-secondary">© 2023 [SIMS]</span>
            </div>
        </footer>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
var passwordField = document.getElementById('password');


var togglePasswordButton = document.getElementById('togglePassword');

togglePasswordButton.addEventListener('click', function() {
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
    } else {
        passwordField.type = 'password';
    }
});
</script>

</html>