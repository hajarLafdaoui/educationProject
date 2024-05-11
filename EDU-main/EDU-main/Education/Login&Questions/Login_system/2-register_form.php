<?php
session_start();  

@include '1-config.php';

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $user_type = $_POST['user_type']; 


    if($pass != $cpass){
        $error[] = 'Passwords do not match!';
    } else {
        try {
            $select_query = "SELECT * FROM user_form WHERE email = :email";
            $stmt = $conn->prepare($select_query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $error[] = 'User already exists!';
                
            } else {
                // Hash the password using password_hash() function
                $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

                // Insert new user into database
                $insert_query = "INSERT INTO user_form(name, email, password, user_type) VALUES(:name, :email, :password, :user_type)";
                $stmt = $conn->prepare($insert_query);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->bindParam(':user_type', $user_type);
                // After successful registration insert
                if($stmt->execute()) {
                    // $_SESSION['user_name'] = $name;  // Store the name in session
                    header('location: 3-login_form.php');
                    exit;
                } else {
                    $error[] = 'Error inserting user data!';
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>

    <style>
        /* register_form.php, login_form.php */
        .form-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        padding-bottom: 60px;
        background: #eee;
        }

        .form-container form {
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        background: #fff;
        text-align: center;
        width: 500px;
        }

        .form-container form h3 {
        font-size: 30px;
        text-transform: uppercase;
        margin-bottom: 10px;
        color: #333;
        }

        .form-container form input,
        .form-container form select {
        
        padding: 10px 15px;
        font-size: 17px;
        margin: 8px 0;
        background: #eee;
        border-radius: 5px;
        border:none;
        }
        .form-container form input{
            width: 90%;
        }
        .form-container form select{
            width: 96%;
        }

        .form-container form select option {
        background: #fff;
        }

        .form-container form .form-btn {
        color: #000 !important;
        text-transform: capitalize;
        font-size: 20px;
        cursor: pointer;
        padding: 10px 25px;
        width :95%;
        }

        .form-container form .form-btn:hover {
        background: #25aae1 !important;
        color: #fff;
        }

        .form-container form p {
        margin-top: 10px;
        font-size: 20px;
        color: #333;
        }

        .form-container form p a {
        color: #25aae1 !important;
        }

        .form-container form .error-msg {
        margin: 10px 0;
        display: block;
        background: #25aae1 !important;
        color: #fff;
        border-radius: 5px;
        font-size: 20px;
        padding: 10px;
        }
    </style>

    </head>
    <body>

    <div class="form-container">

        <form action="" method="post">
            <h3>register now</h3>
            
            <?php
            // if(isset($error)){
            //     foreach($error as $error){
            //         echo '<span class="error-msg">'.$error.'</span>';
            //     };
            // };
            ?>
            
            <input type="text" name="name" required placeholder="enter your name">
            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="password" name="cpassword" required placeholder="confirm your password">
            <select name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>already have an account? <a href="3-login_form.php">login now</a></p>
        </form>
    </div>
    

</body>
</html>
