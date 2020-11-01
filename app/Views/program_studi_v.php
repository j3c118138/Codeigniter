<section>
    <div class="container">
        <h2>Program Studi</h2>
        <?php if (!empty($session)) {
        ?>
            <div class="alert alert-<?php echo $session['status'] ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
                <?php echo $session['msg']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php } ?>
        <p>
            <a href="<?php echo site_url('Program_Studi/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</a>
        </p>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Aksi</th>
                    <th>Kode Prodi</th>
                    <th>Nama Prodi</th>
                    <th>Ketua Prodi</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($dataProdi as $row) :
                ?>
                    <tr>
                        <th>
                            <a href="<?php echo site_url('Program_Studi/edit/'.$row->kode_prodi); ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Ubah</a>
                            <a href="<?php echo site_url('Program_Studi/delete/'.$row->kode_prodi); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin data akan dihapus?');"><i class="fa fa-trash"></i>Hapus</a>
                        </th>
                        <td><?php echo $row->kode_prodi; ?></td>
                        <td><?php echo $row->nama_prodi; ?></td>
                        <td><?php echo $row->ketua_prodi; ?></td>
                    </tr>
                <?php endforeach;
                if (empty($dataProdi)) {
                ?>

                    <tr>
                        <td colspan="4" class="text-center">Tidak Ada Data</td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</section>