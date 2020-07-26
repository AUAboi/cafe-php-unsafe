<?php 
include_once "layout/header.php";

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id'] > 0){
	$type = mysqli_real_escape_string($conn, $_GET['type']);
	$id = mysqli_real_escape_string($conn, $_GET['id']);

	if($type =='active' || $type =='deactive'){
		$status = 1;
 		if($type=='deactive'){
			$status = 0;
		}
        mysqli_query($conn,"UPDATE user SET status='$status' WHERE id='$id'");
        header("Location: user.php");
	}
}

$sql = "SELECT * FROM user ORDER BY id DESC";
$res = mysqli_query($conn, $sql);

?>
<main class="sm:ml-48 mx-3 sm:mr-6 mt-4 relative">
    <div class="bg-white p-5 shadow-lg w-full">
        <p class="text-center text-2xl md:text-3xl font-extrabold m-2">Users Master</p>
    </div>
    <div class="mt-4 shadow-lg">
        <table  id="table-main" class="table bg-white w-full mt-4 table-fixed sm:text-lg text-xs">
            <thead>
            <tr class="m-2 p-2 border-b-2 font-bold">
                <th class="m-2 p-2">ID</th>
                <th class="m-2 p-2">Name</th>
                <th class="m-2 p-2 sm:right-align">Email</th>
                <th class="m-2 p-2 ">Mobile</th>
                <th class="m-2 p-2 ">Status</th>
            </tr>
            </thead>
            <tbody>
            <?php 
                $i = 1;
                if(mysqli_num_rows($res) > 0) { 
                    while($row = mysqli_fetch_assoc($res)){
                        
            ?>
            <tr class="leading-9">
                <td class="text-center p-2"><?php echo $i?></td>
                <td class="text-center p-2" id="row-name"><?php echo $row['name']?></td>
                <td class="text-center p-2" id="row-name"><?php echo $row['email']?></td>
                <td class="text-center p-2" id="row-name"><?php echo $row['mobile']?></td>
                <td class="text-center p-3">
                    <?php 
                        $status = $row['status'];
                       $row_id = $row['id'];
                        if($status == 1) {
                            ?>
                            <span class='mr-2 p-1 rounded-md bg-green-400'>
                                <a href='?type=deactive&id=<?php echo $row_id?>'>
                                    Active
                                </a>
                            </span>
                        <?php
                        } else {
                            ?>
                            <span class="mr-2 p-1 rounded-md bg-red-600">
                                <a href='?type=active&id=<?php echo $row_id?>'>
                                    Deactive
                                </a>
                            </span>
                       <?php 
                            }
                       ?>
                </td>
            </tr>
            <?php 
                    $i++;
                    }
                }
                else{ ?>
            
                <td colspan="4" class="text-center">No data found</td>
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