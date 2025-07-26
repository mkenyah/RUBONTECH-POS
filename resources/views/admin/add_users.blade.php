<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INFO_TRACK</title>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Font Awesome -->
<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

<!-- SB Admin 2 Template CSS -->
<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

<!-- DataTables CSS -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">


<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">INFO_TRACK <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.admin_dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
        
            <!-- Divider -->
            <hr class="sidebar-divider">

          <!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">General Tables</h6>

            <!-- Products Dropdown Trigger -->
            <a class="collapse-item collapsed d-flex justify-content-between align-items-center"
               href="#" data-toggle="collapse" data-target="#collapseProducts"
               aria-expanded="false" aria-controls="collapseProducts">
                Products
                <i class="fas fa-caret-down"></i>
            </a>

            <!-- Products Submenu -->
            <div id="collapseProducts" class="collapse pl-3">
                <a class="collapse-item" href="{{ route('products.fetch_products') }}">All Products</a>
                <a class="collapse-item" href="{{ url('/admin/add_products') }}">Add Product</a>
                <a class="collapse-item" href="{{ url('/admin/product_category') }}">Add Categories</a>
                <a class="collapse-item" href="{{ url('/admin/categories_table') }}">View Categories</a>
            </div>

            <!-- Sales and Others -->
            <a class="collapse-item" href="{{ url('admin.admin_sales') }}">Sales</a>
            <a class="collapse-item" href="{{ url('admin.admin_repairs') }}">Repairs</a>
            <a class="collapse-item" href="{{ url('admin.admin_printing') }}">Printing</a>
            <a class="collapse-item" href="{{ url('admin.admin_photocopy') }}">Photocopies</a>
             <a class="collapse-item" href="{{ url('admin.admin_other_services') }}">Other Services</a>

                        <!-- Expenses Dropdown Trigger -->
            <a class="collapse-item collapsed d-flex justify-content-between align-items-center"
               href="#" data-toggle="collapse" data-target="#collapseExpenses"
               aria-expanded="false" aria-controls="collapseExpenses">
                Expenses
                <i class="fas fa-caret-down"></i>
            </a>

            <!-- Expenses Submenu -->
            <div id="collapseExpenses" class="collapse pl-3">
                <a class="collapse-item" href="{{ url('/admin/view_expenses') }}">All Expenses</a>
                <a class="collapse-item" href="{{ url('/admin/add_expenses') }}">Add Expense</a>
            
            </div>

            <!-- Users Dropdown Trigger -->
<a class="collapse-item collapsed d-flex justify-content-between align-items-center"
   href="#" data-toggle="collapse" data-target="#collapseUsers"
   aria-expanded="false" aria-controls="collapseUsers">
    Users
    <i class="fas fa-caret-down"></i>
</a>

<!-- Users Submenu -->
<div id="collapseUsers" class="collapse pl-3">
    <a class="collapse-item" href="{{ url('/admin/view_users') }}">All Users</a>
    <a class="collapse-item" href="{{ url('/admin/add_users') }}">Add Users</a>
</div>

            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Tables:</h6>
            <a class="collapse-item" href="{{ url('/activity-log') }}">Activity Log</a>
        </div>
    </div>
</li>


            <!-- Nav Item - Charts -->
             <div class="nav-item">
    <a class="nav-link" href="{{ route('admin.admin_graph') }}">

                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
 </div>

           

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="data:image/png;base64,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">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> --}}
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-red-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        {{-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> --}}
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Users</a>
                    </div>


          
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 z-1050 shadow" role="alert" style="width: 50%; z-index: 1050;">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<script>
    setTimeout(() => {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 300); // clean after fade
        }
    }, 4000); // 4 seconds
</script>
<div class="card shadow-lg p-4 mx-auto" style="max-width: 600px;">
    <h4 class="mb-4 text-center">Add New User</h4>

    

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="name" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" name="username" class="form-control" required>
    @error('username')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>



        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" name="role" required>
                <option value="" disabled selected>Select Role</option>
                <option value="admin">Admin</option>
                <option value="employee">Employee</option>
            </select>
            @error('role')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" required>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

       <div class="mb-3 position-relative">
    <label for="password" class="form-label">Password</label>
    <div class="input-group">
        <input type="password" class="form-control" name="password" id="password" required>
        <span class="input-group-text" onclick="togglePasswordVisibility()" style="cursor: pointer;">
            <i class="fas fa-eye" id="toggleIcon"></i>
        </span>
    </div>
    @error('password')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<script>
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye");
    }
}
</script>


        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Add User</button>
        </div>
    </form>
</div>




<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>



                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    


    <!-- jQuery -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap JS Bundle -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- SB Admin 2 Custom Scripts -->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<!-- DataTables JS -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Optional: Chart.js -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

<!-- Chart.js -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

<!-- Chart.js from CDN (RECOMMENDED if local doesn't work) -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

<!-- Chart.js -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>






</body>

</html>