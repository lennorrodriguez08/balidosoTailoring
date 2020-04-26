<?php 
 session_start();


 if (isset($_SESSION['id'])) {
     header("Location: home");
 }

 else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Balidoso Tailoring | Login</title>
<link rel="stylesheet" href="css/main.css">

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

</head>
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
            <p class="login-text">Login</p>
            <form action="includes/login.php" method="post" autocomplete="off">
                <input type="text" class="input-1" placeholder="Username" name="username">
                <input type="password" placeholder="Password" name="password">
                <select name="user_level" id="">
                    <option value="">Select User Type</option>
                    <option value="admin">Login As Admin</option>
                    <option value="cashier">Login As Cashier</option>
                </select>
                <button type="submit" name="submit" class="submit-login" style="border-radius: 3px;">Submit</button>
                <a href="register">Create An Account </a>
            </form>
        </div>
    </div>

</div>

    <!-- scripts -->
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
</body>
</html>
<?php
 }
?>

