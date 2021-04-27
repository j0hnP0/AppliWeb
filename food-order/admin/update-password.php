<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
         <h1>Change Password</h1>
         <br><br>

        <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        
        ?>
         
         <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Old Password:</td>
                    <td>
                        <input type="password" name="old_password" placeholder="Old Password">
                    </td>
                </tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                        
                        
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
                
            </table>

         
         </form>

    </div>
</div>
<?php

            //CHECK WHETHER THE SUBMIT BUTTON IS CLICKED OR NOT
            if(isset($_POST['submit']))
            {
                //echo "Clicked";  // echo to test button

                //1.Get the data from form
                $id=$_POST['id'];
                $current_password = md5($_POST['current_password']);
                $new_password = md5($_POST['new_password']);
                $confirm_password = md5($_POST['confirm_password']);

                //2. Check whether the user with the current ID and current password exists or not
                $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

                //Execute the query
                $res = mysqli_query($conn, $sql);

                if($res==true)
                {
                    //check whether data is available or not
                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {
                        //User exists and password can be changed
                        //echo "User Found";

                        //check whether the new password and confirm password match or not
                        if($new_password==$confirm_password)
                        {
                            //Update the password
                            //echo "Password Match";
                            $sql2= "UPDATE tbl_admin SET
                                password='$new_password
                                WHERE id=$id
                                ";

                                //Execute the query
                                $res2 = mysqli_query($conn, $res);

                                //Check whether the query executed or not
                                if($res==true)
                                {
                                    //Display Success Message
                                    //Redirect to manage Admin Page with Success Message
                                    $_SESSION['change-pwd'] = "<div class='success'>Password changed successfully. </div>";
                                    //Redirect the user
                                    header('location:'.SITEURL.'admin/manage-admin.php');
                                }
                                else
                                {
                                    //Display Error Message 
                                    $_SESSION['change-pwd'] = "<div class='error'>Failed to change password. </div>";
                                    //Redirect the user
                                    header('location:'.SITEURL.'admin/manage-admin.php');
                                }
                        }
                        else
                        {
                            //Redirect to manage Admin Page with Error Message
                            $_SESSION['pwd-not-match'] = "<div class='error'>Password did not match. </div>";
                            //Redirect the user
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }                             
                    }
                    else
                    {
                        //user does not exist set message and redirect
                        $_SESSION['user-not-found'] = "<div class='error'>User not found. </div>";
                        //Redirect the user
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }

                //3. check whether the New Password and confirm password match or not

                //4. Change password if all above is true
            }



?>
<?php include('partials/footer.php'); ?>

