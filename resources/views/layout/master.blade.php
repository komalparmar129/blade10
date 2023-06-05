<!DOCTYPE html>
<html lang="en">
<head>

    {{--
        @authore komal parmar
        master blade template that have header and footer and yield other blades 
         --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
    <title>Document</title>

    <style>
        footer {
            margin-top: 15px;
            text-align: center;
            padding: 3px;
            background-color: rgb(29, 92, 175);
            color: white;
        }

        .material-icons-outlined {
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg" style="background-color: rgb(56, 56, 244);">
            <div class="container-fluid">
                <a class="navbar-brand"  style="color: white;" href="#">GROCERY MONK</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" style="color: white;" aria-current="page" href="#">HOME</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="color: white;" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                CATEGORY
                            </a>
                            <ul class="dropdown-menu" style="color: white;" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Home</a></li>
                                <li><a class="dropdown-item" href="#">Clothing</a></li>
                                <li><a class="dropdown-item" href="#">Sports</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="color: white;" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                REPORTS
                            </a>
                            <ul class="dropdown-menu" style="color: white;" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="color: white;" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ADMIN
                            </a>
                            <ul class="dropdown-menu"  style="color: white;" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Admin</a></li>
                                <li><a class="dropdown-item" href="#">profile</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="color: white;" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ORDERS
                            </a>
                            <ul class="dropdown-menu"  style="color: white;" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">orders</a></li>
                                <li><a class="dropdown-item" href="#">orders list</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"  style="color: white;"href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                USERS
                            </a>
                            <ul class="dropdown-menu" style="color: white;" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">users</a></li>
                                <li><a class="dropdown-item" href="#">history</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" style="color: white;" aria-current="page" href="#">MY ORDERS</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            @auth
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                            @else
                                <a class="nav-link dropdown-toggle" style="color: white;" href="#" id="navbarDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Login
                                </a>
                                <ul class="dropdown-menu" style="color: white;" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item login-button" href="{{ route('login') }}">Login</a></li>
                                    <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                                </ul>
                            @endauth
                        </li>
                        <li><a class="material-symbols-outlined" href="/shopping">
                                <span class="material-icons-outlined">shopping_cart</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="material-symbols-outlined" href="/search#">
                                <span class="material-icons-outlined search" style="color: white;">search</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>





<main>
    @yield('form')
    @yield('edit')
    @yield('yajra')
</main>







    <footer>
        <p>
            <a href="contact">Contact</a>
            <a href="FAQ">Help/FAQ</a>
            <a href="howdoesitwork">How Does it Work?</a>
        <p>All right reserved.<br>
        </p>
    </footer>
</body>
</html>