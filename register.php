<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Registration Form</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="container">
        <div class="main-header">
            <div class="logo">
                <img src="img/logo.png" alt="">
            </div>
            <div class="logo-text">
                <p>Tailoring Management System</p>
            </div>
        </div>
    </div>
    <div class="form-container">
        <p class="login-text">Create An Account</p>
        <form action="includes/signup.php" method="post">
            <input type="text" class="input-1" placeholder="Username" name="reg-username">
            <input type="password" placeholder="Password" name="reg-password">
            <select name="user-level" id="">
                <option value="">Select User Type</option>
                <option value="admin">Admin</option>
                <option value="cashier">Cashier</option>
            </select>
            <button type="submit" name="submit_signup">Register</button>
            <a href="index">Back To Login Page</a>
        </form>
    </div>
</body>
</html>