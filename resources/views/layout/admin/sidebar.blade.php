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
                <a href="{{route('rooms.index')}}" class="nav-link">
                    <i class="bi bi-door-open"></i>
                    <p>
                        Rooms Manage
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('amenities.index')}}" class="nav-link">
                    <i class="bi bi-display"></i>
                    <p>
                        Amenities Manage
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
