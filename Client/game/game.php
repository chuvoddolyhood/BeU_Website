<?php
	
	// if(!isset($_SESSION['login'])){
	// 	echo "<script> alert('Vui lòng đăng nhập để thực hiện chức năng này'); window.location = './index.php?status=login'; </script>";
	// }
?>
	<link rel="stylesheet" href="./Process/assets/css/game.css">
	<script src="./Client/game/Process/javascript/exchangeVoucher.js"></script>
		<!-- BEM -->
		<div class="app">
			<div class="app__container" style="background-image: url('./Process/assets/img/game_bg.jpg'); background-size: auto 100%;">
				<div class="grid">
					<div class="grid__row app_content">
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
										<a href="?quanly=game&id=1" class="button" target="_blank">Play Game</a>
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
										<a href="?quanly=game&id=2" class="button">Play Game</a>
									</div>
									<div class="bg-secondary" style="background-image: url('https://raw.githubusercontent.com/BeThanhU/Flappy_Bird_JS/main/images/background-tiny.png')"></div>
									<div class="box-img">
										<img class="img-bound" src="https://raw.githubusercontent.com/BeThanhU/Flappy_Bird_JS/main/images/PigBird-rmbg%20-%20Fliped.png" alt="image" />
									</div>
								</div>
							</div>
							<div class="grid_game_wrapper">
								<div class="body-light-grey">
									<p class="exchange_header_label">Khu vực đổi thưởng</p>
									<div class="exchange_header">
										<div class="exchange_label">	
											<?php
												$sql_get_user_id = mysqli_query($con, "select MSKH from khachhang where TaiKhoanKH='".$_SESSION['login']."'");
												$row_get_user_id = mysqli_fetch_array($sql_get_user_id);

												$sql_get_user_info = mysqli_query($con, "select BeUToken, LuotChoi from khachhang where MSKH='".$row_get_user_id['MSKH']."'");
												$row_get_user_info = mysqli_fetch_array($sql_get_user_info);
											?>
											<h2><span>BeU</span>Token của bạn: <?php echo $row_get_user_info['BeUToken'] ?></h2>
										</div>
										<div class="exchange_label">
											<h2>Lượt chơi còn lại: <?php echo $row_get_user_info['LuotChoi'] ?></h2>
										</div>
									</div>
									
									<div class="grid__row">
										<?php
											$sql_get_list_voucher = mysqli_query($con, "select * from voucher");
											while($row_get_list_voucher = mysqli_fetch_array($sql_get_list_voucher)){
										?>
										<div class="grid__column-3">
											<div class="exchange_voucher">
												<div class="exchange_label">
													<p><?php echo $row_get_list_voucher['TenVoucher'] ?>: <?php echo $row_get_list_voucher['Token'] ?> <span>BeU</span>Token</p>
												</div>
												<button onclick="exchange('<?php echo $_SESSION['login'] ?>', '<?php echo $row_get_list_voucher['TenVoucher'] ?>')">Trao đổi</button>
											</div>
										</div>
										<?php
											}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script>
			window.onbeforeunload = set_default_zoom();
		</script>

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
		?>