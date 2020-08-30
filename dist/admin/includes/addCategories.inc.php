<?php   
    if(isset($_POST['submit'])) {
        if(isset($_POST['name']) && $_POST['name'] !== '') {
            require "connection.inc.php";
            $catName = $_POST['name'];

            $sql = "SELECT * FROM category WHERE category=?";
            $stmt = mysqli_stmt_init($conn);
            $added_on = date('Y-m-d h:i:s');

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../addCategories.php?error=sql1error");
                exit();

            } else {
                mysqli_stmt_bind_param($stmt, "s", $catName);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                
                if ($resultCheck > 0) {
                    header("Location: ../addCategories.php?error=cat-already-exists");
                    exit();

                } else {
                    $img = $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], SERVER_CATEGORY_IMAGE.$_FILES['image']['name']);

                    $sql = "INSERT INTO category (category, image, added_on) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../addCategories.php?error=sql2error");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "ss", $catName, $added_on);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../addCategories.php?status=successful");
                        exit();
                    }
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        } else {
            header('Location: ../addCategories.php?error=empty-fields');
        }
        
    } else {
        header('Location: ../addCategories.php');
        exit();
    }
?>