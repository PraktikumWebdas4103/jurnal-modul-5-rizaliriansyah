<?php
	if (isset($_POST['submit'])) {
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];

		$a=strlen($nim);
		$n=strlen($nama);
		if ($a != 10 || $n > 25 || $email) {
			if ($a != 10) {
				echo "Data harus 10 digit<br>";
			}
			if ($n > 25) {
				echo "Data tidak boleh lebih dari 25<br>";
			}
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				echo "invalid email format";
			}
		}

		else{
			include "koneksi.php";
			$sql = "INSERT INTO mahasiswa SET nim='".$nim."', nama='".$nama."', email='".$email."'";
			mysqli_query($conn,$sql);

			if ($sql) {
				echo "Data berhasil disimpan";
			}
			else{
				echo "Data tidak berhasil";
			}
		}
		
	}
