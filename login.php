<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">       
</head>
<center><body>
    <h3>Login</h3>
    <form action="login.php" method="POST">
        <table>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr  style="text-align: right;" >
                <td><button type="submit" name="register">Register</button></td>
                <td><button type="submit" name="login">Login</button></td>
            </tr>
        </table>
    </form>
    <?php
        $conn = mysqli_connect("localhost","root","","task_5");
        if(isset($_POST['login']))
        {
            $username=$_POST['username'];
            $password= $_POST['password'];

            if($username==""||$password=="")
            {
                echo 'Fill full the information';
            }
            else
            {
                $password=md5($password);
                $sql = "SELECT * FROM `task_5` WHERE username ='$username' AND password='$password' ";
                $query = mysqli_query($conn,$sql);
                if( mysqli_num_rows($query) != 0)
                {
                    $rows = mysqli_fetch_assoc($query);                   
                    $_SESSION['id'] = $rows['id'];
                    $_SESSION['username'] = $rows['username'];
                    $_SESSION['password'] = $rows['password'];
                    header('location: index.php');
                }
                else
                {
                    echo 'Wrong username or password';
                }
            }
        }
        if(isset($_POST['register']))
        {
            header('location:register.php');
        }

    ?>
</body></center>
</html>
