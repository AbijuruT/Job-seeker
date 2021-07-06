<?php
session_start();
include_once('../server/config/conn.php');
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    header("Location:../login.php");
    exit();
}
include_once('../server/logout.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>

    <!-- Custom Icons-->
    <link href="../vendor/boxicons/css/boxicons.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles-->
    <link href="../dist/css/dashboard.min.css" rel="stylesheet">
    <!-- Data tables -->
    <link rel="stylesheet" href="../vendor/datatables/dataTables.bootstrap4.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <i class="bx bx-group"></i>
                </div>
                <div class="sidebar-brand-text mx-3">job<sup>Seeker</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="bx bx-cookie"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Action center
            </div>
            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="bx bx-cog"></i>
                    <span>Settings</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#"><i class="bx bx-user-plus"></i>Profile</a>

                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">



            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <a href="#" id="sidebarToggle"><i class="bx bx-chevron-left"></i></a>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-dark topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="bx bx-menu-alt-right"></i>
                    </button>

                    <!-- Page Heading -->
                    <div class="d-none d-lg-block align-items-center justify-content-between my-4">
                        <h1 class="h3 mb-0 text-gray-400 text-uppercase font-weight-bold">Job seeker</h1>
                    </div>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Add content -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Job Applications</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Names</th>
                                                <th>Phone</th>
                                                <th>Job area</th>
                                                <th>Position</th>
                                                <th>CV</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>1</td>
                                                <td class="text-capitalize">Full name</td>
                                                <td>0788665412</td>
                                                <td class="text-capitalize">Technology</td>
                                                <td class="text-capitalize">Programmer</td>
                                                <td>Cv_ doc</td>
                                                <td>
                                                    <form method="post" action="#" style="display: inline-block">
                                                        <input type="hidden" name="user_id" value="<?php echo $row['Id'] ?>" />
                                                        <button type="submit" class="btn btn-sm btn-outline-success" onclick="return confirm('Are you sure you want to download this document ')">Download</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!-- <tfoot>
                                        <th>#</th>
                                        <th>Names</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Position</th>
                                        <th>Action</th>
                                    </tfoot> -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


            <!-- Footer -->
            <footer class="sticky-footer bg-dark">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; jobSeeker 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="bx bx-chevron-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/dist/jquery.min.js" difer></script>
    <script src="../vendor/bootstrap/dist/js/bootstrap.min.js" difer></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js" difer></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js" difer></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js" difer></script>
    <script src="../dist/js/datatables-demo.js" difer></script>
    <!-- Custom scripts for all pages-->
    <script src="../dist/js/dashboard.min.js" difer></script>




</body>

</html>