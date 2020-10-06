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
            <a class="nav-link" href="tambah.php">Tambah Data</a>
            <table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Olahraga</th>
                        <th>Foto</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "koneksi.php";
                    //query ke database SELECT tabel mahasiswa
                    $sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id ASC") or die(mysqli_error($koneksi));
                    //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                    if (mysqli_num_rows($sql) > 0) {
                        //membuat variabel $no untuk menyimpan nomor urut
                        $no = 1;
                        //melakukan perulangan while dengan dari dari query $sql
                        while ($data = mysqli_fetch_assoc($sql)) {
                            //menampilkan data perulangan
                            echo '
                            <tr>
                                <td>' . $no . '</td>
                                <td>' . $data['nim'] . '</td>
                                <td>' . $data['nama'] . '</td>
                                <td>' . $data['jenis_kelamin'] . '</td>
                                <td>' . $data['agama'] . '</td>
                                <td>' . $data['olahraga'] . '</td>
                                <td><center><img src=' . "file/" . $data['nama_file'] . ' width="50px"></td>
                                <td>
                                    <a href="edit.php?id=' . $data['id'] . '" class="badge badge-warning">Edit</a>
                                    <a href="delete.php?id=' . $data['id'] . '" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
                                </td>
                            </tr>
                            ';
                            $no++;
                        }
                        //jika query menghasilkan nilai 0
                    } else {
                        echo '
                        <tr>
                            <td colspan="6">Tidak ada data.</td>
                        </tr>
                        ';
                    }
                    ?>
                <tbody>
            </table>
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