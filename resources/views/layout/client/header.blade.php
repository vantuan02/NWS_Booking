<header class="header">
    <div class="container">
        <div class="logo">
            <a href="{{route('client.index')}}">Logo</a>
        </div>
        <nav class="navbar">
            <ul class="nav-list">
                <li><a href="{{route('client.index')}}">Home</a></li>
                <li><a href="#">Bookings</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div class="header-actions">
            <nav class="navbar">
                <ul class="nav-list">   
                    <li><a href="{{route('login')}}">Login</a></li>
                    <li><a href="{{route('register')}}">Register</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
