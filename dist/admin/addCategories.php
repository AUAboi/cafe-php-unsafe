<?php 
include_once "layout/header.php";

if(isset($_GET['error'])) {
    if($_GET['error'] == 'catalreadyexists') {
        $msg = 'Category Already Exists';
    }
}

if(isset($_GET['status'])) {
    if($_GET['status'] == 'successfull') {
        $msg = "Category Added Successfully";
    } else {
        $msg = "Some error occured please try again!";
    }
}
?>



<main class="sm:ml-48 sm:mr-6 mt-4">
    <div class="container bg-white p-5 shadow-lg">
        <p class="text-center text-xl md:text-3xl font-extrabold">Add Categories</p>
        <a class="underline text-sm text-blue-500" href="categories.php">Return To Category Page</a>
    </div>
    <form class="text-center text-lg mt-3 bg-white shadow-lg" method="post" action="includes/addCategories.inc.php">
        <label class="m-3 p-2 text-2xl" for="name">Category Name</label><br>
        <input class="m-3 p-2 rounded-md bg-gray-200" type="text" placeholder="Write Name for Category" name="name"><br>
        <input class="m-3 p-2 cursor-pointer bg-orange-400 rounded-md" type="submit" name="submit">
        <div class="p-2">
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