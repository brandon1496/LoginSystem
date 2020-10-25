<?php 
    session_start();
    if($_POST["Submit"]){
        require "Private/config.php";
        $Errmsg = "";
        $Username = $_POST["Username"];
        $Password = $_POST["Password"];
        $sql = "SELECT * FROM User WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo "You messed up";

        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $Username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)){
                $pwdcheck = password_verify($Password, $row['password']);
                if ($pwdcheck == true)
                {
                    
                    $_SESSION["userid"] = $row["id"];
                    $_SESSION["Username"] = $row["username"];
                    header("location: index.php");
                }
                else {
                    $Errmsg = "Wrong Password";
                }
            
                 }
            else {
                    $Errmsg = "Wrong Password";
                }
        }
    }

?>