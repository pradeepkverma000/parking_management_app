<?php
session_start();
include_once('dbconnect.php');
$id=$_GET['id'];

$select=" SELECT * FROM parking_tab WHERE id=$id ";
$result=mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($result);

$dname=$row['drivername'];
$vnumber=$row['vehiclenumber'];
$citime=$row['checkintime'];
$cotime=$row['checkouttime'];

if(isset($_POST['update_data']))
{
    $dname = mysqli_real_escape_string($conn, $_POST['drivername']);
    $vnumber = mysqli_real_escape_string($conn, $_POST['vehiclenumber']);
    $citime = mysqli_real_escape_string($conn, $_POST['checkintime']);
    $cotime = mysqli_real_escape_string($conn, $_POST['checkouttime']);

    $query="UPDATE parking_tab SET id='$id', drivername='$dname', vehiclenumber='$vnumber',
    checkintime='$citime', checkouttime='$cotime' WHERE id=$id";

    $result=mysqli_query($conn,$query);
    if($result)
    {
        ?>
		<script type="text/javascript">
			alert("Data Updated Successfully");
            window.open("http://localhost/parkingms/display.php","_self");
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
			alert("Try Again Later");
		</script>
		<?php
	}

}
?>

<!doctype html>
<html lang="">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css" crossorigin="anonymous">

    <title>Update Vehicles Data</title>
    
  </head>
  <body>
    <div class="container mt-5">
        
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                    <h4>Update Vehicles Data
                        <a href="dashboard.php" class="btn btn-danger">Back</a>
                        <a href="logout.php" class="btn btn-danger float-start">Log out</a>
                    </h4>
                    </div>
                    <div class="card-body">
                         

                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label>Driver Name</label>
                                        <input type="text" name="drivername" value="<?php echo $row['drivername'];?>" placeholder="Enter Driver Name" class="form-control">                            
                                    </div>
                                    <div class="mb-3">
                                        <label>Vehicle Number</label>
                                        <input type="text" name="vehiclenumber" value="<?php echo $row['vehiclenumber'];?>" placeholder="Enter Vehicle Number" class="form-control">                            
                                    </div>
                                    <div class="mb-3">
                                        <label>Checkin Time</label>
                                        <input type="text" name="checkintime" value="<?php echo $row['checkintime'];?>" placeholder="Enter Check in Time" class="form-control">                            
                                    </div>
                                    <div class="mb-3">
                                        <label>Checkout Time</label>
                                        <input type="text" name="checkouttime" value="<?php echo $row['checkouttime'];?>" placeholder="Enter Check out Time" class="form-control">                          
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_data" class="btn btn-primary">Update Data</button>
                                    </div>
                                </form>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>