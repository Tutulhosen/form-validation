

<?php

/**
 * message validation
 */

function validate($mgs, $type){
    return "<p class=\"alert alert-{$type}\">{$mgs}<button class=\"close\" data-dismiss=\"alert\">&times;</button></p>";
}


/**
 * email validation
 */

 function emailCheck($email){
     if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
         return true;
     }else{
         return false;
     }

 }

 /**
  * fixed email validation
  */

  function fixedemail(string $email, array $mail){

    $eamil_err= explode('@', $email);
    $last = end($eamil_err);

    if (in_array($last, $mail)) {
        return true;
    } else {
        return false;
    }
    

  }

  /**
   * old data manage
   */

   function old($name){

    if (isset($_POST[$name])) {
        echo $_POST[$name];
    } else {
        echo "";
    }
    

   }

   /**
    * data clear
    */
    function cleardata(){
        $_POST = "";
    }


?>