<?php 
    require 'koneksi.php';

    $id = $_GET['id'];
    $cari = "SELECT * FROM guestbook ORDER BY $id";
    $hasil_cari = mysqli_query($conn, $cari);
    $data = mysqli_fetch_array($hasil_cari);

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
        <div class='py-2'> 
            <table border='1' width='80%' style='background-color: white'>
                <form method="POST">
                    <tr >
                        <td align='center' width='10%'><b>Id</b></td>
                        <td align='center' width='10%'><b>Date</b></td>
                        <td align='center' width='20%'><b>Name</b></td>
                        <td align='center' width='20%'><b>Email</b></td>
                        <td align='center' width='20%'><b>Adress</b></td>
                        <td align='center' width='40%'><b>Message</b></td>
                    </tr>
                        <td width='10%'><input type='text' name='id' value='<?= $data[0] ?>'></td>
                        <td width='10%'><input type='date' name='date' value='<?= $data[1] ?>'></td>
                        <td width='20%'><input type='text' name='name' value='<?= $data[2] ?>'></td>
                        <td width='20%'><input type='email' name='email' value='<?= $data[3] ?>'></td>
                        <td width='20%'><input type='text' name='address'' value='<?= $data[4] ?>'></td>
                        <td width='40%'><textarea name="message" id="message" rows="3"><?= $data[5] ?></textarea></td>
                    </tr>
                </table>
                <input type="submit" value="Ubah Data" name='submit'>
            </form>
            <?php
                $id = $_POST['id']; 
                $date = $_POST['date'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $adress = $_POST['address'];
                $message = $_POST['message'];
                $submit = $_POST['submit'];
                $update = "UPDATE guestbook SET id='$id', date='$date', name='$name', email='$email', address='$address', message='$message' WHERE id='$id' ";
            
                if($submit){
                    mysqli_query($conn,$update);
                    echo "
                        <script>
                            alert('data berhasil dirubah');
                            document.location.href='home.php';
                        </script>";		
                }
            ?>
        </div>
    </center>
    
        
</body>
</html>