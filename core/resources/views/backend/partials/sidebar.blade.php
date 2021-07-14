
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link" style="border-bottom:none">
        <span class=""></span>
        <span class="brand-text font-weight-light" style="color: black; font-family: roboto; font-weight:bold; color: green; font-style:italic; margin-left: 55px">
            <i class="fas fa-cogs fa-sm fa-fw rotate" style="font-size: 16px; color:green"></i>
            Admin <i class="fas fa-cogs fa-sm fa-fw mr-2 rotate" style="font-size: 16px; color:green"></i>
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border: none">
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @if(Auth::guard('admin')->user()->user_role == 1)
                <li class="nav-item has-treeview
                        {{ ((Request::is('admin/add/question/category')) ? 'menu-open' : '') }}
                        {{ ((Request::is('admin/manage/question/category')) ? 'menu-open' : '') }}
                        {{ ((Request::is('admin/edit/question/category/*')) ? 'menu-open' : '') }}
                    ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-question" style="color: green"></i>
                        <p>
                            Question Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('add.question.category') }}" class="nav-link @if(request()->path() == 'admin/add/question/category') bg-success @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manage.question.category') }}" class="nav-link @if(request()->path() == 'admin/manage/question/category') bg-success @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview
                        {{ ((Request::is('admin/add/question')) ? 'menu-open' : '') }}
                        {{ ((Request::is('admin/question/category/list')) ? 'menu-open' : '') }}
                        {{ ((Request::is('admin/manage/question/*')) ? 'menu-open' : '') }}
                        {{ ((Request::is('admin/edit/question/*')) ? 'menu-open' : '') }}
                    ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-question" style="color: green"></i>
                        <p>
                            Questions
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('add.question') }}" class="nav-link @if(request()->path() == 'admin/add/question') bg-success @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Question</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('question.category.list') }}" class="nav-link @if(request()->path() == 'admin/question/category/list') bg-success @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Question</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview
                        {{ ((Request::is('admin/add/manager')) ? 'menu-open' : '') }}
                        {{ ((Request::is('admin/manage/manager')) ? 'menu-open' : '') }}
                        {{ ((Request::is('admin/edit/manager/*')) ? 'menu-open' : '') }}
                    ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user" style="color: green"></i>
                        <p>
                            Manager
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('add.manager') }}" class="nav-link @if(request()->path() == 'admin/add/manager') bg-success @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Manager</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manage.manager') }}" class="nav-link @if(request()->path() == 'admin/manage/manager') bg-success @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Manager</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('show.answer') }}" class="nav-link @if(request()->path() == 'admin/show/answer') bg-success @endif">
                        <i class="nav-icon fas fa-box icon-color" style="color: green"></i><p>Collected Data</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('subscriber.list') }}" class="nav-link @if(request()->path() == 'admin/subscriber/list') bg-success @endif">
                        <i class="nav-icon fas fa-home icon-color" style="color: green"></i><p>Subscriber List</p>
                    </a>
                </li>
<<<<<<< HEAD

                <li class="nav-item has-treeview">
                    <a href="{{ route('notify.all') }}" class="nav-link @if(request()->path() == 'admin/subscriber/list') bg-info @endif">
                        <i class="nav-icon fas fa-home icon-color" style="color: green"></i><p>Notify List</p>
                    </a>
                </li>
                
                {{-- <li class="nav-item has-treeview">
                    <a href="{{ route('contact.list') }}" class="nav-link @if(request()->path() == 'admin/contact/list') bg-info @endif">
                        <i class="nav-icon fas fa-home icon-color" style="color: green"></i><p>Contact List</p>
=======
                <li class="nav-item has-treeview
                        {{ ((Request::is('admin/contact/list')) ? 'menu-open' : '') }}
                        {{ ((Request::is('admin/request/demo')) ? 'menu-open' : '') }}
                    ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user" style="color: green"></i>
                        <p>
                            Contact
                            <i class="right fas fa-angle-left"></i>
                        </p>
>>>>>>> 1431fb14de3a3cd4f9302b02a9e9669f2f392050
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('contact.list') }}" class="nav-link @if(request()->path() == 'admin/contact/list') bg-success @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('request.demo') }}" class="nav-link @if(request()->path() == 'admin/request/demo') bg-success @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Request Demo</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

                @if(Auth::guard('admin')->user()->user_role == 2)
                <li class="nav-item has-treeview
                        {{ ((Request::is('admin/add/question/category')) ? 'menu-open' : '') }}
                        {{ ((Request::is('admin/manage/question/category')) ? 'menu-open' : '') }}
                        {{ ((Request::is('admin/edit/question/category/*')) ? 'menu-open' : '') }}
                    ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-question" style="color: green"></i>
                        <p>
                            Question Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('add.question.category') }}" class="nav-link @if(request()->path() == 'admin/add/question/category') bg-success @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manage.question.category') }}" class="nav-link @if(request()->path() == 'admin/manage/question/category') bg-success @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview
                        {{ ((Request::is('admin/add/question')) ? 'menu-open' : '') }}
                        {{ ((Request::is('admin/question/category/list')) ? 'menu-open' : '') }}
                        {{ ((Request::is('admin/manage/question/*')) ? 'menu-open' : '') }}
                        {{ ((Request::is('admin/edit/question/*')) ? 'menu-open' : '') }}
                    ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-question" style="color: green"></i>
                        <p>
                            Questions
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('add.question') }}" class="nav-link @if(request()->path() == 'admin/add/question') bg-success @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Question</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('question.category.list') }}" class="nav-link @if(request()->path() == 'admin/question/category/list') bg-success @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Question</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ route('show.answer') }}" class="nav-link @if(request()->path() == 'admin/show/answer') bg-success @endif">
                        <i class="nav-icon fas fa-box icon-color" style="color: green"></i><p>Collected Data</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('subscriber.list') }}" class="nav-link @if(request()->path() == 'admin/subscriber/list') bg-success @endif">
                        <i class="nav-icon fas fa-home icon-color" style="color: green"></i><p>Subscriber List</p>
                    </a>
                </li>
<<<<<<< HEAD

                <li class="nav-item has-treeview">
                    <a href="{{ route('notify.all') }}" class="nav-link @if(request()->path() == 'admin/subscriber/list') bg-info @endif">
                        <i class="nav-icon fas fa-home icon-color" style="color: green"></i><p>Notify List</p>
                    </a>
                </li>


                {{-- <li class="nav-item has-treeview">
                    <a href="{{ route('contact.list') }}" class="nav-link @if(request()->path() == 'admin/contact/list') bg-info @endif">
                        <i class="nav-icon fas fa-home icon-color" style="color: green"></i><p>Contact List</p>
=======
                <li class="nav-item has-treeview
                        {{ ((Request::is('admin/contact/list')) ? 'menu-open' : '') }}
                        {{ ((Request::is('admin/request/demo')) ? 'menu-open' : '') }}
                    ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user" style="color: green"></i>
                        <p>
                            Contact
                            <i class="right fas fa-angle-left"></i>
                        </p>
>>>>>>> 1431fb14de3a3cd4f9302b02a9e9669f2f392050
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('contact.list') }}" class="nav-link @if(request()->path() == 'admin/contact/list') bg-success @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('request.demo') }}" class="nav-link @if(request()->path() == 'admin/request/demo') bg-success @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Request Demo</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <li class="nav-item has-treeview
                        {{ ((Request::is('admin/add/user')) ? 'menu-open' : '') }}
                        {{ ((Request::is('admin/manage/user')) ? 'menu-open' : '') }}
                        {{ ((Request::is('admin/edit/user/*')) ? 'menu-open' : '') }}
                    ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-astronaut" style="color: green"></i>
                        <p>
                            User / Employee
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('add.user') }}" class="nav-link @if(request()->path() == 'admin/add/user') bg-success @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manage.user') }}" class="nav-link @if(request()->path() == 'admin/manage/user') bg-success @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage User</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Main Sidebar Container -->

