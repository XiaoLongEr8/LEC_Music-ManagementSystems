<link rel="stylesheet" href="{{ asset('css/style/navbar.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

<nav class="upper_navbar_container">
    <section class="navbar_logo">
        <a href="/" style="text-decoration: none; color:black">
            <h1>Lyrics-Go</h1>
        </a>
    </section>


    <section class="right">
        <section class="navbar_search_container">
            <div class="navbar_search_section">
                <button type="" class="navbar_search_button"><img
                        src="{{ asset('image/search_logo.png') }}"></button>
                <form action="{{ route('search') }}" class="navbar_search_input">
                    <input type="text" placeholder="Search song title, artist, or lyrics..." name="q"
                        value="{{ request('q') }}">
                </form>
            </div>
        </section>

        <section class="navbar_login_container">
            @auth
                <form action="{{ route('logout') }}">
                    <button class="navbar_login_btn">
                        <a>Logout</a>
                    </button>
                </form>
            @else
                <form action="{{ route('login') }}">
                    <button class="navbar_login_btn">
                        <a>Login</a>
                    </button>
                </form>
            @endauth
        </section>

    </section>
</nav>
