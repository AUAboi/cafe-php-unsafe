<?php 
include_once "layout/header.php";
$error = false;
if(isset($_GET['error'])) {
    $error = true;
    if($_GET['error'] == 'empty-fields') {
        $msg = 'Please fill all fields';
    } else if($_GET['error'] == 'number-already-exists') {
        $msg = 'Phone Number Already Exists';
    } else if ($_GET['error'] == 'invalid-number') {
        $msg = 'Please enter a valid number';
    } else if ($_GET['error'] == 'pwd-confirmation') {
        $msg = 'Password Repeat is Wrong';
    } else if ($_GET['error'] == 'pwd-short') {
        $msg = 'Password is too short';
    } else if ($_GET['error'] == 'pwd-easy') {
        $msg = 'Password should contain atleast one letter and a number';
    } else {
        $msg = 'Some error occurred, please try again later';
    }
}

if(isset($_GET['status'])) {
    if($_GET['status'] == 'success') {
        $error = false;
        $msg = "Added Successfully";
    } else {
        $error = true;
        $msg = "Some error occurred please try again!";
    }
}
?>



<main class="sm:ml-48 sm:mr-6 mt-4">
    <div class="container bg-white p-5 shadow-lg">
        <p class="text-center text-xl md:text-3xl font-extrabold">Add Delivery Boy</p>
        <a class="underline text-sm text-blue-500" href="deliveryGuy.php">Return To Delivery Management Page</a>
    </div>
    <div class="bg-white mt-3 shadow-lg">
        <form class="text-lg" method="post" action="includes/addDeliveryBoy.inc.php">
            <label class="m-3 p-2" for="name">Name</label>
            <input class="m-3 p-2 rounded-md bg-gray-200" autocomplete="off" type="text" placeholder="Write Name" name="name"><br>
            <label class="m-3 p-2" for="phone">Contact</label>
            <input class="m-3 p-2 rounded-md bg-gray-200" autocomplete="off" type="text" placeholder="Write Contact Number" name="mobile"><br>
            <label class="m-3 p-2" for="password">Password</label>
            <input class="m-3 p-2 rounded-md bg-gray-200" type="password" placeholder="Write Your Password" name="password"><br>
            <label class="m-3 p-2" for="password">Password Repeat</label>
            <input class="m-3 p-2 rounded-md bg-gray-200" type="password" placeholder="Confirm Your Password Again" name="password-repeat"><br>
            <input class="m-3 p-2 cursor-pointer bg-orange-400 rounded-md" type="submit" name="submit">
            <div class="p-2 font-bold <?php if($error){ echo "text-red-600"; } else{ echo "text-green-600"; } ?>">
                <?php if(isset($msg)){
                    echo $msg;
                }
                ?>
            </div>
        </form>
    </div>

</main>
<?php 
include_once "layout/footer.php";
?>