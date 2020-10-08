<section>
    <div class="container">
        <h2>Program Studi</h2>
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

                <?php foreach($dataProdi as $row): 
                ?>
                <tr>
                    <th>
                        <a href="" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Ubah</a>
                        <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Hapus</a>
                    </th>
                    <td><?php echo $row->kode_prodi; ?></td>
                    <td><?php echo $row->nama_prodi; ?></td>
                    <td><?php echo $row->ketua_prodi; ?></td>
                </tr>
                <?php endforeach; 
                ?>
            </tbody>
        </table>
    </div>
</section>