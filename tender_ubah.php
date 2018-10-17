<?php
    $row = $db->get_row("SELECT * FROM tb_tender WHERE kode_paket='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Ubah Data Tender</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=tender_ubah&ID=<?=$row->kode_paket?>">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode" readonly="readonly" value="<?=$row->kode_paket?>"/>
            </div>
            <div class="form-group">
                <label>Nama Paket <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" value="<?=$row->nama_paket?>"/>
            </div>
            <div class="form-group">
                <label>Nilai Paket Rp. <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nilai" value="<?=$row->nilai?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=tender"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>