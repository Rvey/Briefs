<?php

session_start();
if(!isset($_SESSION["userid"]) || $_SESSION["level"] !== 1) {
	header("location: ./login.php?error=noperm");
}

if (isset($_POST["submit"])) {

	$id = rand(9000000000, 999999999);
	
	$usersEmail = $_POST["usersEmail"];
	$usersUid = $_POST["usersUid"];
	$usersPwd = $_POST["usersPwd"];
	
	$teachersClassId = $_POST["teachersClassId"];
	$teachersFName = $_POST["teachersFName"];
	$teachersLName = $_POST["teachersLName"];
	$teachersAddress = $_POST["teachersAddress"];
	$teachersPhone = $_POST["teachersPhone"];
	$usersLevel = 2;

	require_once '../../dbh-inc.php';

	$sql = "INSERT INTO users(usersId, usersLevel, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?, ?)";
	$stmt = mysqli_stmt_init($conn);
	
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../../../dboard_admin.php?error_stmtfailure1");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "iisss", $id, $usersLevel, $usersEmail, $usersUid, $usersPwd);
	mysqli_stmt_execute($stmt);

	$sql = "INSERT INTO teachers VALUES (?, ?, ?, ?, ?, ?)";
	$stmt = mysqli_stmt_init($conn);
	
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: ../../../dboard_admin.php?error_stmtfailure");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "iisssi", $id, $teachersClassId, $teachersFName, $teachersLName, $teachersAddress, $teachersPhone);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);


	header("location: ../../../dboard_admin.php?error=none");
	exit();
}
?>
