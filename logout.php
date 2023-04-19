<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Out</title>
</head>
<body>

<style>
    body
    {
        background-color: black;
    }
    h2 
    {
        color: white;
        font-family: calibri;
    }
    #logout
    {
        background-color: red;
        color: white;
        border: none;
        padding: 10px 30px;
        border-radius: 20px;
    }
    #logout:hover
    {
        background: rgb(244, 47, 47);
    }
    #login
    {
        background-color: green;
        color: white;
        border: none;
        padding: 10px 30px;
        border-radius: 20px;
        text-decoration: none;
    }
    #login:hover
    {
        background: rgb(23, 149, 23);
    }
    span 
    {
        color: green;
        font-size: 25pt;
    }
</style>

    <h2>Hello, you just <span>LOGIN</span> to your account successfully.</h2>
    <button type="reset" id="logout" name="logout" onclick="logout()">Logout</button>

    <a href="loginPractise.php" id="login" name="login">Login</a>

    <?php
    session_start();

    session_destroy();
    ?>

    <script>
    function logout()
    {
        alert("successfully logout");
    }
    </script>
</body>
</html>