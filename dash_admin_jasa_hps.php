<?php

 @session_start();

    if( !isset($_SESSION["admin_name"]) ) {

        header("Location: login.php");
        exit;
    }

require 'config.php';

$id = $_GET['id'];


if (hapus3 ($id) > 0) {
		
		echo "
				<script>
						alert('Data berhasil dihapus!')
						document.location.href = 'dash_admin_jasa.php';
				</script>
			";
	} else {
		echo "
				<script>
						alert('Data Gagal dihapus!')
						document.location.href = 'dash_admin_jasa.php';
				</script>
			";

	}


 ?>