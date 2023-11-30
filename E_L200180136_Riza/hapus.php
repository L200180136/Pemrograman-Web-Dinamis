<?php 
    require 'koneksi.php';
	$id = $_GET['id'];
	$submit = $_POST['submit'];
	$delete = "DELETE FROM guestbook WHERE id ='$id'";

	mysqli_query($conn, $delete);
    echo "<script>
        alert('data berhasil dihapus');
        document.location.href='home.php';
    </script>";
?>