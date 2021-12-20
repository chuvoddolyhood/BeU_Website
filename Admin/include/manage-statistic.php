<div id="manage-main-body">
	<?php
		include("include/content-header.php");
        include("include/list-category.php");
	?>

	<div class="mannage-main-body">
		<div class="manage-client-head">
			<!-- MAIN CARDS STARTS HERE -->
            <div class="main__cards">
                <div class="card">
                    <?php
                        // $sql_get_KH = "SELECT COUNT(*) AS SoLuongKH FROM `khachhang` ";
                        // $query_get_KH = mysqli_query($conn, $sql_get_KH);
                        // $rows_get_KH = mysqli_fetch_array($query_get_KH);
                    ?>
                    <i
                        class="fa fa-user-o fa-2x text-lightblue"
                        aria-hidden="true"
                    ></i>
                    <div class="card_inner">
                        <p class="text-primary-p">Tổng số khách hàng</p>
                        <span class="font-bold text-title"><?php echo $rows_get_KH['SoLuongKH'] ?></span>
                    </div>
                </div>

                <div class="card">
                    <?php
                        $sql_get_HH = "SELECT COUNT(*) AS SoLuongHH FROM `hanghoa` ";
                        $query_get_HH = mysqli_query($conn, $sql_get_HH);
                        $rows_get_HH = mysqli_fetch_array($query_get_HH);
                    ?>
                    <i class="fa fa-calendar fa-2x text-red" aria-hidden="true"></i>
                    <div class="card_inner">
                        <p class="text-primary-p">Số lượng sản phẩm</p>
                        <span class="font-bold text-title"><?php echo $rows_get_HH['SoLuongHH'] ?></span>
                    </div>
                </div>

                <div class="card">
                    <?php
                    //Lay thang hien tai
                        $date = getdate();
                        $month = $date['mon'];
                        // echo $month;
                        $sql_get_DonHang = "SELECT COUNT(*) AS SoDon FROM `dathang` WHERE TrangThaiDH='Đã giao' AND MONTH(NgayGH)='$month'";
                        $query_get_DonHang = mysqli_query($conn, $sql_get_DonHang);
                        $rows_get_DonHang = mysqli_fetch_array($query_get_DonHang);

                    ?>
                    <i
                        class="fa fa-video-camera fa-2x text-yellow"
                        aria-hidden="true"
                    ></i>
                    <div class="card_inner">
                        <p class="text-primary-p">Số đơn thành công trong tháng <?php echo $month; ?></p>
                        <span class="font-bold text-title"><?php echo $rows_get_DonHang['SoDon'] ?></span>
                    </div>
                </div>

                <div class="card">
                    <i
                        class="fa fa-thumbs-up fa-2x text-green"
                        aria-hidden="true"
                    ></i>
                    <div class="card_inner">
                        <p class="text-primary-p">Lợi thuận trong tháng</p>
                        <span class="font-bold text-title">#</span>
                    </div>
                </div>
          </div>
          <!-- MAIN CARDS ENDS HERE -->
		</div>
	</div>
</div>
