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
            @if(Auth::check())
            <nav class="navbar">
                <ul class="nav-list">   
                    <li><a href="">{{Auth::user()->name}}</a></li>
                    <li><a href="{{route('logout')}}">Logout <i class="bi bi-box-arrow-right"> </i></a></li>
                </ul>
            </nav>
            @else
            <nav class="navbar">
                <ul class="nav-list">   
                    <li><a href="{{route('login')}}"><i class="bi bi-box-arrow-in-right"> </i> Login</a></li>
                    <li><a href="{{route('register')}}"><i class="bi bi-person"> </i>Register</a></li>
                </ul>
            </nav>
            @endif
        </div>
    </div>
</header>
