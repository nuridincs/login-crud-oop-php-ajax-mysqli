<?php 
	require "config/database.php";
	//session_start();

	$act = $_GET['act'];
	$type = $_GET['type'];

	if ($act == 'cekLogin') {
		$email = $_POST['username'];
		$password = md5($_POST['password']);

		$query = "SELECT * FROM app_users WHERE email = '".$email."' AND password = '".$password."' ";
		$result = $mysqli->query($query);
		$row = $result->fetch_assoc();
		$num_rows = $result->num_rows;
		//print_r($row);die();
		if ($num_rows > 0) {
			//session_start();
			$_SESSION['userSession'] = $email;
	        $_SESSION['name'] = $row['nama'];
	        $_SESSION['userId'] = $row['id'];
	        $_SESSION['role'] = $row['role'];
	        
	        $out = 1;//"Anda Berhasil Login dengan ".$_SESSION['name'];
	        //header("location: home.php");
		}else{
			$out = 0;//"Login Gagal";
		}
		echo $out;
	}elseif ($act == 'save') {
		if ($type == 'addUsers') {
			$nama = $_POST['nama'];
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$role = '1';

			$query = "INSERT INTO app_users(nama,email,password,role) VALUES('$nama','$email','$password','$role')";
			$execute = $mysqli->query($query) or die('Gagal Insert');
			if ($execute) {
				$out = 1;
			}else{
				$out = 0;
			}
			echo $out;
		}
	}elseif ($act == 'getData') {
		if ($type == 'dataUsers') {
			$id = $_POST['id'];

			$query = "SELECT * FROM app_users WHERE id = '".$id."'";
			$result = $mysqli->query($query);
			$row = $result->fetch_assoc();
			$dataArr = array(
					'id' => $row['id'],
					'nama' => $row['nama'],
					'email' => $row['email'],
					'password' => $row['password'],
				);

			echo json_encode($dataArr);
		}
	}elseif ($act == 'edit') {
		if ($type == 'editUsers') {
			$id = $_POST['id'];
			$nama = $_POST['nama'];
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$role = '1';

			$query = "UPDATE app_users SET nama = '".$nama."', email = '".$email."', password = '".$password."' WHERE id = '".$id."' ";
			$execute = $mysqli->query($query) or die('Gagal Update');
			if ($execute) {
				$out = 1;
			}else{
				$out = 0;
			}
			echo $out;
		}
	}elseif ($act == 'delete') {
		if ($type == 'users') {
			$id = $_POST['id'];
			
			$query = "DELETE FROM app_users WHERE id = '".$id."'";
			$mysqli->query($query) or die('Gagal Update');
		}
	}
?>