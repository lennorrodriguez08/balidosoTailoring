<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Balidoso Tailoring | Registration</title>
<link rel="stylesheet" href="css/main.css">
</head>

<style>
body {
    overflow: hidden;
}

#particles-js {
    background: #ffffff;
    
}

.main-container {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
}
</style>

<body>

<div id="particles-js">
    <div class="main-container">
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
        <form action="includes/signup.php" method="post" autocomplete="off">
            <input type="text" class="input-1 uniquee" placeholder="Username" name="reg-username">
            <input type="password" placeholder="Password" name="reg-password" class="uniquee">
            <select name="user-level" id="" class="uniquee">
                <option value="">Select User Type</option>
                <option value="admin">Admin</option>
                <option value="cashier">Cashier</option>
            </select>
            <button type="submit" name="submit_signup" class="submit-register">Register</button>
            <a href="index">Back To Login Page</a>
        </form>
    </div>
    </div>
</div>
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
</body>
</html>