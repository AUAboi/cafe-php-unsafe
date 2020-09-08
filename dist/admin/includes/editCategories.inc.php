<?php 

    if(isset($_POST['submit']) && $_POST['name'] !== '') {
        include "connection.inc.php";
        include "constant.inc.php";
        $catName = $_POST['name'];
        $catId = $_POST['id'];

        $sql = "SELECT * FROM category WHERE category=? AND id!=?";
        $stmt = mysqli_stmt_init($conn);
       

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../categories.php?error=sql1error");
            exit();

        } else {
            mysqli_stmt_bind_param($stmt, "ss", $catName, $catId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if ($resultCheck > 0) {
                header("Location: ../categories.php?error=catalreadyexists");
                exit();

            } else {
                if($_FILES['image']['name'] != '') {
                    $type = $_FILES['image']['type'];
                    if($type != 'image/jpeg' && $type != 'image/png'){
                        header('Location: ../categories.php?error=invalid-file-format');
                        exit();
                    } else {
                        $img = rand(111111111, 999999999).'_'.$_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'], SERVER_CATEGORY_IMAGE.$img);
                        $oldImgRow = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image FROM category WHERE id='$catId'"));
                        $oldImg = $oldImgRow['image'];
                        
                        if(!empty($oldImg) && is_string($oldImg)){
                            unlink(SERVER_CATEGORY_IMAGE.$oldImg);
                        }
                        $sql = "UPDATE category SET category=?, image=? WHERE id=?";
                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location: ../categories.php?error=sql2error");
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, "sss", $catName, $img, $catId);
                            mysqli_stmt_execute($stmt);
                            header("Location: ../categories.php?status=successful");
                            exit();
                        }
                    }
                } else {
                    $sql = "UPDATE category SET category=? WHERE id=?";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../categories.php?error=sql2error");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "ss", $catName, $catId);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../categories.php?status=successful");
                        exit();
                    }
                }
            }
        }
    } else {
        header('Location: ../categories.php');
    }

?>