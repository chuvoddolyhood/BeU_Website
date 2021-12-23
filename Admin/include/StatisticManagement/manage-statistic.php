<div id="manage-main-body">
	<?php
		include("include/content-header.php");
        include("include/list-category.php");
	?>
	
	<!-- CHARTS STARTS HERE -->
    <div class="charts">
        <?php
              //Lay tong tien don
            //   $sql_get_TongTien = "SELECT SUM(c.TongTien) AS TongTien
            //                       FROM dathang d JOIN chitietdathang c ON d.SoDonDH=c.SoDonDH
            //                       WHERE d.TrangThaiDH='Đã giao'";
            //   $query_get_TongTien = mysqli_query($conn, $sql_get_TongTien);
            //   $rows_get_TongTien = mysqli_fetch_array($query_get_TongTien);

            //   //Lay tong so don
            //   $sql_get_TongSoDon = "SELECT COUNT(*) AS SoDon FROM `dathang` WHERE TrangThaiDH='Đã giao'";
            //   $query_get_TongSoDon = mysqli_query($conn, $sql_get_TongSoDon);
            //   $rows_get_TongSoDon = mysqli_fetch_array($query_get_TongSoDon);
        ?>
        <div class="charts__left">
            <div class="charts__left__title">
                <div>
                    <h1>Loại hàng được mua</h1>
                    <p>Từ đầu năm 2021 đến hiện tại</p>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
            </div>
            <div id="apex1"></div>
            <div id="reportABC"></div>
        </div>

        <div class="charts__right">
            <div class="charts__right__title">
                <div>
                    <h1>Báo cáo tài chính</h1>
                    <p>Từ đầu năm 2021 đến hiện tại</p>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
            </div>

            <div class="charts__right__cards">
                <div class="card1">
                    <h1>Tổng vốn</h1>
                    <p>$</p>
                </div>

                <div class="card2">
                    <h1>Tổng tiền đơn</h1>
                    <!-- <p><?php echo $rows_get_TongTien['TongTien'] ?> ₫</p> -->
                </div>

                <div class="card3">
                  <h1>Tổng Lợi nhuận</h1>
                  <p>$</p>
                </div>

                <div class="card4">
                  <h1>Tổng Số đơn</h1>
                  <!-- <p><?php echo $rows_get_TongSoDon['SoDon'] ?></p> -->
                </div>
            </div>
            <div id="chart_FinanceReport"></div>
        </div>
    </div>
    <!-- CHARTS ENDS HERE -->

    <!-- CHARTS STARTS HERE -->
    <div class="charts">
        <?php
              //Lay tong tien don
            //   $sql_get_TongTien = "SELECT SUM(c.TongTien) AS TongTien
            //                       FROM dathang d JOIN chitietdathang c ON d.SoDonDH=c.SoDonDH
            //                       WHERE d.TrangThaiDH='Đã giao'";
            //   $query_get_TongTien = mysqli_query($conn, $sql_get_TongTien);
            //   $rows_get_TongTien = mysqli_fetch_array($query_get_TongTien);

            //   //Lay tong so don
            //   $sql_get_TongSoDon = "SELECT COUNT(*) AS SoDon FROM `dathang` WHERE TrangThaiDH='Đã giao'";
            //   $query_get_TongSoDon = mysqli_query($conn, $sql_get_TongSoDon);
            //   $rows_get_TongSoDon = mysqli_fetch_array($query_get_TongSoDon);
        ?>
        <div class="charts__left">
          <div class="charts__left__title">
              <div>
                <h1>Loại hàng được mua</h1>
                <p>Từ đầu năm 2021 đến hiện tại</p>
              </div>
              <i class="fa fa-usd" aria-hidden="true"></i>
          </div>
          <div id="reportUserOrOrder"></div>
        </div>

        <div class="charts__right">
          <div class="charts__left__title">
            <div>
              <h1>Loại hàng được mua</h1>
              <p>Từ đầu năm 2021 đến hiện tại</p>
            </div>
            <i class="fa fa-usd" aria-hidden="true"></i>
          </div>
          <div id="reportStaff"></div>
        </div>    
      </div>
    </div>
    <!-- CHARTS ENDS HERE -->     
</div>

<script src="./include/StatisticManagement/statistic.js"></script>