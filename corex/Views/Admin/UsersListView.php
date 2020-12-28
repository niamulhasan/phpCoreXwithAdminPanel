<?php

$admin = new User();
if ($admin->isLoggedIn() != true) {
    Redirect::to("http://localhost/" . Config::get('app_variables/root_url') . '/admin/login');
    die("You Are not logged in");
}

if ($admin->hasPermission('admin') == false) {
    Redirect::to("http://localhost/" . Config::get('app_variables/root_url') . '/admin/login');
    die("You Don't have the permission to access this page");
}

?>
<?php require_once 'partials/head.php'; ?>
<!-- partial -->


<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php require_once 'partials/navbar.php' ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <?php require_once 'components/themesettings.php'; ?>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <?php require_once 'partials/sidebar.php'; ?>
        <div class="main-panel">
            <div class="content-wrapper">


                <div class="grid-margin grid-margin-md-0 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All Users</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="pt-1 pl-0">
                                                User
                                            </th>
                                            <th class="pt-1">
                                                Joined
                                            </th>
                                            <th class="pt-1">
                                                User Type
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach (self::$params as $user) { ?>
                                            <tr>
                                                <td class="py-1 pl-0">
                                                    <div class="d-flex align-items-center">
                                                        <img src="http://localhost/<?php echo Config::get('app_variables/root_url'); ?>/assets/images/faces/face1.jpg" alt="profile">
                                                        <div class="ml-3">
                                                            <p class="mb-2"><?php echo $user->name; ?></p>
                                                            <p class="mb-0 text-muted text-small"><?php echo $user->username; ?></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo $user->joined; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($user->usrGroup == 1) {
                                                        echo '<label class="badge badge-success">Standard User</label>';
                                                    } elseif ($user->usrGroup == 2) {
                                                        echo '<label class="badge badge-danger">Admin</label>';
                                                    } elseif ($user->usrGroup == 3) {
                                                        echo '<label class="badge badge-warning">Travel Agent</label>';
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 All rights
                        reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Made with phpCoreX</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <?php require_once 'partials/foot.php'; ?>