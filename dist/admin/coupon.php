<?php 
include_once "layout/header.php";

if(isset($_GET['action']) && $_GET['action']!=='' && isset($_GET['id']) && $_GET['id'] > 0){
	$type = $_GET['action'];
	$id = $_GET['id'];
    
    if($type =='delete'){
		mysqli_query($conn,"DELETE FROM coupon_code WHERE id='$id'");
		header('Location: coupon.php');
    }

	if($type =='active' || $type =='deactive'){
		$status = 1;
 		if($type=='deactive'){
			$status = 0;
		}
        mysqli_query($conn,"UPDATE coupon_code SET status='$status' WHERE id='$id'");
        header("Location: coupon.php");
	}
}

$sql = "SELECT * FROM coupon_code ORDER BY id";
$res = mysqli_query($conn, $sql);

?>
<main class="sm:ml-48 mx-3 sm:mr-6 mt-4 relative">
    <div class="bg-white p-5 shadow-lg w-full">
        <p class="text-center text-2xl md:text-3xl font-extrabold m-2">Coupon Code Management</p>
        <div>
            <a class="p-1 sm:p-2 bg-green-400 text-xs sm:text-sm md:text-lg" href="addCouponCode.php">
                <i class="fas fa-plus"></i>
                Add Coupon Code
            </a>
           
        </div>
    </div>
    <div class="mt-4 p-2 shadow-lg table-responsive bg-white">
        <table 
            id="table-main" 
            data-toggle="table"
            data-pagination="true"
            data-search="true"
            class="table text-sm sm:text-lg"
        >
            <thead class="thead-dark">
            <tr class="m-2 p-2 border-b-2 font-bold">
                <th data-sortable="true" data-field="id" class="m-2 p-2">ID</th>
                <th data-sortable="true" data-field="name" class="m-2 p-2">Name</th>
                <th data-sortable="true" data-field="type" class="m-2 p-2">Type</th>
                <th data-sortable="true" data-field="value" class="m-2 p-2">Value</th>
                <th data-sortable="true" data-field="min_value" class="m-2 p-2">Cart Minimum Value</th>
                <th data-sortable="true" data-field="exp_date" class="m-2 p-2">Expiry Date</th>
                <th data-sortable="true" data-field="added_date" class="m-2 p-2">Added On</th>
                <th data-sortable="true" data-field="status" class="m-2 p-2">Status</th>
                <th data-field="action" class="m-2 p-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php 
                $i = 1;
                if(mysqli_num_rows($res) > 0) { 
                    while($row = mysqli_fetch_assoc($res)){
                        if($row['coupon_type'] == 'f') {
                            $coupon_type = 'Flat';
                        } else {
                            $coupon_type = 'Percentage';
                        }
                        
            ?>
            <tr class="leading-9">
                <td class="text-center p-2"><?php echo $i?></td>
                <td class="text-center p-2"><?php echo $row['coupon_code']?></td>
                <td class="text-center p-2"><?php echo $coupon_type?></td>
                <td class="text-center p-2"><?php echo $row['coupon_value']?></td>
                <td class="text-center p-2"><?php echo $row['cart_min_value']?></td>
                <td class="text-center p-2"><?php echo $row['expired_on']?></td>
                <td class="text-center p-2"><?php echo $row['added_on']?></td>
                <td class="text-center p-3">
                    <?php 
                        $status = $row['status'];
                        $row_id = $row['id'];
                        if($status == 1) {
                            ?>
                            <span class="mr-2 p-1 rounded-md bg-green-400 hover:bg-green-500">
                                <a href='?action=deactive&id=<?php echo $row_id?>'>
                                    Active
                                </a>
                            </span>
                        <?php
                        } else {
                            ?>
                            <span class="mr-2 p-1 rounded-md bg-red-500 hover:bg-red-600">
                                <a href='?action=active&id=<?php echo $row_id?>'>
                                    Deactive
                                </a>
                            </span>
                       <?php 
                            }
                       ?>
                    
                </td>
                
                <td class="text-center">
                    <span class="mr-2 p-1 text-red-600 hover:text-red-700">
                        <a href="?id=<?php echo $row['id']?>&action=delete">
                            <i class="fas fa-trash fa-2x"></i>
                        </a>
                    </span>
                </div>        
                </td>
                    
            </tr>
            <?php 
                    $i++;
                    }
                }
                else{ ?>
            
                <td colspan="9" class="text-center">No data found</td>
            <?php
                }
            ?>
            </tbody>
        </table>
    </div>


</main>
<?php 
include_once "layout/footer.php";
?>