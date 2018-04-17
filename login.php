<?php
	session_start();
	if (isset($_SESSION['id'])) {
		header("Location: /index.php");  
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en" >
	<head>
		<meta charset="UTF-8">
		<title>Đăng nhập</title>
		<link href="/css/fonts.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="/css/style.css">
		<link rel="shortcut icon" href="/favico.ico" />
	</head>
	<body>
		<button id="findpass">
			<p align="left">
				• Ứng dụng hỗ trợ lấy tất cả email<br>từ bình luận trên fanpage facebook<br>
				• Tác giả: Nguyễn Văn Thành<br>
				• Facebook: https://fb.com/thanhnv03
			</p>
		</button>
		<div class="form">
			<div class="forceColor"></div>
			<div class="topbar">
				<div class="spanColor"></div>
				<div class="input">Bạn cần đăng nhập Facebook để sử dụng</div>
			</div>
			<button class="submit" id="submit" onclick="window.location.href='/permissions.php'">Login</button>
		</div>
	</body>
</html>
