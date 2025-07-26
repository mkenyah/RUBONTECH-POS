<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Joseph Kirika">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Font Awesome -->
<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

<!-- SB Admin 2 Template CSS -->
<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

<!-- DataTables CSS -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">


<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- In <head> -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Before </body> -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Bootstrap CSS (in <head>) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS + Popper (before </body>) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
                <a class="nav-link" href="{{ route('employee.employee_dashboard') }}">
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
        <span>Navigations</span>
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
                   <a class="collapse-item" href="{{ route('employee.products') }}">My Products</a>

<a class="collapse-item" href="{{ route('employee.categories') }}">View Categories</a>

            </div>

            <!-- Sales and Others -->
            <a class="collapse-item" href="{{ route('employee.transactions') }}">Transactions</a>
            <a class="collapse-item" href="{{ url('employee.user_sales') }}">My Sales</a>

            <a class="collapse-item" href="{{ route('repairs.user') }}">Repairs</a>

           <a class="collapse-item" href="{{ route('employee.printings') }}">Printing</a>

          <a class="collapse-item" href="{{ route('employee.photocopies') }}">Photocopy</a>
          <a class="collapse-item" href="{{ route('employee.other_services') }}">Other Services</a>

           




        
        




             
          
    </div>
</li>

 <hr class="sidebar-divider">

           

           

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
<!-- Page Header -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Transactions</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-exchange-alt fa-sm text-white-50"></i> General Transactions
    </a>
</div>

<div id="flash-message" class="position-fixed top-0 end-0 p-3" style="z-index: 1055; width: auto; max-width: 400px;"></div>


<!-- Unified Service Forms and Receipt -->
<div class="row">
    <!-- Left Column: Services -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Sell Products</h6>
            </div>
<div class="card-body">
    <div class="form-group">
        <label for="searchInput">Search Product by Name</label>
        <input type="text" id="searchInput" class="form-control" placeholder="Start typing product name...">
        <div id="searchResults" class="list-group position-absolute w-100" style="z-index: 1000;">
            </div>
    </div>

    <input type="hidden" id="product_id">
    <input type="hidden" id="available_qty">
    <input type="hidden" id="price">
    <input type="hidden" id="selected_product_name"> <div class="form-group mt-3">
        <label for="quantity">Enter Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1">
        <small id="stockWarning" class="form-text text-danger d-none">
            </small>
    </div>

    <button type="button" class="btn btn-primary btn-block" id="addProductButton" onclick="addToReceipt('Product')">
        Add Product to Receipt
    </button>
</div>



        </div>

        <!-- Flexbox Service Forms -->
       <!-- Flexbox Service Forms -->
<div class="d-flex flex-wrap justify-content-between align-items-stretch gap-3">
    <!-- Printing -->
    <div class="card shadow mb-4 flex-fill" style="min-width: 250px; max-width: 100%;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Printing</h6>
        </div>
        <div class="card-body">
            <form id="printingForm" onsubmit="return false;">
                <div class="form-group">
                    <label>Cost per Page</label>
                    <input type="number" id="cost_per_page" step="0.01" class="form-control">
                </div>
                <div class="form-group">
                    <label>Pages</label>
                    <input type="number" id="number_of_pages" class="form-control">
                </div>
                <button type="button" class="btn btn-primary btn-block" onclick="addToReceipt('Printing')">Add Printing</button>
            </form>
        </div>
    </div>

    <!-- Photocopy -->
    <div class="card shadow mb-4 flex-fill" style="min-width: 250px; max-width: 100%;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Photocopy</h6>
        </div>
        <div class="card-body">
            <form id="photocopyForm" onsubmit="return false;">
                <div class="form-group">
                    <label>Cost/Page</label>
                    <input type="number" id="copy_cost" step="0.01" class="form-control">
                </div>
                <div class="form-group">
                    <label>Pages</label>
                    <input type="number" id="total_pages" class="form-control">
                </div>
                <button type="button" class="btn btn-success btn-block" onclick="addToReceipt('Photocopy')">Add Photocopy</button>
            </form>
        </div>
    </div>

    <!-- Repair -->
    <div class="card shadow mb-4 flex-fill" style="min-width: 250px; max-width: 100%;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-warning">Repair</h6>
        </div>
        <div class="card-body">
            <form id="repairForm" onsubmit="return false;">
                <div class="form-group">
                    <label>Service Type</label>
                    <input type="text" id="repair_service" class="form-control">
                </div>
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" id="repair_quantity" class="form-control" placeholder="Quantity" min="1" value="1" />

                </div>
                <div class="form-group">
                    <label>Cost</label>
                    <input type="number" id="repair_cost" step="0.01" class="form-control">
                </div>
                <button type="button" class="btn btn-warning btn-block" onclick="addToReceipt('Repair')">Add Repair</button>
            </form>
        </div>
    </div>

    <!-- Other Services -->
    <div class="card shadow mb-4 flex-fill" style="min-width: 250px; max-width: 100%;">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Other Services</h6>
    </div>
    <div class="card-body">
        <form id="otherServiceForm" onsubmit="return false;">
            <div class="form-group">
                <label>Description</label>
                <input type="text" id="other_description" class="form-control" placeholder="e.g., Scanning, Typing">
            </div>
            <div class="form-group">
                <label>Quantity</label>
             
<input type="number" id="other_quantity" class="form-control" placeholder="Quantity" min="1" value="1" />

            </div>
            <div class="form-group">
                <label>Cost</label>
                <input type="number" id="other_cost" step="0.01" class="form-control">
            </div>
            <button type="button" class="btn btn-info btn-block" onclick="addToReceipt('Other')">Add Other Service</button>
        </form>
    </div>
</div>

</div>

    </div>


 

  <!-- ✅ FULL AMENDED RECEIPT & PAYMENT SECTION WITH PRINT SUPPORT -->
<!-- Right Column: Receipt -->
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Right Column: Receipt -->



<div class="col-xl-4 col-lg-5">
  <div class="card shadow mb-4" id="receiptSection">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between d-print-none">
      <h6 class="m-0 font-weight-bold text-primary">Receipt & Payments</h6>
      <div id="flash-message" class="container mt-3"></div>
      <button type="button" class="btn btn-outline-dark btn-sm" onclick="printReceipt()">
        <i class="bi bi-printer-fill"></i> Receipt
      </button>
    </div>

    <div class="card-body">

      <!-- PRINT-ONLY HEADING -->
      <div class="text-center d-none d-print-block mb-4">
        <h5 style="margin: 0;">INFO_TRACK</h5>
        <h6 style="margin: 0;">Customer Receipt</h6>
        <p><strong>Date:</strong> <span id="printDateTime"></span></p>
        <p><strong>Transaction ID:</strong> <span id="printTransactionId"></span></p>
        <p><strong>Served By:</strong> {{ Auth::user()->name }}</p>
      </div>

      <!-- Receipt Table -->
      <div>
        <table class="table mt-3" id="receiptItems">
          <thead>
            <tr>
              <th>Service/Product</th>
              <th>Qty</th>
              <th>Total (Ksh)</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>

      <!-- Total Amount -->
      <div class="mb-3">
        <strong>Total Amount:</strong>
        <span id="receiptTotal" style="color:rgb(247, 143, 7)"><strong>Ksh 0</strong></span>
      </div>

      <!-- Payment Method Dropdown (Hidden when printing) -->
      <div class="mb-3 d-print-none">
        <label>Payment Method</label>
        <select id="receiptPaymentMethod" class="form-control">
          <option value="">-- Select Payment --</option>
          <option value="Cash">Cash</option>
          <option value="MPesa">MPesa</option>
        </select>
      </div>

      <!-- Cash Section -->
      <div id="cashSection" class="d-none d-print-none">
        <label>Amount Given</label>
        <input type="number" id="cashGiven" class="form-control mb-2">
        <div><strong>Change:</strong> <span id="changeDisplay" style="color:orange">Ksh 0.00</span></div>
        <button class="btn btn-warning btn-block mt-2" onclick="confirmCashPayment()">Confirm Cash Payment</button>
      </div>

      <!-- MPesa Section -->
      <div id="mpesaSection" class="d-none d-print-none">
        <label>MPesa Phone</label>
        <input type="tel" id="mpesaPhone" class="form-control mb-2" placeholder="07XXXXXXXX">
        <button class="btn btn-success btn-block mt-2" onclick="confirmMpesaPayment()">Confirm MPesa Payment</button>
        <button class="btn btn-warning btn-block mt-2" onclick="verifyMpesaPayment()">Verify Payments</button>
      </div>
    </div>
  </div>
</div>

<!-- Print Function -->
<script>
  function printReceipt() {
    const now = new Date();
    const options = {
      year: 'numeric',
      month: 'long',
      day: 'numeric',
      hour: '2-digit',
      minute: '2-digit',
      second: '2-digit',
      hour12: true
    };
    const formattedDate = now.toLocaleString('en-KE', options);

    document.getElementById('printTransactionId').textContent = window.currentTransactionId || `TX-${Date.now()}`;
    document.getElementById('printDateTime').textContent = formattedDate;

    const printContents = document.getElementById('receiptSection').innerHTML;

    const printWindow = window.open('', '', 'width=800,height=600');
    printWindow.document.write(`
      <html>
        <head>
          <title>Receipt</title>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
          <style>
            body {
              padding: 20px;
              font-family: Arial, sans-serif;
              color: #000;
            }
            table {
              width: 100%;
              font-size: 14px;
              border-collapse: collapse;
              margin-top: 20px;
            }
            th, td {
              padding: 8px;
              border: 1px solid #ccc;
            }
            .d-print-none {
              display: none !important;
            }
            .d-none.d-print-block {
              display: block !important;
            }
            .text-center {
              text-align: center;
            }
          </style>
        </head>
        <body onload="window.print(); setTimeout(() => window.close(), 500);">
          ${printContents}
        </body>
      </html>
    `);
    printWindow.document.close();
    printWindow.focus();
  }
</script>


<!-- Optional: Print Script (if not already declared) -->

<!-- Bootstrap JS (already included as per your previous input) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<!-- ✅ BOOTSTRAP & PRINT STYLES -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
@media print {
  body * {
    visibility: hidden;
  }

  #receiptSection, #receiptSection * {
    visibility: visible;
  }

  #receiptSection {
    position: fixed;
    top: 0; /* Ensures it prints from the very top */
    left: 0;
    width: 100%;
    padding: 20px;
    background: white; /* Optional: ensure background is white on print */
    z-index: 9999;
  }

  .d-print-none {
    display: none !important;
  }

  .d-print-block {
    display: block !important;
  }
}
</style>



<!-- ✅ PRINT FUNCTION -->
<script>
function printReceipt() {
    if (!window.receiptReady) {
        alert('🛑 Please update the receipt before printing.');
        return;
    }

    const now = new Date();
    const formattedDate = now.toLocaleString('en-KE', {
        year: 'numeric', month: 'long', day: 'numeric',
        hour: 'numeric', minute: '2-digit', second: '2-digit', hour12: true
    });

    document.getElementById('printTransactionId').textContent = window.currentTransactionId;
    document.getElementById('printDateTime').textContent = formattedDate;

    window.print();
}
</script>

<!-- ✅ BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



<script>
document.addEventListener('DOMContentLoaded', () => {
    // ✅ One-time initialization for the entire script
    window.currentTransactionId = `TX-${Date.now()}-${Math.floor(Math.random() * 1000)}`;
    window.receiptReady = false;

    // Core receipt logic variables
    const items = [];
    const receiptItems = document.querySelector('#receiptItems tbody');
    const receiptTotal = document.getElementById('receiptTotal');
    const paymentMethodInput = document.getElementById('receiptPaymentMethod');
    const cashSection = document.getElementById('cashSection');
    const mpesaSection = document.getElementById('mpesaSection');
    const cashGiven = document.getElementById('cashGiven');
    const changeDisplay = document.getElementById('changeDisplay');
    const mpesaPhone = document.getElementById('mpesaPhone');
    let lastTypeAdded = null; // To track the last type of item added for input clearing

    // Product search and selection variables
    let debounceTimer;
    const searchInput = document.getElementById('searchInput'); // The text input for searching
    const searchResults = document.getElementById('searchResults'); // The div to display search results
    const hiddenProductId = document.getElementById('product_id'); // Hidden input for selected product ID
    const hiddenAvailableQty = document.getElementById('available_qty'); // Hidden input for selected product's quantity
    const hiddenPrice = document.getElementById('price'); // Hidden input for selected product's price
    const quantityInput = document.getElementById('quantity'); // The input for desired quantity
    const stockWarning = document.getElementById('stockWarning'); // Small text for stock warning
    const addProductButton = document.getElementById('addProductButton'); // The button to add product to receipt


    // --- Core Receipt/Payment UI Logic ---

    // Toggle payment UI (Cash/MPESA sections)
    paymentMethodInput.addEventListener('change', () => {
        const method = paymentMethodInput.value.toLowerCase();
        cashSection.classList.toggle('d-none', method !== 'cash');
        mpesaSection.classList.toggle('d-none', method !== 'mpesa');
    });

    // Update receipt when cash given changes (for change calculation)
    cashGiven.addEventListener('input', updateReceipt);

    // --- Product Search & Selection Logic ---

    // Ensure all necessary elements exist before adding event listeners
    if (searchInput && searchResults && hiddenProductId && hiddenAvailableQty && hiddenPrice && quantityInput && stockWarning && addProductButton) {
        // Initially disable the add product button
        addProductButton.disabled = true;

        // Debounced search input handler
        searchInput.addEventListener('input', () => {
            clearTimeout(debounceTimer);
            const query = searchInput.value.trim();

            // Clear hidden values and reset UI when typing again
            hiddenProductId.value = '';
            hiddenAvailableQty.value = '';
            hiddenPrice.value = '';
            quantityInput.value = ''; // Keep quantity empty here
            stockWarning.classList.add('d-none'); // Hide any stock warning
            addProductButton.disabled = true; // Disable add button until a product is selected

            if (query.length < 2) { // Only search if at least 2 characters are typed
                searchResults.innerHTML = ''; // Clear previous results
                return;
            }

            debounceTimer = setTimeout(() => {
                fetch(`/products/search?q=${encodeURIComponent(query)}`)
                    .then(response => {
                        // Check if the response was successful (HTTP status 2xx)
                        if (!response.ok) {
                            return response.text().then(text => {
                                throw new Error(`Server Error: ${response.status} - ${text}`);
                            });
                        }
                        return response.json(); // Parse JSON response
                    })
                    .then(products => {
                        searchResults.innerHTML = ''; // Clear old results
                        if (products.length === 0) {
                            searchResults.innerHTML = '<li class="list-group-item disabled">No results found</li>';
                            return;
                        }

                        products.forEach(product => {
                            const li = document.createElement('li');
                            li.className = 'list-group-item list-group-item-action';
                            // Display format: Product Name — Quantity in stock — Price
                            li.textContent = `${product.product_name} — ${product.quantity} in stock — Ksh ${product.selling_price}`;

                            li.addEventListener('click', () => {
                                // Populate hidden fields with selected product data
                                hiddenProductId.value = product.id;
                                hiddenAvailableQty.value = product.quantity;
                                hiddenPrice.value = product.selling_price;
                                // Set search input text to the full display string of the selected product
                                searchInput.value = li.textContent;
                                searchResults.innerHTML = ''; // Hide search results
                                quantityInput.max = product.quantity; // Set max attribute for HTML5 validation
                                quantityInput.focus(); // Focus on the quantity input
                                // Don't enable add button here, enable after quantity is entered
                                stockWarning.classList.add('d-none'); // Clear any previous warning

                                // Re-evaluate add button state based on current quantity input
                                // This is crucial because quantity is now empty by default
                                updateAddButtonState();
                            });
                            searchResults.appendChild(li);
                        });
                    })
                    .catch(err => {
                        searchResults.innerHTML = '<li class="list-group-item text-danger">Error loading results. Please try again.</li>';
                        console.error('Fetch Error for products/search:', err);
                        showFlashMessage('danger', `Error fetching products: ${err.message}`);
                    });
            }, 400); // Debounce time in milliseconds
        });

        // Helper function to update the add product button's state
        function updateAddButtonState() {
            const enteredQty = parseInt(quantityInput.value);
            const stockQty = parseInt(hiddenAvailableQty.value);
            const productIdSelected = hiddenProductId.value !== ''; // Check if a product ID is selected

            // Button is enabled ONLY if a product is selected, quantity is a valid number (>=1), and within stock
            if (productIdSelected && !isNaN(enteredQty) && enteredQty >= 1 && enteredQty <= stockQty) {
                addProductButton.disabled = false;
            } else {
                addProductButton.disabled = true;
            }
        }

        // Client-side quantity validation and button state management
        quantityInput.addEventListener('input', () => {
            const enteredQty = parseInt(quantityInput.value);
            const stockQty = parseInt(hiddenAvailableQty.value);

            // If no product is selected (stockQty is NaN) or quantity input is invalid
            if (hiddenProductId.value === '' || isNaN(stockQty)) { // Added check for hiddenProductId.value
                stockWarning.classList.add('d-none'); // Hide warning
                addProductButton.disabled = true; // Keep button disabled
                return;
            }

            if (isNaN(enteredQty) || enteredQty < 1) { // If quantity is not a valid number or less than 1
                stockWarning.textContent = 'Please enter a valid quantity (1 or more).';
                stockWarning.classList.remove('d-none');
                addProductButton.disabled = true; // Disable add button
            } else if (enteredQty > stockQty) {
                stockWarning.textContent = `Quantity exceeds available stock. Only ${stockQty} available.`;
                stockWarning.classList.remove('d-none'); // Show warning
                addProductButton.disabled = true; // Disable add button
            } else {
                stockWarning.classList.add('d-none'); // Hide warning
                addProductButton.disabled = false; // Enable add button
            }
        });
    } else {
        console.warn("One or more product search/quantity elements not found. Product search disabled.");
    }


    // --- Common Functions for Adding to Receipt ---

    window.addToReceipt = function(type) {
        let name = '', price = 0, quantity = 0; // Initialize quantity to 0

        if (type === 'Printing') {
            name = 'Printing';
            price = parseFloat(document.getElementById('cost_per_page').value) || 0;
            quantity = parseInt(document.getElementById('number_of_pages').value) || 0;
        } else if (type === 'Photocopy') {
            name = 'Photocopy';
            price = parseFloat(document.getElementById('copy_cost').value) || 0;
            quantity = parseInt(document.getElementById('total_pages').value) || 0;
        } else if (type === 'Repair') {
            name = document.getElementById('repair_service').value.trim();
             quantity = parseInt(document.getElementById('repair_quantity').value) || 0;
            price = parseFloat(document.getElementById('repair_cost').value) || 0;
        } else if (type === 'Other') {
            name = document.getElementById('other_description').value.trim();
            quantity = parseInt(document.getElementById('other_quantity').value) || 0;
            price = parseFloat(document.getElementById('other_cost').value) || 0;
        } else if (type === 'Product') {
            // For 'Product' type, get data from the hidden inputs
            const productId = hiddenProductId.value;
            const selectedProductNameDisplay = searchInput.value; // Use the displayed text in searchInput
            const selectedProductPrice = parseFloat(hiddenPrice.value) || 0;
            const selectedProductQty = parseInt(hiddenAvailableQty.value) || 0;
            const enteredQuantity = parseInt(quantityInput.value) || 0;

            if (!productId) {
                alert('Please select a product using the search bar.');
                return;
            }
            if (!selectedProductNameDisplay || selectedProductPrice <= 0) {
                 alert('Selected product data is incomplete. Please select again.');
                 return;
            }
            // Quantity validation specific to Product type
            if (isNaN(enteredQuantity) || enteredQuantity < 1) {
                alert('Please enter a valid quantity (1 or more).');
                return;
            }
            // Client-side stock check for Product type
            if (enteredQuantity > selectedProductQty) {
                alert(`Cannot add ${enteredQuantity} units. Only ${selectedProductQty} available in stock.`);
                return;
            }

            name = selectedProductNameDisplay.split('—')[0].trim(); // Extract just the name
            price = selectedProductPrice;
            quantity = enteredQuantity;
        } else {
            alert('Invalid item type selected.');
            return;
        }

        // Common validation for all types
        if (!name || price <= 0 || quantity <= 0) { // Quantity check for all types
            alert('Please fill in all required fields correctly (ensure quantity is greater than 0).');
            return;
        }

        lastTypeAdded = type;
        items.push({ name, quantity, price, total: price * quantity, type });

        // For 'Product' type, pass the actual product ID
        const dataToSave = { name, price, quantity };
        if (type === 'Product') {
            dataToSave.product_id = hiddenProductId.value;
        }
        saveToDB(type, dataToSave);
        updateReceipt();
    };

    function updateReceipt() {
        receiptItems.innerHTML = '';
        let total = 0;

        items.forEach(item => {
            total += item.total;
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${item.name}</td>
                <td>${item.quantity}</td>
                <td><strong>Ksh ${item.total.toLocaleString()}</strong></td>
            `;
            receiptItems.appendChild(tr);
        });

        receiptTotal.textContent = `Ksh ${total.toLocaleString()}`;

        if (paymentMethodInput.value.toLowerCase() === 'cash') {
            const change = Math.max(0, (parseFloat(cashGiven.value) || 0) - total);
            changeDisplay.textContent = `Ksh ${change.toLocaleString()}`;
        }

        // Clear inputs after an item is added, based on its type
        clearInputs(lastTypeAdded);
        lastTypeAdded = null; // Reset for the next addition

        window.receiptReady = true;
    }

    function saveToDB(type, itemData) { // itemData now includes productId if type is 'Product'
        let url = '';
        const paymentMethod = paymentMethodInput.value.toLowerCase() || 'cash';

        const data = {
            _token: document.querySelector('meta[name="csrf-token"]').content,
            payment_method: paymentMethod,
            transaction_id: window.currentTransactionId,
            status: 'unpaid'
        };

        if (paymentMethod === 'mpesa' && mpesaPhone.value.trim()) {
            data.mpesa_code = mpesaPhone.value.trim();
        }

        switch (type) {
            case 'Printing':
                url = '/printing/store';
                data.cost_per_page = itemData.price;
                data.number_of_pages = itemData.quantity;
                break;
            case 'Photocopy':
                url = '/photocopy/store';
                data.cost_per_page = itemData.price;
                data.total_pages = itemData.quantity;
                break;
            case 'Repair':
    url = '/repairs/store';
    data.service_type = itemData.name;
    data.cost = itemData.price;
    data.quantity = itemData.quantity; // ✅ New line for repairs
    break;
case 'Other':
    url = '/otherservice/store';
    data.description = itemData.name;
    data.cost = itemData.price;
    data.quantity = itemData.quantity; // ✅ New line for other_services
    break;

            case 'Product':
                url = '/sales/store'; // Your endpoint for product sales
                data.product_id = itemData.product_id; // Use the product ID passed
                data.quantity = itemData.quantity;
                break;
            default:
                console.error("Unknown item type:", type);
                showFlashMessage('danger', `Cannot save: Unknown item type '${type}'.`);
                return;
        }

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': data._token
            },
            body: JSON.stringify(data)
        })
        .then(res => {
            if (!res.ok) { // Check for HTTP errors (e.g., 400, 500)
                return res.json().then(errorData => {
                    throw new Error(errorData.message || `Server error: ${res.status}`);
                }).catch(() => {
                    return res.text().then(text => { throw new Error(text || `Server responded with status ${res.status}`); });
                });
            }
            return res.json();
        })
        .then(res => {
            if (type === 'Product') {
                // After successful sale, update the hidden available quantity
                const oldQty = parseInt(hiddenAvailableQty.value) || 0;
                const newQty = oldQty - itemData.quantity;
                hiddenAvailableQty.value = newQty; // Update hidden field

                // Also update the displayed text in the search input to reflect new stock
                const currentSearchText = searchInput.value;
                const updatedSearchText = currentSearchText.replace(/— \d+ in stock/, `— ${newQty} in stock`);
                searchInput.value = updatedSearchText;

                // Clear product search related inputs after adding to receipt
                clearInputs('Product');
            }
            showFlashMessage(res.status || 'success', res.message || `${type} added successfully!`);
        })
        .catch(err => {
            console.error('Error saving to DB:', err);
            showFlashMessage('danger', `Error saving ${type}: ${err.message || 'An unknown error occurred.'}`);
        });
    }

    function sendReceipt() {
    const transactionId = window.currentTransactionId;
    const paymentMethod = 'cash'; // or 'mpesa'
    const total = parseFloat(document.getElementById('receiptTotal').textContent.replace(/[^\d.]/g, ''));

    const items = [...document.querySelectorAll('.receipt-item')].map(item => ({
        item_name: item.querySelector('.item-name').textContent.trim(),
        quantity: parseInt(item.querySelector('.item-qty').textContent.trim()),
        price: parseFloat(item.querySelector('.item-price').textContent.trim())
    }));

    fetch('/finalize-receipt', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            transaction_id: transactionId,
            payment_method: paymentMethod,
            total: total,
            items: items
        })
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message || 'Receipt sent!');
    })
    .catch(err => {
        console.error(err);
        alert('Error finalizing receipt');
    });
}


    

    function clearInputs(type) {
        const clear = id => {
            const el = document.getElementById(id);
            if (el) el.value = '';
        };

        if (type === 'Printing') {
            clear('cost_per_page');
            clear('number_of_pages');
        } else if (type === 'Photocopy') {
            clear('copy_cost');
            clear('total_pages');
        } else if (type === 'Repair') {
            clear('repair_service');
            clear('repair_quantity');
            clear('repair_cost');
        } else if (type === 'Other') {
            clear('other_description');
            clear('other_quantity');
            clear('other_cost');
        } else if (type === 'Product') {
            // Clear product search/selection specific inputs
            searchInput.value = '';
            searchResults.innerHTML = ''; // Clear search results display
            hiddenProductId.value = '';
            hiddenAvailableQty.value = '';
            hiddenPrice.value = '';
            quantityInput.value = ''; // Keep quantity empty here
            stockWarning.classList.add('d-none'); // Hide warning
            addProductButton.disabled = true; // Disable add button
        }
    }

    // --- Payment Confirmation Functions ---

     window.confirmCashPayment = function () {
        if (items.length === 0) {
            showFlashMessage('danger', '❌ No items in receipt to confirm payment.');
            return;
        }

        const total = parseFloat(receiptTotal.textContent.replace(/[^\d.]/g, '')) || 0;
        const csrf = document.querySelector('meta[name="csrf-token"]').content;

        fetch('/confirm-cash-payment', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf
            },
            body: JSON.stringify({
                transaction_id: window.currentTransactionId,
                total_amount: total // You might want to send total for server-side validation
            })
        })
        .then(res => res.json())
        .then(data => {
            showFlashMessage(data.status, data.message);
            if (data.status === 'success') setTimeout(() => location.reload(), 2000);
        })
        .catch(err => {
            console.error('Cash Payment Error:', err);
            showFlashMessage('danger', '❌ An error occurred during cash payment.');
        });
    };

window.confirmMpesaPayment = function () {
    const total = parseFloat(receiptTotal.textContent.replace(/[^\d.]/g, '')) || 0;
    const phone = mpesaPhone.value.trim();
    const csrf = document.querySelector('meta[name="csrf-token"]').content;

    // Validate Safaricom, Airtel, Telkom numbers (07... or 01...)
    if (!/^(07|01)\d{8}$/.test(phone)) {
        showFlashMessage('danger', '❌ Enter a valid Kenyan mobile number (07xxxxxxxx or 01xxxxxxxx)');
        return;
    }

    fetch('/confirm-mpesa-payment', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrf
        },
        body: JSON.stringify({
            transaction_id: window.currentTransactionId,
            payment_method: 'mpesa',
            total_amount: total,
            phone_number: phone,
            items: items
        })
    })
    .then(async res => {
        const text = await res.text();
        let data;
        try {
            data = JSON.parse(text);
        } catch (err) {
            console.error('⚠️ Response is not JSON:', text);
            throw new Error('Invalid server response (not JSON)');
        }
        showFlashMessage(data.status || 'danger', data.message || 'Unknown error occurred.');
    })
    .catch(err => {
        console.error('❌ STK Push Error:', err);
        showFlashMessage('danger', '❌ MPESA request failed. Please try again.');
    });
};


    window.verifyMpesaPayment = function () {
        const csrf = document.querySelector('meta[name="csrf-token"]').content;

        fetch('/verify-mpesa-payment', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrf
            },
            body: JSON.stringify({
                transaction_id: window.currentTransactionId
            })
        })
        .then(res => res.json())
        .then(data => {
            showFlashMessage(data.status, data.message);
            if (data.status === 'success') setTimeout(() => location.reload(), 2000);
        })
        .catch(err => {
            console.error('Verification Error:', err);
            showFlashMessage('danger', '❌ Error verifying MPESA payment.');
        });
    };

    // --- Utility Functions ---

    // Generic function to display flash messages
    function showFlashMessage(type, message) {
        const container = document.getElementById('flash-message');
        if (!container) {
            console.warn('Flash message container #flash-message not found in HTML.');
            return;
        }
        container.innerHTML = `
            <div class="alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show mt-2" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        setTimeout(() => container.innerHTML = '', 5000); // Hide after 5 seconds
    }

    // Clear UI for a new transaction (not specific item clearing)
    function clearUI() {
        cashGiven.value = '';
        changeDisplay.textContent = 'Ksh 0.00';
        receiptItems.innerHTML = ''; // Clear receipt display
        receiptTotal.textContent = 'Ksh 0.00';
        window.receiptReady = false; // Mark receipt as not ready for print
    }

    // --- Print Function ---
    window.printReceipt = function() {
        if (!window.receiptReady) {
            alert('🛑 Please add items to the receipt before printing.');
            return;
        }

        const now = new Date();
        const options = {
            year: 'numeric', month: 'long', day: 'numeric',
            hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true
        };
        const formattedDate = now.toLocaleString('en-KE', options);
        const transactionId = window.currentTransactionId || `TX-${Date.now()}`;

        const printTransactionIdEl = document.getElementById('printTransactionId');
        const printDateTimeEl = document.getElementById('printDateTime');

        if (printTransactionIdEl) printTransactionIdEl.textContent = transactionId;
        if (printDateTimeEl) printDateTimeEl.textContent = formattedDate;

        window.print(); // Triggers browser's print dialog
    };
});
</script>















    <!-- Logout Modal-->
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




<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#product_id').select2({
            placeholder: '-- Select Product --',
            allowClear: true,
            width: '100%' // Ensures it spans full width
        });
    });
</script>




    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> --}}
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
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

    
<!-- jQuery (required) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


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

<!-- ✅ jQuery First -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>









</body>

</html>