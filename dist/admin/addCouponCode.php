<?php 
include_once "layout/header.php";

$isError = false;

if(isset($_GET['error'])) {
    $isError = true;
    if($_GET['error'] == 'code-already-exists') {
        $msg = 'Code Already Exists';
    } else if ($_GET['error'] == 'empty-fields') {
        $msg = 'Fill All Fields!';
    }
}

if(isset($_GET['status'])) {
    if($_GET['status'] == 'successful') {
        $msg = "Added Successfully";
        $isError = false;
    } else {
        $msg = "Some error occurred please try again!";
        $isError = true;
    }
}
?>



<main class="sm:ml-48 sm:mr-6 mt-4">
    <div class="container bg-white p-5 shadow-lg">
        <p class="text-center text-xl md:text-3xl font-extrabold">Add Coupon Code</p>
        <a class="underline text-sm text-blue-500" href="coupon.php">Return To Coupon Code Management Page</a>
    </div>
    <form class="text-center text-lg mt-3 bg-white shadow-lg" method="post" action="includes/addCouponCode.inc.php">
        <label class="m-3 p-2 text-2xl" for="code">Code</label>
        <input class="m-3 p-2 rounded-md bg-gray-200" type="text" placeholder="Write Coupon Code" name="code"><br>
        <div>
            <label class="m-3 p-2 text-2xl" for="type">Code Type</label><br>
            <input class="m-3 p-2 rounded-md bg-gray-200" type="radio" name="type" value="flat" checked>
            <label class="m-2 text-xl" for="type">Flat</label>
            <input class="m-3 p-2 rounded-md bg-gray-200" type="radio" name="type" value="percentage">
            <label class="m-2 text-xl" for="type">Percentage</label>
        </div>
        <label class="m-3 p-2 text-2xl" for="value">Value</label>
        <input class="m-3 p-2 rounded-md bg-gray-200" type="text" placeholder="Write Code Value" name="value"><br>
        <label class="m-3 p-2 text-2xl" for="cart-min">Cart Minimum Value</label>
        <input class="m-3 p-2 rounded-md bg-gray-200" type="text" placeholder="Type Minimum Cart Value" name="cart-min"><br>
        <label class="m-3 p-2 text-2xl" for="expiry">Expiration Date</label>
        <input class="m-3 p-2 rounded-md bg-gray-200" type="date" placeholder="Write Expiry Date" name="exp-date"><br>
    
        <input class="m-3 p-2 cursor-pointer bg-orange-400 rounded-md" type="submit" name="submit">
        <div class="p-2 <?php if($isError){ echo 'text-red-400';} else { echo 'text-green-400' ;} ?>">
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