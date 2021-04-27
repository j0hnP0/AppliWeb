<?php

//Include constants.php file here
include('../config/constants.php');

//1. get the ID of Admin to be deleted
$id = $_GET['id'];

//2. Create SQL Query to Delete Admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

//Execute the query
$res = mysqli_query($conn, $sql);

//Check whether the query executed successfully or not 
if($res==true)
{
    //Query executed successfully and admin deleted 
    //echo "admin deleted";
    //create session variable to display message
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";  //color of message not working
    //Redirect to  Manage Admin page 
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
    //failed to delete admin
    //echo "failed to delete admin";
    $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";  //color of message not working
    header('location:'.SITEURL.'admin/manage-admin.php');

}   

// 3. Redirect to manage admin page with message (success/error)

?>