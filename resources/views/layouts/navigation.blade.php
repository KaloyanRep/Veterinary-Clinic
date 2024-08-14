<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('home.clients') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Clients') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('About us') }}
                    </p>
                </a>
            </li>




            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle nav-icon"></i>
                    <p>
                        Two-level menu
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Child menu</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ route('clinics.create') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Clinic</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="owner" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Owner</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="pets" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pets</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="prescriptions" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Prescription</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="specializations" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Specializations</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="species" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Species</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="vets" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Vets</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="visits" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Visits</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="worktime" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Worktime</p>
                        </a>
                    </li>
                </ul>

            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->

