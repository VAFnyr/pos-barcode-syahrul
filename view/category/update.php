<?php
include_once("../../config/database.php");

session_start();

if ($_SESSION['username'] == "") {
  header('location:../index.php');
}

$queryId = $_GET["id"];

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

if  (isset($_POST["update"])){
    $category = $_POST["kategori"];
}
$sql = "UPDATE  tb_category SET nm_cat = '$category'
WHERE id='$queryId'";
$result = $pdo->query($sql);

if($result)
{
    echo "<script> alert('data berhasil diperbarui</script>";
}else
    echo "<script> alert('data tidak dapat diperbarui</script>";

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
    <?php
    $sql = "SELECT * FROM tb_category WHERE id='$queryId'";
    $stmt = $pdo->query($sql);
    while($rows = $stmt ->fetch()){
        $data_nama = $rows ["nm_cat"];
    }
    ?>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col">
          <!-- general form elements -->
          <div class="card">
            
        <div class="col-md-6 mx-auto">
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
              <button type="submit" name="submit" class="btn btn-primary">perbarui</button>
              <a href="index.php" class="btn btn-info">kembali</a>
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

 