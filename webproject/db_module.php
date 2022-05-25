<?php
require_once "config.php";

function startConn(&$link)
{
	$link = mysqli_connect(HOST, USER, PASSWORD, DB);
	if (mysqli_connect_errno()) {
		echo "Lỗi kết nối đến máy chủ: " . mysqli_connect_error();
		exit();
	}
}

function runQueryReturn($link, $q)
{
	$result = mysqli_query($link, $q);
	return $result;
}

function runQuerynoReturn($link, $q)
{
	$result = mysqli_query($link, $q);
	return $result;
}

function freeData($link, $result)
{
	try {
		mysqli_close($link);
		mysqli_free_result($result);
	} catch (TypeError $e) {
	}
}
?>