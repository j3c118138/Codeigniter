<section>
    <div class="container">
        <h2>Program Studi Form</h2>
        <form method="POST" action="<?php echo site_url('Program_Studi/save'); ?>">
            <div class="form-group">
                <label>Kode</label>
                <input type="text" class="form-control" id="kode" name="kode" required maxlength="1" value="<?php if(!empty($dataProdi)) echo $dataProdi->kode_prodi; ?>">
                <input type="hidden" id="id" name="id" value="<?php if(!empty($dataProdi)) echo $dataProdi->kode_prodi; ?>">
            </div>
            <div class="form-group">
                <label>Program Studi</label>
                <input type="text" class="form-control" id="nama" name="nama" required value="<?php if(!empty($dataProdi)) echo $dataProdi->nama_prodi; ?>">
            </div>
            <div class="form-group">
                <label>Ketua</label>
                <input type="text" class="form-control" id="ketua" name="ketua" required value="<?php if(!empty($dataProdi)) echo $dataProdi->ketua_prodi; ?>">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</section>