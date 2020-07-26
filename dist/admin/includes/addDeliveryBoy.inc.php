<?php   
    if(isset($_POST['submit']) && $_POST['name'] !== '') {
        require "connection.inc.php";
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['password-repeat'];

        if (empty($name) || empty($mobile) || empty($password) || empty($passwordRepeat)) {
            header("Location: ../addDeliveryBoy.php?error=emptyFields");
            exit();
        } else if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
            header("Location: ../addDeliveryBoy.php?error=invalidName");
            exit();
        } else if ($password !== $passwordRepeat) {
            header("Location: ../addDeliveryBoy.php?error=passwordCheck");
            exit();
        } else {
            $sql = "SELECT mobile FROM delivery_boy WHERE mobile=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../addDeliveryBoy.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "d", $mobile);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0) {
                    header("Location: ../addDeliveryBoy.php?error=alreadyExists");
                    exit();
                } else {
                    $sql = "INSERT INTO delivery_boy (name, mobile, password) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../addDeliveryBoy.php?error=sqlerror");
                        exit();
                    } else {
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "sss", $name, $mobile, $hashedPwd);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../addDeliveryBoy.php?status=success");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        header('Location: ../addDeliveryBoy.php');
        exit();
    }
?>