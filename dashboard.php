<?php
session_start();
if(!isset($_SESSION['LOGIN']))
{
    header('Location: login.php');
    die();
}

?>

<body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" crossorigin="anonymous">
<aside class="menu-sidebar d-none d-lg-block">
    <div class="container">
    <a href="logout.php" class="btn btn-danger float-start">Log out</a>
            <div class="logo">
        
                   <h3>Parking Management System</h3>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="dashboard.php"  style="color: blue">
                            <h4>Dashboard</h4></a>
                        </li>

                            <li>
                               <a href="index.php"  style="color: blue">
                               <h4>Add New Vehicles Entry</h4></a>
                           </li>

                           <li>
                               <a href="display.php"  style="color: blue">
                               <h4>Show All Vehicles</h4></a>
                            </li>
                    </ul>
                </nav>
            </div>
    </div>
</aside>
</body>