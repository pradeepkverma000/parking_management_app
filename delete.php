<?php
session_start();
include_once('dbconnect.php');

$id=$_GET['id'];
$query="DELETE FROM parking_tab WHERE id='$id'";
$data=mysqli_query($conn,$query);
if($data)
{
    ?>
    <script type="text/javascript">
        alert("Data Deleted Successfully");
        window.open("http://localhost/parkingms/display.php", "_self");
    </script>
    <?php
}
else
{
    ?>
    <script type="text/javascript">
        alert("Try Again");
    </script>
    <?php
}

?>