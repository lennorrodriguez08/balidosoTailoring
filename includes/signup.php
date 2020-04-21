<?php

if (isset($_POST['submit_signup'])) 
{
    require 'handler.php';

    $username = $_POST['reg-username'];
    $password = $_POST['reg-password'];
    $user_level = $_POST['user-level'];

    if (empty($username) || empty($password) || empty($user_level)) {
        header('Location: ../register?error=emptyfields&username='.$username);
        exit();
    }

    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../register?error=invalidusername");
        exit();
    }
    else {
        $sql = "SELECT username FROM users WHERE username=?;";
        $stmt = mysqli_stmt_init($connection);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register?error=sqlerror");
            exit();
        }
        else {

            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../register?error=usernametaken");
                exit();
            }
            else {
                $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($connection);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../register?error=sqlerror");
                    exit();
                }
                else {
                    $hash = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $hash, $user_level);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup-thanks?signup=success");
                    exit();
                }
            }
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}

else {
    header("Location: ../register?error=nosql1");
    exit();
}