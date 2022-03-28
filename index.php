<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profile</title>
</head>
<center><body>
    <h1>Xin chao</h1>
    <?php
    echo $_SESSION['username'];
    ?>
    <br/>
    <a href="logout.php" title="Logout">Logout</a>

    
</body></center>
</html>
