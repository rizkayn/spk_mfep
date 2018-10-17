<div class="page-header">
    <h1>Tambah Alternatif</h1>
</div>
<div class="row">
<div class="col-sm-6">
<?php if($_POST) include'aksi.php'?>
<form method="post" action="?m=data_alt_tambah&kode_tender=<?=$_GET[kode_paket]?>">
<div class="form-group">
    <label>Tender</label>
    <select class="form-control" name="kode_paket"><?=get_tender_option($_GET[kode_paket])?></select>
</div>
<div class="form-group">
    <label>Nama</label>
    <input class="form-control" type="text" name="nama_alt" value="<?=$_POST[nama_alt]?>" />
</div>
<div class="form-group">
    <label>Nilai</label>
    <input class="form-control" type="text" name="nilai_alt" value="<?=$_POST[nilai_alt]?>" />
</div>
<button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
<a class="btn btn-danger" href="?m=data_alt&kode_paket=<?=$_GET[kode_paket]?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
</form>
</div>
</div>