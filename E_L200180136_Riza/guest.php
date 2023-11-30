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
        <div class='py-2'>
            <table>
                <form method='POST' action="guest.php">
                    <tr>
                        <td><label for="id">ID</label></td>
                        <td><input type="text" class='form-control' name="id"></td>
                    </tr>
                    <tr>
                        <td><label for="date">Date</label></td>
                        <td><input type="date" class='form-control' name="date"></td>
                    </tr>
                    <tr>
                        <td><label for="nama">Nama</label></td>
                        <td><input type="text" class='form-control' name="name"></td>
                    </tr>
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="text" class='form-control' name="email"></td>
                    </tr>
                    <tr>
                        <td><label for="address">Address</label></td>
                        <td><input type="text" class='form-control' name="address"></td>
                    </tr>
                    <tr>
                        <td><label for="message">Message</label></td>
                        <td><textarea class="form-control" rows="3" name='message'></textarea></td>
                    </tr>
                </table>
                <input type="submit" value="Kirim" name="submit">
            </form>

            <?php 
                $id = $_POST['id'];
                $date = $_POST['date'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $message = $_POST['message'];
                $submit = $_POST['submit'];

                $input = "INSERT INTO guestbook (id, date, name, email, address, message) VALUES('$id','$date','$name','$email','$address','$message')";

                if($submit){
                    mysqli_query($conn,$input);

                    echo
                        "<script>
                            alert('Data Sudah dimasukan');
                            document.location('guest.php');
                        </script>";
                }
            ?>
    
            <hr>
    
            <table border='1' width='80%' style='background-color: white'>
                <tr >
                    <td align='center' width='10%'><b>Id</b></td>
                    <td align='center' width='10%'><b>Date</b></td>
                    <td align='center' width='20%'><b>Name</b></td>
                    <td align='center' width='20%'><b>Email</b></td>
                    <td align='center' width='20%'><b>Adress</b></td>
                    <td align='center' width='40%'><b>Message</b></td>
                </tr>
                <?php  
                    $cari = "SELECT * FROM guestbook ORDER BY id";
                    $hasil_cari = mysqli_query($conn, $cari);
                    while ($data = mysqli_fetch_row($hasil_cari)) {
                        echo "
                        <tr>
                            <td width='10%'>$data[0]</td>
                            <td width='10%'>$data[1]</td>
                            <td width='20%'>$data[2]</td>
                            <td width='20%'>$data[3]</td>
                            <td width='20%'>$data[4]</td>
                            <td width='40%'>$data[5]</td>
                        </tr>
                        ";
                    }
                ?>
            </table>

            <p>Kembali Ke Menu Login</p>
            <a href="login.php"><input type="submit" value="Keluar"></a>
        </div>
    </center>
    
        
</body>
</html>