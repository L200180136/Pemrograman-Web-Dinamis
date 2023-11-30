<?php 
    require 'koneksi.php';
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
                                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                </div>
                                <form class="user" method="POST" action="register.php">
                                    <div class="form-group">
                                        <label for="no">No</label>
                                        <input type="text" class="form-control form-control-user"
                                            name="no">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control form-control-user"
                                            name="username">
                                    </div>
                                    <div class="form-group">
                                    <label for="password">Password</label>
                                        <input type="password" class="form-control form-control-user"
                                            name="password">
                                    </div>
                                    <input type="submit" name="submit" id="submit">
                                </form>

                                <?php 
                                    $no = $_POST['no'];
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];
                                    $submit = $_POST['submit'];

                                    $input = "INSERT INTO user (no, username, password) VALUES('$no','$username','$password')";

                                    if($submit){
                                        mysqli_query($conn,$input);

                                        echo
                                            "<script>
                                                alert('Data Sudah dimasukan');
                                                document.location('home.php');
                                            </script>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>

</html>