<?php 
include_once "layout/header.php";


if(isset($_GET['action']) && isset($_GET['id']) && $_GET['id'] > 0) {
    $showPrompt = true;
    $id = $_GET['id'];
    $sql = "SELECT category FROM category WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $rowResult = mysqli_fetch_assoc($result);
    $catName = $rowResult['category'];
}

if(isset($_GET['type']) && $_GET['type']!=='' && isset($_GET['id']) && $_GET['id'] > 0){
	$type = $_GET['type'];
	$id = $_GET['id'];
    
    if($type =='delete'){
		mysqli_query($conn,"DELETE FROM category WHERE id='$id'");
		header('Location:categories.php');
    }

	if($type =='active' || $type =='deactive'){
		$status = 1;
 		if($type=='deactive'){
			$status = 0;
		}
        mysqli_query($conn,"UPDATE category SET status='$status' WHERE id='$id'");
        header("Location: categories.php");
	}
}

$sql = "SELECT * FROM category ORDER BY id";
$res = mysqli_query($conn, $sql);

?>
<main class="sm:ml-48 mx-3 sm:mr-6 mt-4 relative">
    <div class="container bg-white p-5 shadow-lg">
        <p class="text-center text-2xl md:text-3xl font-extrabold m-2">Categories</p>
        <div>
            <a class="p-1 sm:p-2 bg-green-400 text-xs sm:text-sm md:text-lg" href="addCategories.php">
                <i class="fas fa-plus"></i>
                Add Categories
            </a>
        </div>
    </div>
    <div class="mt-4 shadow-lg">
    <?php
        if(isset($showPrompt)) {
            if($showPrompt) {
            ?>
            <div class="text-center absolute bg-gray-300 modal-box m-auto tracking-wider p-2 shadow-lg">
                <p>Do you really want to delete <span class="font-bold"><?php echo $catName;?></span> category?</p>
                <div class="text-center p-1">
                    <span class="text-green-600 p-2 m-4 font-bold">
                        <a href="?id=<?php echo $id?>&type=delete">Confirm</a>
                    </span>
                    <span class="text-red-600 p-2 m-4 font-bold">
                        <a href="categories.php">Deny</a>
                    </span>
                </div>
            </div>
            <?php
            }
        }
    ?>
        <table class="table bg-white w-full p-3">

            <thead>
            <tr class="m-2 p-2 border-b-2">
                <th width="10%" class="m-2 p-2">ID</th>
                <th width="50%" class="m-2 p-2">Categories</th>
                <th width="10%" class="m-2 p-2 right-align">Status</th>
                <th width="30%" class="m-2 p-2 ">Actions</th>
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
                <td class="text-center p-2"><?php echo $row['category']?></td>
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
                
                <td class="text-center">
                    <span class="mr-2 p-1 rounded-md bg-yellow-400">
                        <a href='editCategories.php?id=<?php echo $row['id']?>&&catname=<?php echo $row['category'] ?>'>Edit</a>
                    </span>
                    <span class="mr-2 p-1 rounded-md bg-red-400">
                        <a href="?id=<?php echo $row['id']?>&action=delete">Delete</a>
                    </span>
                </div>        
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