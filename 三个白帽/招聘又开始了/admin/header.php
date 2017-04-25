<?php
/**
 * @author firesun 
 * @website https://github.com/firesunCN
 */
header("Content-Security-Policy: default-src 'self'; object-src 'none'; frame-src 'none'");
header("X-Content-Security-Policy: default-src 'self'; object-src 'none'; frame-src 'none'");
header("X-WebKit-CSP: default-src 'self'; object-src 'none'; frame-src 'none'");

require_once("../database.php");

if (!isset($_COOKIE['username']) || decrypt($_COOKIE['username']) === "") {
    setcookie("username");
    header("Location: ../login.php");
    exit();
}

if (!isset($_COOKIE['username']) || decrypt($_COOKIE['username']) !== "admin") {
    die("You are not an administrator!");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>三个白帽招聘</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link rel="stylesheet" href="../css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" href="../css/bootswatch.min.css">
		<link rel="stylesheet" href="../css/main.css"/>
	</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<div class="navbar-brand"><a href="../index.php">三个白帽招聘系统</a></div>
		</div>
		<div class="navbar-collapse collapse" id="navbar-main">
			<ul class="nav navbar-nav">
				<li><a href="index.php">用户信息</a></li>
				<li><a href="memo.php">备忘录</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
<?php
if (isset($_COOKIE['username']) && decrypt($_COOKIE['username']) !== "") {
?>
				<li><div class="navbar-brand"><?php echo decrypt($_COOKIE['username']);?></div></li>
				<li><a href="../logout.php">注销</a></li>
<?php
} else {
?>
				<li><a href="../login.php">登录</a></li>
				<li><a href="../reg.php">注册</a></li>
<?php
}
?>
			</ul>
		</div>
	</div>
</div>
<div class="container">
	<div class="firecms">
