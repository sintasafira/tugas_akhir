<?php include_once 'header.php'; ?>

	<!-- Custom style for this template -->
	<link rel="stylesheet" href="../dashboard.css">
	<!-- Custom styles for this template -->
  <link href="../carousel.css" rel="stylesheet">

  </head>
  <body>
  	<?php include_once 'navbar.php'; ?>


  	<div class="container-fluid">
  		<div class="row">
  			<div class="col-sm-3 col-md-2 sidebar">
  				<ul class="nav nav-sidebar">
  					<li class="active"><a href="#">MENU UTAMA <span class="sr-only">(current)</span></a></li>
  					<li><a href="?module=home"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="?module=siswa"><i class="glyphicon glyphicon-user"></i> Data Siswa</a></li>
            <li><a href="?module=jurusan"><i class="glyphicon glyphicon-th"></i> Data Jurusan</a></li>
            <li><a href="?module=users"><i class="glyphicon glyphicon-list"></i> Data Users</a></li>
  				</ul>
  			</div>

  			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  					
  				<!-- Wrapper for slides -->
  				<div class="carousel-inner" role="listbox">
  					<div class="item active">
            <img src="../images/header.jpeg" alt="...">
  					</div>
  					<marquee>SELAMAT DATANG DI PORTAL KARISMATIF</marquee>
  				</div>

  				</div>

  				<!-- <h1 class="page-header">Dashboard</h1> -->

          <div id="loginbox" style="margin-top: ;" class="mainbox col-md-12">
            <div class="panel panel-info">
              <div class="panel-heading">
                <form action="" method="GET">
                    <input type="hidden" name="module" value="home">
                    <input type="hidden" name="search" value="cari_siswa">
                    <select class="btn btn-success" name="field">
                      <option value="nama_siswa">NAMA SISWA</option>
                      <option value="nomor_ijazah">NOMOR ANGGOTA</option>
                    </select>

                  <div class="pull-right col-md-9">
                      <div class="input-group">
                        <input type="text" name="cari" class="form-control" placeholder="Cari berdasarkan NIA atau Nama..">
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                          </button>
                        </span>
                      </div>
                  </div>
                </form>
                <!-- <a class="btn btn-success" href="?module=siswa_input">> </a> -->

              </div>
              <div style="padding-top: 10px" class="panel-body">
                <br>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>NIS</th>
                      <th>Nomor Anggota</th>
                      <th>Nama</th>
                      <th>Jurusan</th>
                      <th>Lulus Tahun</th>                     
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  include_once '../inc/class.php';
                  $siswa  = new siswa;
                  $records_per_page=10;

                  $query = "SELECT * FROM tbl_siswa";
                  $newquery = $siswa->paging($query,$records_per_page);
                  // penomoran halaman data pada halaman
                  if (isset($_GET['page_no'])) {
                    $page = $_GET['page_no'];
                  }

                  if (empty($page)) {
                    $posisi = 0;
                    $halaman = 1;
                  }else{
                    $posisi = ($page - 1) * $records_per_page;
                  }
                  $no=1+$posisi;
                  if (isset($_GET['search'])=='cari_siswa') {
                    $field = $_GET['field'];
                    $cari = $_GET['cari'];
                    $q = "SELECT * FROM tbl_siswa WHERE $field like '%$cari%'";
                    $newq = $siswa->paging($q,$records_per_page);
                    foreach ($siswa->showData($newq) as $value) {
                    ?>
                    <tr style="text-align: center;">
                      <td><?php echo $no; ?></td>
                      <td><?=$value['nis'];?></td>
                      <td><a href="?module=siswa_tampil&no_ijazah=<?=$value['nomor_ijazah']?>"><?=$value['nomor_ijazah'];?></a></td>
                      <td><?=$value['nama_siswa'];?></td>
                      <td><?=$value['nama_jurusan'];?></td>
                      <td><?=$value['tahun_lulus'];?></td>                    
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                    </tbody>
                  <tr>
                    <td colspan="8" align="center">
                      <div class="pagination-wrap">
                        <?php $siswa->paginglink($query,$records_per_page); ?>
                      </div>
                    </td>
                  </tr>
                </table>
                <?php 
                echo "Jumlah Data Siswa : ";
                $siswa->jumlah($q);                 

                  }else{

                    foreach ($siswa->showData($newquery) as $value) {
                    ?>
                    <tr style="text-align: center;">
                      <td><?php echo $no; ?></td>
                      <td><?=$value['nis'];?></td>
                      <td><a href="?module=siswa_tampil&no_ijazah=<?=$value['nomor_ijazah']?>"><?=$value['nomor_ijazah'];?></a></td>
                      <td><?=$value['nama_siswa'];?></td>
                      <td><?=$value['nama_jurusan'];?></td>
                      <td><?=$value['tahun_lulus'];?></td>                    
                    </tr>
                    <?php
                    $no++;
                    }
                    ?>
                    </tbody>
                  <tr>
                    <td colspan="8" align="center">
                      <div class="pagination-wrap">
                        <?php $siswa->paginglink($query,$records_per_page); ?>
                      </div>
                    </td>
                  </tr>
                </table>
                <?php 
                $query = "SELECT * FROM tbl_siswa";
                echo "Jumlah Data Siswa : ";
                $siswa->jumlah($query); 
                  }
                  ?>                    
                  

              </div>
            </div>
          </div>

  			</div>

  		</div>
  	</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>