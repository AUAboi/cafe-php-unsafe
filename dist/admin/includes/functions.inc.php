<?php 
    function validate_password($len, $pwd) {
        if(strlen($pwd) < $len && !preg_match('/[A-Za-z]/', $pwd) && !preg_match('/[0-9]/', $pwd)) {
            return true;
        } else {
            return false;
        }
    }
