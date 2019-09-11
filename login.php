<?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username_length=strlen($username);
        $password_length=strlen($password);


        if($username == NULL && $password == NULL) {
            $error_message = "Enter  username or password";
        }
        else{
           
            if($username_length>=5 && $password_length >= 10 && preg_match('/[A-Z]/', $password,)
             && preg_match('/[a-z]/', $password) && preg_match('/[\'^?$%&*()}{@#~?><>,|=_+?-]/', $password) && preg_match('/[0-9]/', $password,){
               header('Location:admin.php');
             }

             else{
                 if($username_length < 5 ){
                   $user_error="Username must be atleast 5 characters ..";
                }
                if($password_length < 10){
                   $password_error="Password must be atleast 10 characters..";
                 }
                 if(preg_match('/^[A-Z]/',$password) or preg_match('/^[a-z]/',$password) or 
                 preg_match('/^[\'^�$%&*()}{@#~?><>,|=_+�-]/', $password) ){

                 $upper_error="At least one uppercase ,one lowercase and one punctuation character required in password . ";
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login_form">
        <h1>Login the account</h1>
        <form method="POST" action="login.php">
            <label>
                username: <input type="text" name="username" placeholder="Enter name here"></br></br>
                <?php if(isset($user_error)): ?>
                <p><?php echo $user_error; ?></p>
                <?php endif; ?>
            </label>
            

            <label>
                password: <input type="password" name="password" placeholder="Enter password here"></br></br>
                <?php if(isset($password_error)): ?>
                <p><?php echo $password_error; ?></p>
                <?php endif; ?>
                <?php if(isset($upper_error)): ?>
                <p><?php echo $upper_error; ?></p>
                <?php endif; ?>

            </label>
            <input type="submit" name="login" value="login">
        </form>
    </div>

    <?php if(isset($error_message)): ?>
    <p><?php echo $error_message; ?></p>
    <?php endif; ?>

   

</body>
</html>