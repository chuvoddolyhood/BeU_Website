<!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div id="manage-main-body">
	<?php
		include("include/content-header.php");
    include("include/list-category.php");
	?>
	
	<!-- CHARTS STARTS HERE -->
  <div class="charts">
    <div class="charts__left">
      <div class="charts__left__title">
                <div>
                    <h1>Loại hàng được mua</h1>
                    <p>Từ đầu năm 2021 đến hiện tại</p>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
          </div>
            <canvas id="chartOfProductsPurchased"></canvas>
            <!-- <canvas id="chartOfProductsImported"></canvas> -->
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
            <!-- <canvas id="chart_FinanceReport"></canvas> -->
        </div>
    </div>
    <!-- CHARTS ENDS HERE -->

    <!-- CHARTS STARTS HERE -->
    <div class="charts">
        <div class="charts__left">
          <div class="charts__left__title">
              <div>
                <h1>Những sảm phẩm được yêu thích</h1>
                <!-- <p>Từ đầu năm 2021 đến hiện tại</p> -->
              </div>
              <i class="fa fa-usd" aria-hidden="true"></i>
          </div>
          <canvas id="chartOfFavorite"></canvas>
        </div>

        <div class="charts__right">
          <div class="charts__left__title">
            <div>
              <h1>Báo cáo nhân viên</h1>
              <p>Những nhân viên hoạt động năng nổ trong suốt năm nay</p>
            </div>
            <i class="fa fa-usd" aria-hidden="true"></i>
          </div>
          <canvas id="reportStaff"></canvas>
        </div>    
      </div>
    </div>
    <!-- CHARTS ENDS HERE -->     
</div>

<!-- <script src="./include/StatisticManagement/statistic.js"></script> -->

<?php
  //Lay loai hang hoa theo thoi gian
  $sql_get_loaiHH = "SELECT d.NgayGH, l.TenLoaiHang
                    FROM dathang d JOIN chitietdathang c ON d.SoDonDH=c.SoDonDH
                    JOIN hanghoa h ON c.MSHH=h.MSHH
                    JOIN loaihanghoa l ON l.MaLoaiHang=h.MaLoaiHang
                    WHERE d.TrangThaiDH=1";
  $query_get_loaiHH = mysqli_query($con, $sql_get_loaiHH);


  $chip = array(0,0,0,0,0,0,0,0,0,0,0,0);
  $mainboard= array(0,0,0,0,0,0,0,0,0,0,0,0);;
  $ram= array(0,0,0,0,0,0,0,0,0,0,0,0);;
  $vga= array(0,0,0,0,0,0,0,0,0,0,0,0);;

  while($rows_get_loaiHH = mysqli_fetch_array($query_get_loaiHH)){
    $month= substr($rows_get_loaiHH['NgayGH'], strpos($rows_get_loaiHH['NgayGH'], '/')+1, -5);
    $nameOfProduct = $rows_get_loaiHH['TenLoaiHang'];

    // echo $month;
    // echo $nameOfProduct;

    if($nameOfProduct == 'Chip'){
      switch ($month) {
        case "1":
          $chip[0]++;
          break;
        case "2":
          $chip[1]++;
          break;
        case "3":
          $chip[3]++;
          break;
        case "4":
          $chip[3]++;
          break;
        case "5":
          $chip[4]++;
          break;
        case "6":
          $chip[5]++;
          break;
        case "7":
          $chip[6]++;
          break;
        case "8":
          $chip[7]++;
          break;
        case "9":
          $chip[8]++;
          break;
        case "10":
          $chip[9]++;
          break;
        case "11":
          $chip[10]++;
          break;
        default:
          $chip[11]++;
      }
    } elseif($nameOfProduct == 'VGA'){
      switch ($month) {
        case "1":
          $vga[0]++;
          break;
        case "2":
          $vga[1]++;
          break;
        case "3":
          $vga[3]++;
          break;
        case "4":
          $vga[3]++;
          break;
        case "5":
          $vga[4]++;
          break;
        case "6":
          $vga[5]++;
          break;
        case "7":
          $vga[6]++;
          break;
        case "8":
          $vga[7]++;
          break;
        case "9":
          $vga[8]++;
          break;
        case "10":
          $vga[9]++;
          break;
        case "11":
          $vga[10]++;
          break;
        default:
          $vga[11]++;
      }
    }elseif($nameOfProduct == 'MainBoard'){
      switch ($month) {
        case "1":
          $mainboard[0]++;
          break;
        case "2":
          $mainboard[1]++;
          break;
        case "3":
          $mainboard[3]++;
          break;
        case "4":
          $mainboard[3]++;
          break;
        case "5":
          $mainboard[4]++;
          break;
        case "6":
          $mainboard[5]++;
          break;
        case "7":
          $mainboard[6]++;
          break;
        case "8":
          $mainboard[7]++;
          break;
        case "9":
          $mainboard[8]++;
          break;
        case "10":
          $mainboard[9]++;
          break;
        case "11":
          $mainboard[10]++;
          break;
        default:
          $mainboard[11]++;
      }
    }elseif($nameOfProduct == 'Ram'){
      switch ($month) {
        case "1":
          $ram[0]++;
          break;
        case "2":
          $ram[1]++;
          break;
        case "3":
          $ram[3]++;
          break;
        case "4":
          $ram[3]++;
          break;
        case "5":
          $ram[4]++;
          break;
        case "6":
          $ram[5]++;
          break;
        case "7":
          $ram[6]++;
          break;
        case "8":
          $ram[7]++;
          break;
        case "9":
          $ram[8]++;
          break;
        case "10":
          $ram[9]++;
          break;
        case "11":
          $ram[10]++;
          break;
        default:
          $ram[11]++;
      }
    }
  }  



  //San pham duoc yeu thich
  $sql_get_favorite = "SELECT h.TenHH, COUNT(*) AS luotthich FROM sanphamyeuthich s JOIN hanghoa h ON s.MSHH=h.MSHH GROUP BY h.MSHH";
  $query_get_favorite = mysqli_query($con, $sql_get_favorite);
  foreach($query_get_favorite as $data) {
    $name[] = $data['TenHH'];
    $love[] = $data['luotthich'];
  }

  //Luot xu ly don hang cua nhan vien
  $sql_get_billWorkStaff = "SELECT n.HoTenNV, COUNT(*) as luottuongtac FROM dathang d JOIN nhanvien n ON d.MSNV=n.MSNV GROUP BY d.MSNV ORDER BY d.MSNV ASC";
  $query_get_billWorkStaff = mysqli_query($con, $sql_get_billWorkStaff);
  foreach($query_get_billWorkStaff as $data) {
    $nameStaff[] = $data['HoTenNV'];
    $luottuongtac[] = $data['luottuongtac'];
  }

?>



<script>

  // Bieu do loai hang hoa da duoc ban 
  const data = {
    labels: [1,2,3,4,5,6,7,8,9,10,11,12],
    datasets: [{
      label: 'Chip',
      data: <?php echo json_encode($chip) ?>,
      backgroundColor: [
        'rgba(0, 143, 251, 0.5)'
      ],
      borderColor: [
        'rgb(0, 143, 251)'
      ],
      borderWidth: 1
    }, {
      label: 'Mainboard',
      data: <?php echo json_encode($mainboard) ?>,
      backgroundColor: [
        'rgba(0, 227, 150, 0.5)'
      ],
      borderColor: [
        'rgb(0, 227, 150)'
      ],
      borderWidth: 1
    }, {
      label: 'Ram',
      data: <?php echo json_encode($ram) ?>,
      backgroundColor: [
        'rgba(254, 176, 25, 0.5)'
      ],
      borderColor: [
        'rgb(254, 176, 25)'
      ],
      borderWidth: 1
    }, {
      label: 'VGA',
      data: <?php echo json_encode($vga) ?>,
      backgroundColor: [
        'rgba(255,69,96,0.5)'
      ],
      borderColor: [
        'rgb(255,69,96)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {
      scales: {
        y: {
          // stacked: true
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(document.getElementById('chartOfProductsPurchased'),config);



// Bieu do loai hang hoa da duoc ban 
  const data2 = {
    labels: [1,2,3,4,5,6,7,8,9,10,11,12],
    datasets: [{
      label: 'Chip',
      data: <?php echo json_encode($chip) ?>,
      backgroundColor: [
        'rgba(0, 143, 251, 0.5)'
      ],
      borderColor: [
        'rgb(0, 143, 251)'
      ],
      borderWidth: 1
    }, {
      label: 'Mainboard',
      data: <?php echo json_encode($mainboard) ?>,
      backgroundColor: [
        'rgba(0, 227, 150, 0.5)'
      ],
      borderColor: [
        'rgb(0, 227, 150)'
      ],
      borderWidth: 1
    }, {
      label: 'Ram',
      data: <?php echo json_encode($ram) ?>,
      backgroundColor: [
        'rgba(254, 176, 25, 0.5)'
      ],
      borderColor: [
        'rgb(254, 176, 25)'
      ],
      borderWidth: 1
    }, {
      label: 'VGA',
      data: <?php echo json_encode($vga) ?>,
      backgroundColor: [
        'rgba(255,69,96,0.5)'
      ],
      borderColor: [
        'rgb(255,69,96)'
      ],
      borderWidth: 1
    }]
  };

  const config2 = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          // stacked: true
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(document.getElementById('chartOfProductsImported'),config2);



  // Bieu do loai hang hoa da duoc ban 
  const data_favorite = {
    labels: <?php echo json_encode($name) ?>,
    datasets: [{
      label: 'My First Dataset',
      data: <?php echo json_encode($love) ?>,
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(75, 192, 192)',
        'rgb(255, 205, 86)',
        'rgb(201, 203, 207)',
        'rgb(54, 162, 135)',
        'rgb(54, 52, 235)',
        'rgb(154, 162, 235)',
        'rgb(54, 62, 235)'
      ]
    }]
  };

  const config_favorite = {
    type: 'polarArea',
    data: data_favorite,
    options: {
      scales: {
        y: {
          // stacked: true
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(document.getElementById('chartOfFavorite'),config_favorite);
  

  const data_reportStaff = {
    labels: <?php echo json_encode($nameStaff) ?>,
    datasets: [{
      label: 'Xử lý đơn hàng',
      data: <?php echo json_encode($luottuongtac) ?>,
      backgroundColor: [
        'rgba(0, 143, 251, 0.5)'
      ],
      borderColor: [
        'rgb(0, 143, 251)'
      ],
    }]
  };

  const config_reportStaff = {
    type: 'bar',
    data: data_reportStaff,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  };

  var myChart = new Chart(document.getElementById('reportStaff'),config_reportStaff);
  
</script>