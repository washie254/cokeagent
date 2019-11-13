<?php 
    $phone = "0718610463";
    if (validate_phone_number($phone) !=true) {
      
      echo "Invalid phone number";
    }


    function validate_phone_number($phone)
    {
        // Allow +, - and . in phone number
        $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        // Remove "-" from number
        $phone_to_check = str_replace("-", "", $filtered_phone_number);
        // Check the lenght of number
        // This can be customized if you want phone number from a specific country
        if (strlen($phone_to_check) < 9 || strlen($phone_to_check) > 14) {
        return false;
        } else {
        return true;
        }
    }
    
?>