<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">       
        <h1>Add Admin</h1>

        <br/><br/>

        <?php
                if(isset($_SESSION['add'])) //checking wether the session is set or not
                {
                    echo $_SESSION['add']; //displaying session message if set
                    unset($_SESSION['add']); //displaying session message

                }
            ?>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>Full Name</td>
                <td>
                    <input type="text" name="full_name" placeholder="Enter Your Name">
                </td>
            </tr>

            <tr>
                <td>Username</td>
                <td> <input type="text" name="username" placeholder="Your Username"></td>
            </tr>

            <tr>
                <td>Password</td>
                <td> <input type="password" name="password" placeholder="Your Password"></td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary"></td>
            </tr>

        </table>

    </form>

    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
    //Process the value from form and save it in Database

    //Check wether the button is clicked or not


    if(isset($_POST['submit']))
    {
        //1. Get the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']) ; //Password Encryption with MD5
    
        //2. SQL Query to save the data into database
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        // echo $sql; // For test if working only
    
        //$conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error()); //Database connection - for test only
        //$db_select = mysqli_select_db($conn, 'food-order') or die(mysqli_error()); //Selecting database - for test only
        
        //3. Execute Query and save data in database

        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //4. Check whether the (query is executed) data is inserted or not and disp appropriate message
        if($res==TRUE)
        {
        //data inserted
        //echo "data inserted";
        //create a variable to display messsage
        $_SESSION['add'] =  "Admin Added Successfully";
        //Redirect Page to manage admin
        header("location:".SITEURL.'admin/manage-admin.php');

        }
        else
        {
        //failed to insert data
        //echo "failed to insert data";
        //create a variable to display messsage
        $_SESSION['add'] =  "Failed to Add Admin ";
        //Redirect Page to add admin 
        header("location:".SITEURL.'admin/manage-admin.php');
        }

        
    }
    


    

?>

