<?php
session_start();
if (isset($_SESSION['username'])==0) {
			header('Location: ../');
		}
$module = $_GET['module'];
error_reporting(0);
switch ($module) {
	case 'siswa':
		include_once 'siswa.php';
		break;

	case 'siswa_input':
		include_once 'siswa_input.php';
		break;
	case 'siswa_edit':
		include_once 'siswa_edit.php';
		break;
	case 'siswa_tampil':
		include_once 'siswa_tampil.php';
		break;
	case 'siswa_search':
		include_once 'siswa_search.php';
		break;

	case 'delete':
		include_once 'delete.php';
		break;
	case 'keluar':
		include_once 'keluar.php';
		break;
	
	default:
		include_once 'home.php';
		break;
}
?>