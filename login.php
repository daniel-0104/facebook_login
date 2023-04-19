<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <style>
        table tr td{text-align:center;}
        .bottom a{color:#D3D3D3;}
        .bottom a:link{text-decoration:none;}
        input{padding:10px;}
        .login{background-color:#3b5998;color:white; border: none;}
        .check{background-color:#32CD32;color:white;padding:12px;}
        .inputf a:link{text-decoration:none;}

        body
        {
            margin: 0;
        }
        .login:hover
        {
            background-color: #4f689d;
        }
        .check:hover
        {
            background-color: #5be35b;
        }
     </style>
    <script>
        document.title='Facebook - Log In or Sign Up';
    </script>
    <div style="width:100%;">
        <div style="height:40px;background-color:#3b5998;padding-bottom:10px;padding-left:5px;">
            <span style="color:white;font-size:120%;"><br/>facebook</span>
        </div>
        <div class="inputf" style="background-color: rgb(158, 152, 152);padding:10px;text-align:center;"><br/>
            <form  method="post" enctype="multipart/form-data">
                <input name="email" type="text" id="email" placeholder="Email address" maxlength="40" size="30px"
                required><br/><br/>
                <input name="pass" type="password" id="pass" placeholder="Password" maxlength="40" size="30px"
                required><br/><br/>
                <input class="login" name="login" type="submit" id="submit" value="Log In" size="60px"><br/><br/>
                <span style="text-align:center;">Or</span><br/><br/>
                <a class="check" href="createAccPractise.php" >Create New Account</a><br/><br/>
                <a href="#email" onclick='document.getElementById("email").focus();'>Help Center</a><br/>
            </form>
        </div>
        <div class="bottom" style="background-color:#808080;padding:10px;">
            <table style="width:250px;margin-left:auto;margin-right:auto;color:#D3D3D3;">
            <tr>
            <td><a href="#email" onclick='document.getElementById("email").focus();'>English (UK)</a></td>
            <td><a href="#email" onclick='document.getElementById("email").focus();'>English (US)</a></td>
            </tr>
            <tr>
            <td><a href="#email" onclick='document.getElementById("email").focus();'>English (In)</a></td>
            <td><a href="#email" onclick='document.getElementById("email").focus();'>More</a></td>
            </tr>
            </table>
            <p style="text-align:center;color:white;">Facebook</p>
        </div>
    </div>
    <div>
        <p style="color: white; text-align: center; background-color: black;margin-top: 0; padding: 15px;">copyright | 2023,created by myself</p>
    </div>

    <?php
    session_start();
    if (isset($_POST['login']))
    {
        $useremail = $_POST['email'];
        $userpass = $_POST['pass'];

        if(isset($_SESSION['email']) && $_SESSION['password'])
        {
            if($useremail != "" || $userpass != "") 
            {
                if($useremail == $_SESSION['email'] && password_verify($userpass,$_SESSION['password']))
                {
                    header("Location:logout.php");
                }
                else
                {
                    echo "<script>alert('login fail');</script>";
                }
            }
            else
            {
                echo "you need to fill all box";
            }
        }
        else
        {
            echo "<script>alert('try again');</script>";
        }
    }
    ?>
</body>
</html>