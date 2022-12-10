<?php

 @session_start();

    if( !isset($_SESSION["admin_name"]) ) {

        header("Location: login.php");
        exit;
    }

require 'config.php';

$id = $_GET['id'];


if (hapus2 ($id) > 0) {
		
		echo "
				<script>
						alert('Data berhasil dihapus!')
						document.location.href = 'dash_admin_dt.php';
				</script>
			";
	} else {
		echo "
				<script>
						alert('Data Gagal dihapus!')
						document.location.href = 'dash_admin_dt.php';
				</script>
			";

	}


 ?>