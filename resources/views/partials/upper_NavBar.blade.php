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

        @auth
            <section class="navbar_login_container">
                <form action="{{ route('logout') }}" class="navbar_login_button_form">
                    <button class="navbar_login_btn">
                        Logout
                    </button>
                </form>
                <a class="navbar_profile_picture_container" href="{{auth()->user()->role == 2 ? route('admin.songs') : route('profile')}}">
                    <img src="{{ auth()->user()->profile_pic ? asset(auth()->user()->profile_pic) : asset('image/ProfilePic.jpg') }}" alt="" class="navbar_profile_picture">
                </a>
            </section>
        @else
            <section class="navbar_login_container">
                <form action="{{ route('login') }}" class="navbar_login_button_form">
                    <button class="navbar_login_btn">
                        Login
                    </button>
                </form>
            </section>
        @endauth
    </section>
</nav>
