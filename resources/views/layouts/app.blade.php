<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    @yield('title')</title>
</head>
<body>
    <header>
        <nav>
            <ul class="nav-items">
                <li><a href="/"><svg class="home icon"
      stroke="currentColor"
      fill="currentColor"
      stroke-width="0"
      viewBox="0 0 1024 1024"
      height="1em"
      width="1em"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M946.5 505L560.1 118.8l-25.9-25.9a31.5 31.5 0 0 0-44.4 0L77.5 505a63.9 63.9 0 0 0-18.8 46c.4 35.2 29.7 63.3 64.9 63.3h42.5V940h691.8V614.3h43.4c17.1 0 33.2-6.7 45.3-18.8a63.6 63.6 0 0 0 18.7-45.3c0-17-6.7-33.1-18.8-45.2zM568 868H456V664h112v204zm217.9-325.7V868H632V640c0-22.1-17.9-40-40-40H432c-22.1 0-40 17.9-40 40v228H238.1V542.3h-96l370-369.7 23.1 23.1L882 542.3h-96.1z"
      ></path>
    </svg></a></li>
                <li><a href="/ver-libros">Ver libros</a></li>
                <li><a href="/pokemon">Pokemon</a></li>
                <li><a href="/scraper-wikipedia">Scraper Wikipedia</a></li>
                @if ($usuario->admin)
                    <li><a href="/panel-admin">Panel de administrador</a></li>
                @endif

                <li class="sub-menu">
                <svg
      class="user-icon icon"
      stroke="currentColor"
      fill="currentColor"
      stroke-width="0"
      viewBox="0 0 24 24"
      height="1em"
      width="1em"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M12 2.5a5.5 5.5 0 0 1 3.096 10.047 9.005 9.005 0 0 1 5.9 8.181.75.75 0 1 1-1.499.044 7.5 7.5 0 0 0-14.993 0 .75.75 0 0 1-1.5-.045 9.005 9.005 0 0 1 5.9-8.18A5.5 5.5 0 0 1 12 2.5ZM8 8a4 4 0 1 0 8 0 4 4 0 0 0-8 0Z"
      ></path>
    </svg>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/perfil">Perfil</a>
                        </li>
                        <li>
                            <form action="/logout" method="post">
                            @csrf
                                <input class="btn-logout" type="submit" value="Cerrar sesión">
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

        </nav>
    </header>

    <main>
        @if(!Request::is('/') && !Request::is('/login'))
            <div class="btn-volver">
                <a class="btn-ver-usuarios" href="/"> 
                    <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
                    <span>Back</span>
                </a>
            </div>
        @endif
        @yield('content')
    </main>
    

    <footer>
        <section id="footer-section-1">
            <section>
                <img src="/img/logo.png" alt="Logo" class="logo">
            </section>

            <section>
                <form class="card" action="/subscribe" method="post">
                @csrf
                <span class="card__title">Contacta con administración</span>
                </p>
                <div class="card__form">
                    <input placeholder="Tu Email" type="text">
                    <textarea placeholder="Mensaje" type="text" class="textarea"></textarea>
                    <input type="submit" value="Sign up" class="sign-up">
                </div>
                </form>
            </section>
            
            <section>        
                <p><a href="mailto:info@example.com">info@example.com</a></p>
                <p><a href="tel:+1234567890">+1234567890</a></p>
                <p><a href="https://www.google.com/maps/place/123+Main+St,+Anytown,+USA">123 Main St, Anytown, USA</a></p>
                <p><a href="https://www.facebook.com/example">Facebook</a> <a href="https://www.twitter.com/example">Twitter</a> <a href="https://www.instagram.com/example">Instagram</a></p>
                <p><a href="https://www.example.com/privacy">Política de privacidad</a></p>
                <p><a href="https://www.example.com/terms">Términos y condiciones</a></p>
                <p><a href="https://www.example.com/sitemap">Mapa del sitio</a></p>
                <p><a href="https://www.example.com/cookies">Política de cookies</a></p>
            </section>
        </section>

        <section id="footer-section-2">
            <p>Derechos reservados &copy; 2026</p>
        </section>




    </footer>
    @yield('scripts')
</body>
</html>
