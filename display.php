<?php
session_start();

include_once('dbconnect.php');
if(!isset($_SESSION['LOGIN']))
{
    header('Location: login.php');
    die();
}
?>

<html lang="en">
  <head>
 

    <!-- Bootstrap CSS for Table -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" crossorigin="anonymous">

    <title>Show All Vehicles Data</title>
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>All Vehicles Data
                <a href="index.php" class="btn btn-primary float-start-sm">Add New Vehicle Entry</a>
                <a href="dashboard.php" class="btn btn-danger ">Back</a>&nbsp;
                <a href="logout.php" class="btn btn-danger float-start">Log out</a>
              </h4>
            </div>
            <div class="cord-body">
              <table class="table table-bordered-sm table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Driver Name</th>
                    <th>Vehicle Number</th>
                    <th>Check in Time</th>
                    <th>Check out Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT * FROM parking_tab";
                    $result = mysqli_query($conn,$query);
                    if(mysqli_num_rows($result)>0)
                    {
                      foreach($result as $row)
                      {
                      
                        ?>
                        <tr>
                          <td><?=$row['id']?></td>
                          <td><?=$row['drivername']?></td>
                          <td><?=$row['vehiclenumber']?></td>
                          <td><?=$row['checkintime']?></td>
                          <td><?=$row['checkouttime']?></td>
                          <td>
                            <a href="update.php?id=<?php echo $row['id']?>" class="btn btn-success">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']?>"class="btn btn-danger">Delete</a>
                          </td>
                        </tr>
                        <?php
                      }
                    }
                    else
                    {
                      echo "<h5>No Record Found</h5>";
                    }
                  ?>
                  <tr>
                    <td></td>
                  </tr>
              </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  
  </body>
</html>
