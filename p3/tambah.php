<?php include('koneksi.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>J3C118138 Additya Rivaldo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="../css/animate.css">

	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">
	<link rel="stylesheet" href="../css/magnific-popup.css">

	<link rel="stylesheet" href="../css/aos.css">

	<link rel="stylesheet" href="../css/ionicons.min.css">

	<link rel="stylesheet" href="../css/flaticon.css">
	<link rel="stylesheet" href="../css/icomoon.css">
	<link rel="stylesheet" href="../css/style.css">
    
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
		<div class="container">
            <a class="navbar-brand" href="../index.html"><span>A</span>dditya</a>
		</div>
	</nav>
    <div class="container" style="margin-top:7%">
        <section class="hero-wrap js-fullheight">
        <h2>Tambah Mahasiswa</h2>

        <hr>

        <?php
        if (isset($_POST['submit'])) {
            $nim                        = $_POST['nim'];
            $nama                       = $_POST['nama'];
            $jenis_kelamin              = $_POST['jenis_kelamin'];
            $agama                      = $_POST['agama'];
            $olahraga                   = implode(", ", $_POST['olahraga']);
            $ekstensi_diperbolehkan     = array('png', 'jpg');
            $file_nama                  = $_FILES['file']['name'];
            $x                          = explode('.', $file_nama);
            $ekstensi                   = strtolower(end($x));
            $ukuran                     = $_FILES['file']['size'];
            $file_tmp                   = $_FILES['file']['tmp_name'];

            $cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'") or die(mysqli_error($koneksi));

            if (mysqli_num_rows($cek) == 0) {
                if (in_array($ekstensi, $ekstensi_diperbolehkan) == true) {
                    if ($ukuran < 1044070) {
                        move_uploaded_file($file_tmp, 'file/' . $file_nama);
                        $sql = mysqli_query($koneksi, "INSERT INTO mahasiswa(nim, nama, jenis_kelamin, agama, olahraga, nama_file) VALUES('$nim', '$nama', '$jenis_kelamin', '$agama', '".$olahraga."', '$file_nama')") or die(mysqli_error($koneksi));

                        if ($sql) {
                            echo '<script>alert("Berhasil menambahkan data."); document.location="index.php";</script>';
                        } else {
                            echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
                        }
                    } else {
                        echo '<div class="alert alert-warning">UKURAN FILE TERLALU BESAR</div>';
                    }
                } else {
                    echo '<div class="alert alert-warning">EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN</div>';
                }
            } else {
                echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
            }
        }
        ?>

        <form action="tambah.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" name="nim" class="form-control" size="9" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="Laki-laki" required>
                        <label class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="Perempuan" required>
                        <label class="form-check-label">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Agama</label>
                <div class="col-sm-10">
                    <select class="form-control" name="agama" required>
                        <option value="Islam" selected>Islam</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Olahraga</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="olahraga[]" value="Sepak Bola">
                        <label class="form-check-label">
                            Sepak Bola
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="olahraga[]"  value="Basket">
                        <label class="form-check-label">
                            Basket
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="olahraga[]"  value="Futsal">
                        <label class="form-check-label">
                            Futsal
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="olahraga[]" value="Renang">
                        <label class="form-check-label">
                            Renang
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="olahraga[]"  value="Badminton">
                        <label class="form-check-label">
                            Badminton
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" name="file" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">&nbsp;</label>
                <div class="col-sm-10">
                    <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                </div>
            </div>
        </form>
        </section>
    </div>

    <!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" /></svg>
    </div>


	
    <!-- Optional JavaScript -->
    <script src="../js/jquery.min.js"></script>
	<script src="../js/jquery-migrate-3.0.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.easing.1.3.js"></script>
	<script src="../js/jquery.waypoints.min.js"></script>
	<script src="../js/jquery.stellar.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/aos.js"></script>
	<script src="../js/jquery.animateNumber.min.js"></script>
	<script src="../js/scrollax.min.js"></script>

	<script src="../js/main.js"></script>
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    

</body>

</html>