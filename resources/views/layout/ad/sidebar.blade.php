        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ route('admin.hotels.index') }}" class="text-nowrap logo-img">
                        <img src="{{ asset('assets/dist/img/newwave.png') }}" style="height: 100px; width: 100%"
                            alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.hotels.index') }}" aria-expanded="false">
                                <i class="bi bi-file-earmark-text"></i>
                                <span class="hide-menu">Hotels manage</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.rooms.index') }}" aria-expanded="false">
                                <i class="bi bi-list-task"></i>
                                <span class="hide-menu">Rooms manage</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.amenities.index') }}" aria-expanded="false">
                                <i class="bi bi-person-vcard-fill"></i>
                                <span class="hide-menu">Amenities manage</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.payment_methods.index') }}" aria-expanded="false">
                                <i class="bi bi-bookmarks-fill"></i>
                                <span class="hide-menu">Payment Methods Manage</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.views.index') }}" aria-expanded="false">
                                <i class="bi bi-gear-fill"></i>
                                <span class="hide-menu">Views manage</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.posts.index') }}" aria-expanded="false">
                                <i class="bi bi-palette-fill"></i>
                                <span class="hide-menu">Posts manage</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="" aria-expanded="false">
                                <i class="bi bi-rulers"></i>
                                <span class="hide-menu">Bookings manage</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="" aria-expanded="false">
                                <i class="bi bi-receipt"></i>
                                <span class="hide-menu">Payments manage</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
