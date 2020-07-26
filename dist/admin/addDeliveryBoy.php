<?php 
include_once "layout/header.php";

if(isset($_GET['error'])) {
    if($_GET['error'] == 'number-already-exists') {
        $msg = 'Category Already Exists';
    }
}

if(isset($_GET['status'])) {
    if($_GET['status'] == 'successful') {
        $msg = "Added Successfully";
    } else {
        $msg = "Some error occurred please try again!";
    }
}
?>



<main class="sm:ml-48 sm:mr-6 mt-4">
    <div class="container bg-white p-5 shadow-lg">
        <p class="text-center text-xl md:text-3xl font-extrabold">Add Delivery Boy</p>
        <a class="underline text-sm text-blue-500" href="deliveryGuy.php">Return To Delivery Management Page</a>
    </div>
    <form class="text-center text-lg mt-3 bg-white shadow-lg" method="post" action="includes/addDeliveryBoy.inc.php">
        <label class="m-3 p-2 text-2xl" for="name">Name</label>
        <input class="m-3 p-2 rounded-md bg-gray-200" type="text" placeholder="Write Name" name="name"><br>
        <label class="m-3 p-2 text-2xl" for="phone">Contact</label>
        <input class="m-3 p-2 rounded-md bg-gray-200" type="text" placeholder="Write Contact Number" name="mobile"><br>
        <label class="m-3 p-2 text-2xl" for="password">Password</label>
        <input class="m-3 p-2 rounded-md bg-gray-200" type="password" placeholder="Write Your Password" name="password"><br>
        <label class="m-3 p-2 text-2xl" for="password">Password Repeat</label>
        <input class="m-3 p-2 rounded-md bg-gray-200" type="password" placeholder="Confirm Your Password Again" name="password-repeat"><br>
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