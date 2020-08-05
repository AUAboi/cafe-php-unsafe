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

$sql = "SELECT * FROM user";
$res = mysqli_query($conn, $sql);

?>
<main class="sm:ml-48 mx-3 sm:mr-6 mt-4 relative">
    <div class="bg-white p-5 shadow-lg w-full">
        <p class="text-center text-2xl md:text-3xl font-extrabold m-2">Users Master</p>
    </div>
    <div class="mt-4 shadow-lg bg-white table-responsive p-2">
        <table 
            id="table-main" 
            data-toggle="table"
            data-pagination="true"
            data-search="true"
            class="table text-sm sm:text-lg"
        >
            <thead class="thead-dark">
                <tr>
                    <th data-sortable="true" data-field="id">ID</th>
                    <th data-sortable="true" data-field="name">Name</th>
                    <th data-field="email">Email</th>
                    <th data-field="mobile">Mobile</th>
                    <th data-sortable="true" data-field="status">Status</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $i = 1;
                if(mysqli_num_rows($res) > 0) { 
                    while($row = mysqli_fetch_assoc($res)){
                        
            ?>
            <tr class="leading-9">
                <td><?php echo $row['id']?></td>
                <td id="row-name"><?php echo $row['name']?></td>
                <td id="row-name"><?php echo $row['email']?></td>
                <td id="row-name"><?php echo $row['mobile']?></td>
                <td>
                    <?php 
                        $status = $row['status'];
                       $row_id = $row['id'];
                        if($status == 1) {
                            ?>
                            <span class='mr-2 p-1 rounded-md bg-green-400 hover:bg-green-500'>
                                <a href='?type=deactive&id=<?php echo $row_id?>'>
                                    Active
                                </a>
                            </span>
                        <?php
                        } else {
                            ?>
                            <span class="mr-2 p-1 rounded-md bg-red-400 hover:bg-red-500">
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