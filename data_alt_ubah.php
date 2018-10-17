<?php
    $row = $db->get_row("SELECT * FROM tb_data_alt WHERE kode_alt='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Ubah Data Alternatif</h1>
</div>
<div class="row">
<div class="col-sm-6">
<?php if($_POST) include'aksi.php'?>
<form method="post" action="?m=data_alt_ubah&ID=<?=$row->kode_alt?>&kode_paket=<?=$row->kode_paket?>">
<div class="form-group">
    <label>Tender</label>
    <select disabled="" class="form-control" name="kode_paket"><?=get_tender_option($row->kode_paket)?></select>
</div>
<div class="form-group">
    <label>Nama</label>
    <input class="form-control" type="text" name="nama_alt" value="<?=$row->nama_alt?>" />
</div>
<div class="form-group">
    <label>Nilai</label>
    <input class="form-control" type="text" name="nilai_alt" value="<?=$row->nilai_alt?>" />
</div>
<button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
<a class="btn btn-danger" href="?m=data_alt&kode_paket=<?=$_GET[kode_paket]?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
</form>
</div>
</div>
