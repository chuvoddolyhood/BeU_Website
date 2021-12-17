<?php
	session_start();
	include_once('./Process/db/connect.php');
	
	// if(!isset($_SESSION['login'])){
	// 	echo "<script> alert('Vui lòng đăng nhập để thực hiện chức năng này'); window.location = './index.php?status=login'; </script>";
	// }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Web bán hàng</title>
		<link rel="stylesheet" href="./Process/assets/css/base.css">
		<link rel="stylesheet" href="./Process/assets/css/main.css">
		<link rel="stylesheet" href="./Process/assets/fonts/fontawesome-free-5.15.4-web/css/all.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
	</head>

	<body>
		<script src="Process/javascript/main.js"></script>
		<script src="Process/javascript/change_info.js"></script>
		<script src="Process/javascript/check_register.js"></script>

		<!-- BEM -->
		<div class="app">
			<?php
				include("./Client/include/topbar.php");
			?>
			<div class="app__container">
				<div class="grid">
					<div class="grid__row app_content">
						<link rel="stylesheet" href="./Process/assets/css/game.css">
						<div class="grid__column-12">
							<div class="grid_game_wrapper">
								<div class="box">
									<div class="ribbon ribbon-top-right">
										<span>High risk high return!</span>
									</div>
									<div class="bg-primary">
										<h5>BeU Store</h5>
										<h1>Tic Tac Toe</h1>
										<h4>Inspire by The Coding Train</h4>
										<p>Một game đối kháng cơ bản đầy hấp dẫn, với mục tiêu tạo thành 3 quân giống nhau theo hàng dọc, ngang hoặc chéo</p>
										<a href="#" class="button">Play Game</a>
									</div>
									<div class="bg-secondary" style="background-image: url('https://dochub.com/thanhb1805813/6mO8oy7Kp8P6okOKqg5p9J/back-school-background-doodle-tic-600w-671642395-png'); opacity: 0.3; z-index: 1"></div>
									<div class="box-img">
										<div class="ttt_wrapper">
											<img id="ttt_O-1" class="ttt_O" src="https://raw.githubusercontent.com/BeThanhU/Tic_Tac_Toe_JS/main/image/O-rmbg.png" />
											<img id="ttt_O-2" class="ttt_O" src="https://raw.githubusercontent.com/BeThanhU/Tic_Tac_Toe_JS/main/image/O-rmbg.png" />
											<img id="ttt_O-3" class="ttt_O" src="https://raw.githubusercontent.com/BeThanhU/Tic_Tac_Toe_JS/main/image/O-rmbg.png" />
											<img id="ttt_X-1" class="ttt_X" src="https://raw.githubusercontent.com/BeThanhU/Tic_Tac_Toe_JS/main/image/X-solid-rmgb.png" />
											<img id="ttt_X-2" class="ttt_X" src="https://raw.githubusercontent.com/BeThanhU/Tic_Tac_Toe_JS/main/image/X-solid-rmgb.png" />
											<img id="ttt_X-3" class="ttt_X" src="https://raw.githubusercontent.com/BeThanhU/Tic_Tac_Toe_JS/main/image/X-solid-rmgb.png" />
											<img id="ttt_X-4" class="ttt_X" src="https://raw.githubusercontent.com/BeThanhU/Tic_Tac_Toe_JS/main/image/X-solid-rmgb.png" />
											<img id="ttt_win" class="ttt_win" src="https://raw.githubusercontent.com/BeThanhU/Tic_Tac_Toe_JS/main/image/Win-line.png" />
											<img id="ttt_board" class="ttt_board" src="https://raw.githubusercontent.com/BeThanhU/Tic_Tac_Toe_JS/main/image/board-rmbg.png" />
										</div>
									</div>
								</div>
								<div class="box">
									<div class="ribbon ribbon-top-right">
										<span>Hot game</span>
									</div>
									<div class="bg-primary">
										<h5>BeU Store</h5>
										<h1>Flappy Bird</h1>
										<h4>Inspire by Code Bullet</h4>
										<p>Một game đơn giản, được phát triển đầu tiên bởi Nguyễn Hà Đông, mục tiêu là điều khiển một chú chim bay qua những cái ống.</p>
										<a href="#" class="button">Play Game</a>
									</div>
									<div class="bg-secondary" style="background-image: url('https://raw.githubusercontent.com/BeThanhU/Flappy_Bird_JS/main/images/background-tiny.png')"></div>
									<div class="box-img">
										<img class="img-bound" src="https://raw.githubusercontent.com/BeThanhU/Flappy_Bird_JS/main/images/PigBird-rmbg%20-%20Fliped.png" alt="image" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php 
			if(isset($_GET['status']) && $_GET['status']=='login'){
				if($_SESSION['login']!=null){
					echo "<script> 
							alert('Hãy đăng xuất trước khi thực hiện chức năng này!') 
							window.location='index.php';
						</script>";
					header('location: ./index.php');
				}else{
					echo '<script> activeModal(1) </script>';
				}
			}elseif(isset($_GET['status']) && $_GET['status']=='register'){
				if($_SESSION['login']!=null){
					echo "<script> 
							alert('Hãy đăng xuất trước khi thực hiện chức năng này!') 
							window.location='index.php';
						</script>";
				}else{
					echo '<script> activeModal(0) </script>';
				}
			}

			include("./Client/include/footbar.php");
		?>
	</body>
</html>