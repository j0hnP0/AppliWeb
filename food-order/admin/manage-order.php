<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">   
    <h1>Manage Order</h1>
    
    <br/><br/><br/>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Qty.</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>

                <?php
                    //Get all orders from database
                    $sql = "SELECT * FROM tbl_order";
                    //Execute Query
                    $res = mysqli_query($conn, $sql);
                    //Count the rows
                    $count = mysqli_num_rows($res);
                    

                    if($count>0)
                    {
                        //Order Available
                        while($row=mysqli_fetch_assoc($res))
                        {
                        //Get all order details
                        $id = $row['id'];
                        $food = $row['food'];
                        $price = $row['price'];
                        $qty = $row['qty]'];
                        $total = $row['total'];
                        $order_date = $row['order_date'];
                        $status = $row['status'];
                        $customer_name = $row['customer_name'];
                        $customer_contact = $row['customer_contact'];
                        $customer_email = $row['customer_email'];
                        $customer_address = $row['customer_address'];
                        
                        ?>
                    <tr>
                     <td>1</td>
                     <td>Jonathan Pottier</td>
                     <td>J0hn</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td>
                     <a href="#" class="btn-secondary">Update Order</a>
                    </td>
                 </tr>

                        <?php




                       }
                    }
                    else
                    {
                        //Order not available
                        echo "<tr><td colspan='12' class='error' >Orders not Available</td></tr>"; 
                    }

                    ?>
                      


                 
 
                
        </table>

    </div>
</div>

<?php include('partials/footer.php'); ?>
