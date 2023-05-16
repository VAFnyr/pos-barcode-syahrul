<?php
include_once("../../config/database.php");

session_start();

if ($_SESSION['username'] == "") {
  header('location:../index.php');
}

if (isset($_POST['submit'])){
  $kat_name = $_POST['kategori'];

  if(empty($kat_name)){
    echo "<script> alert (nama kategori tidak boleh kosong)</script>";
  }
  else
  {
    $insert = $pdo->prepare("INSERT INTO tb_category (nm_cat) value(:cat)");
    $insert->bindParam(':cat',$kat_name);


    if ($insert->execute()) {
      echo "<script> alert ('data berhasil ditambah')</script>";
    }

    
  }

}

include_once("../inc/header.php");

?>

<?php
include_once("../inc/admin_sidebar.php");
?> 

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Validation Form</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
 
 <!--  -->

<!-- Main content -->
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col">
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Seluruh Kategori</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action=""></form>
            <div class="card-body">Menampilkan:
              <input type="number" style="width: 50px">Data/Halaman
             

              <div class="float-right">Pencarian:
                <input type="text" class="float-right">
              </div>

              <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Reason</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                  $no = 1;
                  $sql = "SELECT * FROM tb_category";
                  $stmt = $pdo->query($sql);
                  while ($row = $stmt->fetch()) {
                    $id = $row["id"];
                    $cat = $row["nm_cat"];        
                  
                  ?>



                    <tr>
                     
                      <td><?= $no++ ?></td>   
                      <td><?= $cat ?></td>
                      <a href="update.php?id=<?= $id;?>"
                    class="btn btn-info btn-sm">Edit</a>
                    <a href="update.php?id=<?= $id;?>"
                    class="btn btn-danger btn-sm">hapus</a>

                  </tr>


                 <?php } ?>

                  </tbody>
                </table>
              </table>

              <div class="card-body pl-3 pr-3 pb-1">Menampilkan 1 Dari 1 Halaman
                <div class="row float-right">
                  <button type="#" class="page-link text-dark">Previous</button>
                  <button type="#" class="bg-primary page-link text-dark">1</button>
                  <button type="#" class="page-link text-dark">Next</button>
                </div>
              </div>
            </div>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

        <!-- /.card -->

        <!--/.col (left) -->
        <!-- right column -->

        <div class="col">
          <!-- Form Element sizes -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Kategori</h3>
            </div>
            <form method="POST" action="">
            <div class="card-body">
              <label for="">Nama Kategori</label>
              <input class="form-control form-control-sm-2" type="text" id="katInput " name="kategori">
            </div>

            <div class="card-footer">
              <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

  </section>
</div>




  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function() {
    bsCustomFileInput.init();
  });
</script>
</body>

</html>



<?php
include_once("../inc/footer.php");
?> 

 