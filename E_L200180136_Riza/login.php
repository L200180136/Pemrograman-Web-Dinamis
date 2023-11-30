<?php 
    require 'koneksi.php';
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $submit = $_POST['submit'];
    $guest = $_POST['guest'];


    if($submit){
        $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        if ($row['username']!=""){
            $_SESSION['username']=$row['username'];
            $_SESSION['status']=$row['status'];
            header("Location: home.php"); 
        }
    }elseif($guest){
        header('Location: guest.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Harold Inn</title>
</head>
<body>
    <center>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                        <div class="form-login my-5" style='background-color: white'>
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <form class="user" method="POST" action="login.php">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            name="username" placeholder="Enter username...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            name="password" placeholder="Enter Password...">
                                    </div>
                                    <a href="home.php"><input type="submit" value='Login' name='submit'></a>
                                    <a href="guest.php"><input type="submit" value="Guest" name='guest'></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>

</html>