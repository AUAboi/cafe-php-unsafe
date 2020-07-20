<?php 
session_start();
include "includes/connection.inc.php";
require_once "login/authCookieSessionValidate.php";

if(!$isLoggedIn) {
    header("Location: login.php?error=notloggedin");
}

$username = $_SESSION['userUId'];
$currentPathString = $_SERVER['REQUEST_URI'];
$currentPathArray = explode('/', $currentPathString);
$currentPath = $currentPathArray[count($currentPathArray) - 1];
$pageTitle = '';

if($currentPath == '' || $currentPath == 'index.php') {
  $pageTitle = 'Dashboard';
} else if($currentPath = 'categories.php' || $currentPath = 'addCategories.php' || $currentPath = 'editCategories.php') {
  $pageTitle = 'Categories Management';
} else if ($currentPath = 'dish.php') {
  $pageTitle = 'Dish Management';
} else if ($currentPath = 'orders.php') {
  $pageTitle = 'Order Master';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style.css" />
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../fonts.css">
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet" href="../global_css/global.css">
    <script
      src="https://kit.fontawesome.com/294f177ac8.js"
      crossorigin="anonymous"
    ></script>
    <title><?php echo $pageTitle ?></title>
  </head>
  <body class="h-full bg-gray-300">
    <header class="flex justify-between bg-orange-200 shadow-lg z-30">
      <div class="burger" onclick="slideIn()">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
      <div>
        <h2 class="text-orange-600 text-3xl font-bold">Cafe Payala</h2>
      </div>
      <div class="flex text-xl my-auto mr-3 cursor-pointer trigger" onclick="showLogout()">
        <h2 class="mr-3 hidden sm:block capitalize"><?php echo $username ?></h2>
        <span>
          <i class="fas fa-caret-down"></i>
        </span>
        <form action="logout.php" method="post" class="flex bg-gray-200 absolute mt-12 right-5 z-10 hidden log-out px-4 py-2">
          <i class="fas fa-power-off mt-2 mr-3 text-sm py-2"></i>
          <button type="submit" class="text-sm py-2">Logout</a>
        </form>
      </div>
    </header>
    <nav class="h-screen p-0 w-screen text-center sm:w-40 nav-bar bg-orange-200 shadow-xl shadow-inner" >
      <a
        class="block text-lg text-orange-700 mt-6 mb-3 p-2 mx-auto hover:bg-orange-700 hover:text-orange-200 <?php if($pageTitle == "Dashboard"){ echo "active-page";} ?>"
        href="index.php"
        >Dashboard</a
      >
      <a
        class="block text-lg text-orange-700 mt-6 mb-3 p-2 mx-auto hover:bg-orange-700 hover:text-orange-200  <?php if($pageTitle == "Categories Management"){ echo "active-page";} ?>"
        href="categories.php"
        >Catagories</a
      >
      <a
        class="block text-lg text-orange-700 mt-6 mb-3 p-2 mx-auto hover:bg-orange-700 hover:text-orange-200 <?php if($pageTitle == "Dish Management"){ echo "active-page";} ?>"
        href="products.php"
        >Products</a
      >
      <a
        class="block text-lg text-orange-700 mt-6 mb-3 p-2 mx-auto hover:bg-orange-700 hover:text-orange-200 <?php if($pageTitle == "Order Master"){ echo "active-page";} ?>"
        href="orders.php"
        >Order Master</a
      >
    </nav>
