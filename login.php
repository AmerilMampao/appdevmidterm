<?php

$email = $password = "";
$emailErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
    }

    if ($email && $password) {
        include("conn.php");

        $check_email = mysqli_query($conn, "SELECT * FROM admintable WHERE email='$email'");
        $check_email_row = mysqli_num_rows($check_email);

        if ($check_email_row > 0) {
            while ($row = mysqli_fetch_assoc($check_email)) {
                
                $user_id = $row["id"];

                $db_password = $row["password"];
                $db_account_type = $row["account_type"];

                if ($password == $db_password) {

                    session_start();

                    $_SESSION["id"] = $user_id;

                    if ($db_account_type == "1") {
                        echo "<script>window.location.href='index.php';</script>";
                    } else {
                        echo "<script>window.location.href='user';</script>";
                    }
                } else {
                    $passwordErr = "Password is incorrect";
                }
            }
        } else {
            $emailErr = "Email is not registered";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            background-color: #1f1f1f;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            margin-bottom: 20px;
            color: #ffffff;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #444;
            background-color: #333;
            color: #fff;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        /* Responsive Styles */
        @media screen and (max-width: 600px) {
            .container {
                width: 90%;
                padding: 20px;
            }

            h2 {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Enter your email"> <br>
            <span class="error"><?php echo $emailErr; ?></span> <br>

            <input type="password" name="password" value="" placeholder="Enter your password"> <br>
            <span class="error"><?php echo $passwordErr; ?></span> <br>

            <input type="submit" value="Login">

        </form>
    </div>

</body>
</html>
