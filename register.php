<?php
    session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<center><body style="display: flex; align-item: center; justify-content: center; height: 100vh;">
    <h3>Register</h3>
    <form action="register.php" method="POST">
        <table>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Repassword: </td>
                <td><input type="password" name="repassword"></td>
            </tr>
            <tr  style="text-align: right;" >
                <td><button type="submit" name="login">Login</button></td>
                <td><button type="submit" name="register">Register</button></td>
            </tr>
        </table>
    </form>
    <?php
        $conn = mysqli_connect("localhost","root","","task_5");
        if( isset($_POST['register']) && $_POST['username'] != '' && $_POST['password'] != '' && $_POST['repassword'] != '')
        {
            $username = $_POST['username'];
            $password = $_POST["password"];
            $repassword = $_POST["repassword"];
            $level = 0;
            if($password != $repassword)
            {
                echo 'Repassword does not match';
            }
            $sql = "SELECT * FROM `task_5` WHERE username ='$username' ";
            $old = mysqli_query($conn, $sql);
            if(mysqli_num_rows($old) != 0)
            {
                echo 'Username has been existed';
            }  
            else
            {
                $password = md5($password);
                $sql = "INSERT INTO task_5 (username, password, level) 
                        VALUES ('$username','$password','$level') ";
                $query = mysqli_query($conn,$sql);
                if($query != 0)
                {
                    echo 'Register successed';
                }
                else
                {
                    echo 'Register failed';
                }
            }
            
        }
        else
        {
            echo 'Fill full the information';
        }
        if(isset($_POST['login']))
        {
            header('location: login.php');
        }

    ?>
</body></center>
</html>