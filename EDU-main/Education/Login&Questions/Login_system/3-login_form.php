<?php
@include '1-config.php';

session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password']; 

    try {
        $select_query = "SELECT * FROM user_form WHERE email = :email";
        $stmt = $conn->prepare($select_query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // return true if the two password match
            if (password_verify($pass, $row['password'])) {
                if ($row['user_type'] == 'admin') {
                    $_SESSION['admin_name'] = $row['name'];
                    header('location: http://localhost/EDU-main/EDU-main/Education/Login&Questions/Login_system/4-admin_page.php');
                    exit;
                } elseif ($row['user_type'] == 'user') {
                    $_SESSION['user_name'] = $row['name'];
                    header('location: http://localhost/EDU-main/EDU-main/Education/Login&Questions/Login_system/5-user_page.php');
                    exit;
                }
            } else {
                $error[] = 'Incorrect email or password.'; //If the password verification fails
            }
        } else {
            $error[] = 'User not found.';  //If the user is not found in the database
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>

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
        width: 90%;
        padding: 10px 15px;
        font-size: 17px;
        margin: 8px 0;
        background: #eee;
        border-radius: 5px;
        border: none;
        }

        .form-container form select option {
        background: #fff;
        }

        .form-container form .form-btn {
        color: #000 !important;
        text-transform: capitalize;
        font-size: 20px;
        cursor: pointer;
        width:95% ;
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
            <h3>login now</h3>

            <?php
            // if (isset($error)) {
            //     foreach ($error as $error) {
            //         echo '<span class="error-msg">'.$error.'</span>';
            //     }
            // }
            ?> 

            <input type="email" name="email" required placeholder="enter your email">
            <input type="password" name="password" required placeholder="enter your password">
            <input type="submit" name="submit" value="login now" class="form-btn">
            <p>don't have an account? <a href="2-register_form.php">register now</a></p>
            <div class="input-container">
        </form>
    </div>

</body>
</html>
