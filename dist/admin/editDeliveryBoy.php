<?php 
include_once "layout/header.php";
if(isset($_GET['id']) && $_GET['id'] !== '' && $_GET['id'] > 0) {
    $id = $_GET['id'];

    if(isset($_GET['name'])){
        $name = $_GET['name'];
    }

    if(isset($_GET['contact'])){
        $mobile = $_GET['contact'];
    }

} else {
    header("Location: deliveryGuy.php");
    exit();
}

?>
<main class="sm:ml-48 sm:mr-6 mt-4">
    <div class="container bg-white p-5 shadow-lg">
        <p class="text-center text-xl md:text-3xl font-extrabold">Edit Details</p>
        <a class="underline text-sm text-blue-500" href="deliveryGuy.php">Return To Delivery Boy Management Page</a>
    </div>
    <form class="text-center text-lg mt-3 bg-white shadow-lg" method="post" action="includes/editDeliveryBoy.inc.php">
        <label class="m-3 p-2 text-2xl" for="name">Name</label><br>
        <input class="m-3 p-2 rounded-md bg-gray-200" type="text" value="<?php if(isset($name)){ echo $name ;}?>" placeholder="Write Name" name="name"><br>
        <label class="m-3 p-2 text-2xl" for="contact">Contact</label><br>
        <input class="m-3 p-2 rounded-md bg-gray-200" type="text" value="<?php if(isset($mobile)){ echo $mobile ;}?>" placeholder="Write Contact Number" name="mobile"><br>
        <input type = "hidden" name = "id" value = "<?php if(isset($id)){ echo $id ;}?>"/>
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