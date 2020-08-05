<?php   
    if(isset($_POST['submit'])){
        if(isset($_POST['type']) && $_POST['code'] !== '' && $_POST['value'] !== '' && $_POST['cart-min'] !== '' && $_POST['exp-date'] !== ''){
            require "connection.inc.php";
            $code = $_POST['code'];
            $value = $_POST['value'];
            $cart_min = $_POST['cart-min']; 
            $exp_date = $_POST['exp-date']; 
            if($_POST['type'] == 'flat') {
                $type = 'f';
            } else {
                $type = 'p';
            }
            $sql = "SELECT * FROM coupon_code WHERE coupon_code=?";
            $stmt = mysqli_stmt_init($conn);
            $added_on = date('Y-m-d h:i:s');

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../addCouponCode.php?error=sql1error");
                exit();

            } else {
                mysqli_stmt_bind_param($stmt, "s", $code);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                
                if ($resultCheck > 0) {
                    header("Location: ../addCouponCode.php?error=code-already-exists");
                    exit();

                } else {
                    $sql = "INSERT INTO coupon_code (coupon_code, coupon_type, coupon_value, cart_min_value, expired_on, added_on) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../addCouponCode.php?error=sql2error");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "ssssss", $code, $type, $value, $cart_min, $exp_date, $added_on);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../addCouponCode.php?status=successful");
                        exit();
                    }
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        } else {
            header('Location: ../addCouponCode.php?error=empty-fields');
            exit();
        }
    } else {
        header('Location: ../addCouponCode.php');
        exit();
    }
?>