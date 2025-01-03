<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('hotels.index') }}" class="nav-link">
                    <i class="bi bi-building-gear"></i>
                    <p>
                        Hotels Manage
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('rooms.index') }}" class="nav-link">
                    <i class="bi bi-door-open"></i>
                    <p>
                        Rooms Manage
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('amenities.index') }}" class="nav-link">
                    <i class="bi bi-display"></i>
                    <p>
                        Amenities Manage
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('payment_methods.index') }}" class="nav-link">
                    <i class="bi bi-credit-card"></i>
                    <p>
                        Payment Methods Manage
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('views.index') }}" class="nav-link">
                    <i class="bi bi-image-alt"></i>
                    <p>
                        Views manage
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('posts.index') }}" class="nav-link">
                    <i class="bi bi-newspaper"></i>
                    <p>
                        Posts manage
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('views.index') }}" class="nav-link">
                    <i class="bi bi-card-list"></i>
                    <p>
                        Bookings manage
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('views.index') }}" class="nav-link">
                    <i class="bi bi-card-checklist"></i>
                    <p>
                        Payments manage
                    </p>
                </a>
            </li>
            <form id="logout-form" action="" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
