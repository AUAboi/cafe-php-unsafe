<?php 
include_once "layout/header.php";
include_once "includes/constant.inc.php";
include "includes/connection.inc.php";
$error = false;

if(isset($_GET['id']) && isset($_GET['catName'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
	$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM dish WHERE id='$id'"));
    $catName = $_GET['catName'];
    $catId = $row['category_id'];
	$dishName = $row['dish'];
	$dishDetail = $row['dish_detail'];
	

} else {
    header('Location: dish.php?notDefined');
}
if(isset($_GET['error'])) {
    $error = true;
    if($_GET['error'] == 'dish-already-exists') {
        $msg = 'Dish Already Exists';
    } else if($_GET['error'] == 'empty-fields') {
        $msg = "Please Fill all Fields";
    }

}

if(isset($_GET['status'])) {
    if($_GET['status'] == 'successful') {
        $msg = "Edited Successfully";
    } else {
        $msg = "Some error occurred please try again!";
    }
}

$categories = mysqli_query($conn, "SELECT * FROM category WHERE status='1' ORDER BY category ");
?>



<main class="sm:ml-48 sm:mr-6 mt-4">
    <div class="container bg-white p-5 shadow-lg">
        <p class="text-center text-xl md:text-3xl font-extrabold">Add Dish Item</p>
        <a class="underline text-sm text-blue-500" href="dish.php">Return To Dish Management Page</a>
    </div>
    <form class="container text-center text-lg mt-3 bg-white shadow-lg" method="post" action="includes/editDish.inc.php" enctype="multipart/form-data">
        <label class="m-3 p-2 text-2xl" for="name">Dish Name</label>
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input class="m-3 p-2 rounded-md bg-gray-200" type="text" value="<?php echo $dishName ?>" placeholder="Write Dish Name" name="name">
        <div>
            <label class="m-3 p-2 text-2xl" for="Category">Category</label>
            <select name="category">
                <option>Select Category</option>
                <?php 
                    while($row_category = mysqli_fetch_assoc($categories)) {
                        if($row_category['id'] == $catId) {
                            echo "<option value='".$row_category['id']."' selected>".$row_category['category']."</option>";
                        } else {
                            echo "<option value='".$row_category['id']."'>".$row_category['category']."</option>";
                        }
                        
                    }
                ?>
            </select>
        </div>
        <label class="m-3 p-2 text-2xl" for="image">Dish Image</label>
        <input class="m-3 p-2 rounded-md bg-gray-200" type="file" placeholder="Dish Image" name="image"><br>
        <label class="m-3 p-2 text-2xl" for="name">Dish Details</label><br>
        <textarea class="m-3 p-2 rounded-md bg-gray-200 resize-none" type="text" placeholder="Write Dish Details" name="details"><?php echo $dishDetail ?></textarea><br>
        <input class="m-3 p-2 cursor-pointer bg-orange-400 hover:bg-orange-500 rounded-md" type="submit" name="submit">
        <div class="p-2 font-bold <?php if($error){ echo "text-red-600"; } else{ echo "text-green-600"; } ?>">
            <?php if(isset($msg)){
                echo $msg;
                
            }
            ?>
        </div>
    </form>
</main>
<?php 
include_once "layout/footer.php";
?>