 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <i class="fa fa-home fa-2x"></i>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link">
                                <i class="fas fa-align-left nav-icon"></i>
                                <p>Categorys</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('tag.index') }}" class="nav-link">
                                <i class="fas fa-tags nav-icon"></i>
                                <p>Tags</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('post.index') }}" class="nav-link">
                                <i class="fas fa-edit nav-icon"></i>
                                <p>Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('settings.edit') }}" class="nav-link">
                                <i class="fas fa-cogs nav-icon"></i>
                                <p>Basic Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contacet.index') }}" class="nav-link">
                                <i class="fas fa-envelope nav-icon"></i>
                                <p>Message</p>
                            </a>
                        </li>
                        <br>
                        <br>
                        <li class="nav-item">
                            <a href="{{ route('user.index') }}" class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.profile') }}" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>