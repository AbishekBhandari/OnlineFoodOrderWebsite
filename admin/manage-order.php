<?php 
include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <?php 
        
        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        
        
        ?>
        <h2>Manage Order</h2>
        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Food</th>
                <th>Price</th>
                <th>Quantity</th>
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

            $sql = "SELECT * FROM tbl_order";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            $sn=1;
            if($count>0){
                    while($row = mysqli_fetch_assoc($res)){
                        ?>
                <tr>
                    <td><?php echo $sn; ?></td>
                    <td><?php echo $row['food'] ?></td>
                    <td>Rs.<?php echo $row['price'] ?></td>
                    <td><?php echo $row['qty'] ?></td>
                    <td>Rs.<?php echo $row['total'] ?></td>
                    <td><?php echo $row['order_date'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><?php echo $row['customer_name'] ?></td>
                    <td><?php echo $row['customer_contact'] ?></td>
                    <td><?php echo $row['customer_email'] ?></td>
                    <td><?php echo $row['customer_address'] ?></td>
                    <td>
                        <a href="<?php SITEURL ?>update-order.php?id=<?php echo $row['id']?>" class="btn-primary">UpdateOrder</a>
                    </td>
                </tr>


                        <?php
                        $sn++;
                    }

            }
            else{
                echo "NO records";
            }    
            ?>
        </table>
    </div>
</div>

<?php 
include('partials/footer.php');
; ?>