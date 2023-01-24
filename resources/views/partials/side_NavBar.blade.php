<nav class="side_navbar">
    <div class="navigation_option">
        <a href="{{route('admin.songs')}}">
            <div class="side_navigation">
                <ion-icon name="home"></ion-icon>
                <p class="side_navigation_text">Home</p>
            </div>
        </a>
        <a href="{{route('admin.artists')}}">
            <div class="side_navigation">
                <ion-icon name="people"></ion-icon>
                <p class="side_navigation_text">Artist</p>
            </div>
        </a>
    </div>
    <div class="navigate_logout">
        <a href="{{route('logout')}}">
            <div class="side_navigation">
                <ion-icon name="log-out"></ion-icon>
                <p class="side_navigation_text">Logout</p>
            </div>
        </a>
    </div>
</nav>
