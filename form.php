<?php
  include "tampilkan_data.php";
  include "edit_data.php";

  $data_edit = mysqli_fetch_assoc($proses_ambil);
?>

<html>
    <header>
        <title>
        </title>

        <link href="library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="library/assets/styles.css" rel="stylesheet" media="screen">
        <script src="library/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <link href="https://cdn.jsdeliver.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel = "stylesheet">
    </header>
            
        <body>

            <div class="span9" id="content">
                      <!-- morris stacked chart -->
                    <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data Mahasiswa</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                  
                                <?php
                                    if (isset($_GET['id']) && $_GET['id'] != ''){
                                        //proses edit data
                                ?>  
                                    <form action="edit_data.php?id=<?php echo $data_edit['id'] ?>&proses=1" method="POST">
                                <?php
                                    }else{
                                ?>
                                  <form action="proses.php" method="POST">
                                <?php
                                    }
                                ?>
                                  
                                      <fieldset>
                                        <legend>Input prodi Mahasiswa</legend>

                                        <div class="control-group">
                                          <label class="control-label" for="nama">NAMA DEPAN MAHASISWA : </label>
                                          <div class="controls">
                                            <input type="hidden" class="input-xlarge focused" id="nama" name="nama" 
                                            value="<?php if($data_edit['id'] != "") echo $data_edit['id'];?>">

                                            <input type="text" class="input-xlarge focused" id="nama" name="nama" 
                                            value="<?php if (isset($data_edit['nama_mahasiswa']) && $data_edit['nama_mahasiswa'] != "") echo $data_edit['nama_mahasiswa']; ?>">
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <label class="control-label" for="namablkng">NAMA BELAKANG MAHASISWA : </label>
                                          <div class="controls">
                                            <input type="hidden" class="input-xlarge focused" id="namablkng" name="namablkng" 
                                            value="<?php if($data_edit['id'] != "") echo $data_edit['id'];?>">

                                            <input type="text" class="input-xlarge focused" id="namablkng" name="namablkng" 
                                            value="<?php if (isset($data_edit['namamhs']) && $data_edit['namamhs'] != "") echo $data_edit['namamhs']; ?>">
                                          </div>
                                        </div>
                                            
                                        <div class="control-group">
                                              <label class="control-label" for="prodi ">PRODI MAHASISWA : </label>
                                              <div class="controls">
                                                <input type="text" class="input-xlarge focused" id="prodi" name="prodi" 
                                                value="<?php if (isset($data_edit['prodi']) && $data_edit['prodi'] != "") echo $data_edit['prodi'];?>">
                                          </div>

                                        <!-- <div class="control-group">
                                          <label class="control-label" for="ulangi">ULANGI : </label>
                                          <div class="controls">
                                            <input type="text" class="input-xlarge focused" id="ulangi" name="ulangi" value=""\>
                                            </div>
                                        </div> -->

                                        <div class="form-actions">
                                          <button type="submit" class="btn btn-primary">PROSES</button>
                                          <button type="reset" class="btn">Cancel</button>
                                        </div>
                                </form>

                                </div>   
                                
                                <div class="row-fluid">
                        <!-- block -->
                        <!-- <form method="GET" action="form.php" style="text-align: left;">
                                  <label>Cari : </label>
                                  <input type="text" name="cari"> 
                                  <input type="submit" value="Search">
                                </form> -->

                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data Mahasiswa</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table class="table">
						              <thead>
						                <tr>
						                  <th>NPM</th>
						                  <th>Nama Depan Mahasiswa</th>
                              <th>Nama Belakang Mahasiswa</th>
						                  <th>Prodi Mahasiswa</th>
						                  <th>Aksi</th>
						                </tr>
						              </thead>
						              <tbody>

                          <?php
                                while($data = mysqli_fetch_assoc($proses)){
                          ?>

						                <tr>
						                  <td><?php echo $data['id'] ?></td>
						                  <td><?php echo $data['nama_mahasiswa'] ?></td>
                              <td><?php echo $data['namamhs'] ?></td>
						                  <td><?php echo $data['prodi'] ?></td>
						                  <td><a href="form.php?id=<?php echo $data['id']; ?>"> Edit </a>|
						                  <a href="hapus_data.php?id=<?php echo $data['id']; ?>"> Hapus </a></td>
						                </tr>
						              <?php
                                }
                          ?>
						              </tbody>
						            </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                        <div class = "col-md-7">
                          <form action="" method="GET">
                            <div class="input-group mb-3">
                              <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search Data">
                              <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                          </form>
                        </div>
                        
                          <div class="col-md-12">
                            <div class="card mt-4">
                                <div class="card-body">
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>NPM</th>
                                        <th>Nama Depan</th>
                                        <th>Nama Belakang</th>
                                        <th>Prodi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        $con = mysqli_connect("localhost", "root", "", "kampusklik");

                                        if(isset($_GET['search'])){
                                          $filtervalues = $_GET['search'];
                                          $query = "SELECT * FROM mahasiswapbw WHERE CONCAT(namamhs, prodi) LIKE '%$filtervalues%' ";
                                          $query_run = mysqli_query($con, $query);

                                          if(mysqli_num_rows($query_run) > 0){
                                            foreach($query_run as $items){
                                              ?>
                                              <tr>
                                                <td><?= $items['id']; ?></td>
                                                <td><?= $items['nama_mahasiswa']; ?></td>
                                                <td><?= $items['namamhs']; ?></td>
                                                <td><?= $items['prodi']; ?></td>
                                              </tr>
                                              <?php
                                            }
                                          } else{
                                            ?>

                                            <tr>
                                              <td colspan="4">Data Tidak Ditemukan</td>
                                            </tr>

                                            <?php
                                          }
                                        }
                                      ?>
                                      
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                          </div>
                        
                            </div>
                        </div>    
                    </div>    
            </div>       
        </body>
</html>