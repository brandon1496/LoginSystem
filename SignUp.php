<?php include "Templates/header.php"; 
    if(isset($_POST["Submit"]))
    {   
        require "Private/config.php";
        $FirstnameErr = $LastnameErr = $UsernameErr = $EmailErr = $PassErr = "";
        $Firstname = $_POST["FirstName"];
        $Lastname = $_POST["LastName"];
        $Username = $_POST["Username"];
        $Email = $_POST["Email"];
        $Password = $_POST["Password"];
        if (!preg_match('/[A-Za-z]/', $Firstname)){
            $FirstnameErr = "Invalid FirstName";
        }
        else if (!preg_match('/[A-Za-z]/', $Lastname)){
            $LastnameErr = "Invalid LastName";
        }
        else if (!preg_match('/[a-zA-Z0-9]/', $Username)){
            $UsernameErr = "Invalid Username";
        }
        else if (!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            $EmailErr = "Invalid Email";
        }
        else if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $Password)){
            // at least one lowercase char
            //  at least one uppercase char
            // at least one digit
             //at least one special sign of @#-_$%^&+=§!?
            $PassErr = "Invalid Password";
        }
        else {
            $sql = "SELECT username FROM User WHERE username=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo "You messed up";
                }
            else{
                mysqli_stmt_bind_param($stmt, "s", $Username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $result = mysqli_stmt_num_rows($stmt);
                if ($result > 0 )
                {
                $UsernameErr = "Username is taken";
                 }
                else {
                    $sql = "INSERT INTO User (firstname, lastname, username, email, password) VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql))
                        {
                        echo "You messed up";
                        }
                    else {
                            $hashedpwd = password_hash($Password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "sssss", $Firstname, $Lastname, $Username, $Email, $hashedpwd);
                            mysqli_stmt_execute($stmt);
                            session_start();
                            $_SESSION["Username"] = $Username;
                            header("location: Index.php");
                        }

                   }
                }
            }
    }
        ?>
<body>
<?php include "Templates/nav.php"; ?>
<div class="Signup">
    
    <form action="SignUp.php" method="POST">
    <h1>Sign Up</h1>
        <input name="FirstName" pattern=".{3,10}" required title="3 to 10 characters" type="Text" placeholder="FirstName"><span> <?php echo $FirstnameErr;  ?></span>
        <input name="LastName" pattern=".{3,10}" required title="3 to 10 characters"type="Text" placeholder="LastName"><span> <?php echo $LastnameErr;  ?></span>
        <input name="Email"pattern=".{7,40}" required title="7 to 40 characters"  type="email" placeholder="Email"><span> <?php echo $EmailErr;  ?></span>
        <input name="Username" pattern=".{6,12}" required title="6 to 12 characters" type="Text" placeholder="Username"><span> <?php echo $UsernameErr;  ?></span>
        <input name="Password" pattern=".{7, 15}" required title="7 to 15 characters"  type="password" placeholder="Password"><span> <?php echo $PassErr;  ?></span>
        <a class="Button" href="Login.php">Already Have A account click here</a>
        <input type="submit" name="Submit">
    </form>
</div>
</body>
</html>