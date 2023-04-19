<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create account</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <style>
        #create
        {
            width: 150px;
            background-color: black;
            color: white;
            display: block;
            margin-bottom: 50px;
        }
        #create:hover
        {
            background-color: rgb(47, 47, 47);
        }
        #login
        {
            width: 150px;
            background-color: green;
            color: white;
            float: right;
        }
        #login:hover
        {
            background-color: rgb(23, 149, 23);
        }
    </style>
    <div class="container">
        <div class="row mt-5 align-items-center justify-content-center">
            <div class="col-12 w-50">
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="">Name</label><input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label><input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label><input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="">Confirm Password</label><input type="password" name="confirmPassword" class="form-control" required>
                            </div>
                            <button type="Submit" name="create" class="btn" id="create">Create</button>
                            <div class="mb-3">
                                <a href="loginPractise.php" type="Submit" name="login" class="btn" id="login">Login</a>
                                <p>If you have already account, you can just click login.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    session_start();
    function checkStrongPass($password)
    {
        $lowerstatus = false;
        $upperstatus = false;
        $specialstatus = false;
        $numberstatus = false;

        if(preg_match("/[a-z]/",$password))
        {
            $lowerstatus = true;
        }
        if(preg_match("/[A-Z]/",$password))
        {
            $upperstatus = true;
        }
        if(preg_match("/[!@#$%&*]/",$password))
        {
            $specialstatus = true;
        }
        if(preg_match("/[0-9]/",$password))
        {
            $numberstatus = true;
        }
        
        if($lowerstatus == true && $upperstatus == true && $specialstatus == true && $numberstatus == true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    if(isset($_POST['create']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $conPass = $_POST['confirmPassword'];

        if($name != "" || $email != "" || $password != "" || $conPass != "")
        {
            if(strlen($password) > 6 && strlen($conPass) > 6)
            {
                if($password == $conPass)
                {
                    $status = checkStrongPass($password);
                    if($status)
                    {
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = password_hash($password,PASSWORD_BCRYPT);
                        echo "<script>alert('You just create your account successfully');</script>";
                    }
                    else
                    {
                        echo "<script>alert('your password is not strong enough');</script>";
                    }
                }
                else
                {
                    echo "<script>alert('password was wrong. please try again');</script>";
                }
            }
            else
            {
                echo "<script>alert('your password must be greater than 6h');</script>";
            }
        }
        else
        {
            echo "you need to fill all box";
        }
    }
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>