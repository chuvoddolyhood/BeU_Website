<!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src='https://cdn.plot.ly/plotly-2.8.3.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js'></script>

<div id="manage-main-body">
	<?php
		include("include/content-header.php");
    include("include/list-category.php");
	?>
	
  <button type="button" class="btn_add">Xuất file Excel</button>
  <!-- ############################# Modal Thêm nhân viên ######################################## -->
  <div class="modal-bg-add">
    <div class="modal-add">
      <h2>Xuất báo cáo tạo file Excel</h2>
      <a href="./include/StatisticManagement/exportExcel/staffReport.php" class="btn btn-primary">Danh sách thông tin nhân viên</a>
      <a href="./include/StatisticManagement/exportExcel/importProductReport.php" class="btn btn-primary">Danh sách chi tiết nhập hàng</a>
      <a href="./include/StatisticManagement/exportExcel/productReport.php" class="btn btn-primary">Danh sách thông tin hàng hóa</a>
      <span class="modal-close-add">X</spsan>
    </div>
  </div>

  <script type="text/javascript">
    var modalBtn_add = document.querySelector('.btn_add'); //sua ten
    var modalBg_add = document.querySelector('.modal-bg-add');
    var modalClose_add = document.querySelector('.modal-close-add');
    var btn_Close_add = document.querySelector('.modal-close-add-btn');

    modalBtn_add.addEventListener('click', function(){
      modalBg_add.classList.add('bg-active-add');
    });
    
    modalClose_add.addEventListener('click', function(){
      modalBg_add.classList.remove('bg-active-add');
    });

    btn_Close_add.addEventListener('click', function(){
      modalBg_add.classList.remove('bg-active-add');
    });
  </script>

	<!-- CHARTS STARTS HERE -->
  <div class="charts">
    <div class="charts__left">
      <div class="charts__left__title">
        <div>
          <h1>Doanh số bán hàng</h1>
          <p>Từ đầu năm 2022 đến hiện tại</p>
        </div>
        <i class="fa fa-usd" aria-hidden="true"></i>
        </div>
          <canvas id="chart_FinanceReport"></canvas>
          <!-- Plotly chart will be drawn inside this DIV -->
          <!-- <div id='myDiv'></div> -->
        </div>

        <div class="charts__right">
          <?php
            //Tinh tien von
            $sql_get_TienVon = "SELECT SUM(ThanhTien) AS tienvon FROM chitietnhaphang";
            $query_get_TienVon = mysqli_query($con, $sql_get_TienVon);
            $rows_get_TienVon = mysqli_fetch_array($query_get_TienVon);

            //Tinh tien don
            $sql_get_ThuNhap = "SELECT SUM(`TongCong`) AS tiendon, COUNT(*) AS sodon FROM `dathang`";
            $query_get_ThuNhap = mysqli_query($con, $sql_get_ThuNhap);
            $rows_get_ThuNhap = mysqli_fetch_array($query_get_ThuNhap);

          ?>
            <div class="charts__right__title">
                <div>
                    <h1>Báo cáo tài chính</h1>
                    <p>Từ đầu năm 2022 đến hiện tại</p>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
            </div>

            <div class="charts__right__cards">
                <div class="card1">
                    <h1>Tổng vốn</h1>
                    <p><?php echo number_format($rows_get_TienVon['tienvon']) ?> ₫</p>
                </div>

                <div class="card2">
                    <h1>Tổng tiền đơn</h1>
                    <p><?php echo number_format($rows_get_ThuNhap['tiendon']) ?> ₫</p>
                </div>

                <div class="card3">
                  <h1>Tổng Lợi nhuận</h1>
                  <p><?php echo number_format($rows_get_ThuNhap['tiendon'] - $rows_get_TienVon['tienvon']) ?> ₫</p>
                </div>

                <div class="card4">
                  <h1>Tổng Số đơn</h1>
                  <p><?php echo $rows_get_ThuNhap['sodon'] ?></p>
                </div>
            </div>
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
              <h1>Lượng hàng được mua trong năm</h1>
              <p>Từ đầu năm 2022 đến hiện tại</p>
            </div>
            <i class="fa fa-usd" aria-hidden="true"></i>
          </div>
          <canvas id="chartOfProductsPurchased"></canvas>
          <div class="charts__left__title">
            <div>
              <h1>Nhân viên hoạt động năng nổ</h1>
              <p>Từ đầu năm 2022 đến hiện tại</p>
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
  $mainboard= array(0,0,0,0,0,0,0,0,0,0,0,0);
  $ram= array(0,0,0,0,0,0,0,0,0,0,0,0);
  $vga= array(0,0,0,0,0,0,0,0,0,0,0,0);



  while($rows_get_loaiHH = mysqli_fetch_array($query_get_loaiHH)){
    $month= substr($rows_get_loaiHH['NgayGH'], strpos($rows_get_loaiHH['NgayGH'], '/')+1, -5);
    $nameOfProduct = $rows_get_loaiHH['TenLoaiHang'];

    // echo '#'.$month;
    // echo $nameOfProduct;

    //Tinh so luong san pham duoc mua theo tung thang
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


  //Tinh tien don moi thang
  $tiendontheotungthang = array(0,0,0,0,0,0,0,0,0,0,0,0);

  $sql_get_tiendon = "SELECT `TongCong`,`NgayGH` FROM dathang WHERE `TrangThaiDH`=1";
  $query_get_tiendon = mysqli_query($con, $sql_get_tiendon);

  while($rows_get_tiendon = mysqli_fetch_array($query_get_tiendon)){
    $month_tiendon= substr($rows_get_loaiHH['NgayGH'], strpos($rows_get_loaiHH['NgayGH'], '/')+1, -5);
    // echo 'thangnayne'.$month;
    switch ($month_tiendon) {
      case "1":
        $tiendontheotungthang[0]+=$rows_get_tiendon['TongCong'];
        break;
      case "2":
        $tiendontheotungthang[1]+=$rows_get_tiendon['TongCong'];
        break;
      case "3":
        $tiendontheotungthang[2]+=$rows_get_tiendon['TongCong'];
        break;
      case "4":
        $tiendontheotungthang[3]+=$rows_get_tiendon['TongCong'];
        break;
      case "5":
        $tiendontheotungthang[4]+=$rows_get_tiendon['TongCong'];
        break;
      case "6":
        $tiendontheotungthang[5]+=$rows_get_tiendon['TongCong'];
        break;
      case "7":
        $tiendontheotungthang[6]+=$rows_get_tiendon['TongCong'];
        break;
      case "8":
        $tiendontheotungthang[7]+=$rows_get_tiendon['TongCong'];
        break;
      case "9":
        $tiendontheotungthang[8]+=$rows_get_tiendon['TongCong'];
        break;
      case "10":
        $tiendontheotungthang[9]+=$rows_get_tiendon['TongCong'];
        break;
      case "11":
        $tiendontheotungthang[10]+=$rows_get_tiendon['TongCong'];
        break;
      default:
        $tiendontheotungthang[11]+=$rows_get_tiendon['TongCong'];
    }
  }

  // foreach($tiendontheotungthang as $data ) {
  //   echo "thang=" . $data;
  // }

  //Tinh tien von moi thang
  $tienvontheotungthang = array(0,0,0,0,0,0,0,0,0,0,0,0);
  //Loi nhuan theo tung thang
  $loinhuantheotungthang = array(0,0,0,0,0,0,0,0,0,0,0,0);

  $sql_get_tienvon = "SELECT `ThanhTien`,`NgayNhap` FROM `chitietnhaphang` ";
  $query_get_tienvon = mysqli_query($con, $sql_get_tienvon);

  while($rows_get_tienvon = mysqli_fetch_array($query_get_tienvon)){
    $month_tienvon= substr($rows_get_tienvon['NgayNhap'], strpos($rows_get_tienvon['NgayNhap'], '-')+1, strpos($rows_get_tienvon['NgayNhap'], '-'));
    // echo 'thangnayne'.$month;
    switch ($month_tienvon) {
      case "01":
        $tienvontheotungthang[0]+=$rows_get_tienvon['ThanhTien'];
        break;
      case "02":
        $tienvontheotungthang[1]+=$rows_get_tienvon['ThanhTien'];
        break;
      case "03":
        $tienvontheotungthang[2]+=$rows_get_tienvon['ThanhTien'];
        break;
      case "04":
        $tienvontheotungthang[3]+=$rows_get_tienvon['ThanhTien'];
        break;
      case "05":
        $tienvontheotungthang[4]+=$rows_get_tienvon['ThanhTien'];
        break;
      case "06":
        $tienvontheotungthang[5]+=$rows_get_tienvon['ThanhTien'];
        break;
      case "07":
        $tienvontheotungthang[6]+=$rows_get_tienvon['ThanhTien'];
        break;
      case "08":
        $tienvontheotungthang[7]+=$rows_get_tienvon['ThanhTien'];
        break;
      case "09":
        $tienvontheotungthang[8]+=$rows_get_tienvon['ThanhTien'];
        break;
      case "10":
        $tienvontheotungthang[9]+=$rows_get_tienvon['ThanhTien'];
        break;
      case "11":
        $tienvontheotungthang[10]+=$rows_get_tienvon['ThanhTien'];
        break;
      default:
        $tienvontheotungthang[11]+=$rows_get_tienvon['ThanhTien'];
    }

    switch ($month_tienvon) {
      case "01":
        $loinhuantheotungthang[0] = $tiendontheotungthang[0] - $tienvontheotungthang[0];
        break;
      case "02":
        $loinhuantheotungthang[1] = $tiendontheotungthang[1] - $tienvontheotungthang[1];
        break;
      case "03":
        $loinhuantheotungthang[2] = $tiendontheotungthang[2] - $tienvontheotungthang[2];
        break;
      case "04":
        $loinhuantheotungthang[3] = $tiendontheotungthang[3] - $tienvontheotungthang[3];
        break;
      case "05":
        $loinhuantheotungthang[4] = $tiendontheotungthang[4] - $tienvontheotungthang[4];
        break;
      case "06":
        $loinhuantheotungthang[5] = $tiendontheotungthang[5] - $tienvontheotungthang[5];
        break;
      case "07":
        $loinhuantheotungthang[6] = $tiendontheotungthang[6] - $tienvontheotungthang[6];
        break;
      case "08":
        $loinhuantheotungthang[7] = $tiendontheotungthang[7] - $tienvontheotungthang[7];
        break;
      case "09":
        $loinhuantheotungthang[8] = $tiendontheotungthang[8] - $tienvontheotungthang[8];
        break;
      case "10":
        $loinhuantheotungthang[9] = $tiendontheotungthang[9] - $tienvontheotungthang[9];
        break;
      case "11":
        $loinhuantheotungthang[10] = $tiendontheotungthang[10] - $tienvontheotungthang[10];
        break;
      default:
      $loinhuantheotungthang[11] = $tiendontheotungthang[11] - $tienvontheotungthang[11];
    }
  }

  // foreach($loinhuantheotungthang as $data ) {
  //   echo "loinhuanthang=" . $data;
  // }

  
  
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



  const data_FinanceReport = {
    labels: [1,2,3,4,5,6,7,8,9,10,11,12],
    datasets: [{
      type: 'bar',
      label: 'Tiền vốn',
      data: <?php echo json_encode($tienvontheotungthang) ?>,
      borderColor: 'rgb(255, 99, 132)',
      backgroundColor: 'rgba(255, 99, 132, 0.2)'
    }, {
      type: 'bar',
      label: 'Tiền đơn',
      data: <?php echo json_encode($tiendontheotungthang) ?>,
      fill: false,
      borderColor: 'rgb(54, 162, 235)'
    },{
      type: 'line',
      label: 'Lợi nhuận',
      data: <?php echo json_encode($loinhuantheotungthang) ?>,
      fill: false,
      borderColor: 'rgb(54, 162, 235)'
    }]
  };

  const config_FinanceReport = {
    type: 'bar',
    data: data_FinanceReport,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  };

  var myChart = new Chart(document.getElementById('chart_FinanceReport'),config_FinanceReport);






  d3.json('https://raw.githubusercontent.com/plotly/datasets/master/3d-ribbon.json', function(figure){

  var trace1 = {
  x:figure.data[0].x, y:figure.data[0].y, z:figure.data[0].z,
  name: '',
  colorscale: figure.data[0].colorscale,
  type: 'surface',
  showscale: false
  }
  var trace2 = {
  x:figure.data[1].x, y:figure.data[1].y, z:figure.data[1].z,
  name: '',
  colorscale: figure.data[1].colorscale,
  type: 'surface',
  showscale: false
  }
  var trace3 = {
  x:figure.data[2].x, y:figure.data[2].y, z:figure.data[2].z,
  colorscale: figure.data[2].colorscale,
  type: 'surface',
  showscale: false
  }
  var trace4 = {
  x:figure.data[3].x, y:figure.data[3].y, z:figure.data[3].z,
  colorscale: figure.data[3].colorscale,
  type: 'surface',
  showscale: false
  }
  var trace5 = {
  x:figure.data[4].x, y:figure.data[4].y, z:figure.data[4].z,
  colorscale: figure.data[4].colorscale,
  type: 'surface',
  showscale: false
  }
  var trace6 = {
  x:figure.data[5].x, y:figure.data[5].y, z:figure.data[5].z,
  colorscale: figure.data[5].colorscale,
  type: 'surface',
  showscale: false
  }
  var trace7 = {
  x:figure.data[6].x, y:figure.data[6].y, z:figure.data[6].z,
  name: '',
  colorscale: figure.data[6].colorscale,
  type: 'surface',
  showscale: false
  }

  var data = [trace1, trace2, trace3, trace4, trace5, trace6, trace7];

  var layout = {
  title: 'Số lượng sản phẩm nhập vào trong năm 2022',
  showlegend: false,
  autosize: true,
  width: 500,
  height: 500,
  scene: {
      xaxis: {title: 'Loại hàng'},
      yaxis: {title: 'Tháng'},
      zaxis: {title: 'Số lượng'}
  }
  };

  //Plotly chart will be drawn inside this DIV
  // Plotly.newPlot('myDiv', data, layout);
  });


  
</script>