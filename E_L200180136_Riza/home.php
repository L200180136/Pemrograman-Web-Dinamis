<?php 
    require 'koneksi.php';

    session_start();
    if($_SESSION['username'] != 'admin'){
        header('Location:login.php');
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
        <div class='py-2'>
            <p>Daftar Akun atau Registrasi Akun</p>
            <a href="register.php"><input type="submit" value="Registrasi"></a>

            <hr>

            <table border='1' width='80%' style='background-color: white'>
                <tr >
                    <td align='center' width='10%'><b>Date</b></td>
                    <td align='center' width='20%'><b>Name</b></td>
                    <td align='center' width='20%'><b>Email</b></td>
                    <td align='center' width='20%'><b>Adress</b></td>
                    <td align='center' width='40%'><b>Message</b></td>
                    <td align='center' width='20%'><b>Keterangan</b></td>
                </tr>
                <?php  
                    $cari = "SELECT * FROM guestbook ORDER BY id";
                    $hasil_cari = mysqli_query($conn, $cari);
                    while ($data = mysqli_fetch_row($hasil_cari)) {
                        echo "
                        <tr>
                            <td width='10%'>$data[1]</td>
                            <td width='20%'>$data[2]</td>
                            <td width='20%'>$data[3]</td>
                            <td width='20%'>$data[4]</td>
                            <td width='40%'>$data[5]</td>
                            <td width='20%'>
                                <a href='edit.php?id=$data[0]'>Edit</a> |
                                <a href='hapus.php?id=$data[0]'>Hapus</a>
                            </td>
                        </tr>
                        ";
                    }
                ?>
            </table>

            <hr>
            
            <p>Keluar dari website</p>
            <a href="logout.php"><input type="submit" name='logout' value='Logout'></a>
        </div>
    </center>
    
        
</body>
</html>