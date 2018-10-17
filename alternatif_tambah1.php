<div class="page-header">
    <h1>Tambah Alternatif</h1>
</div>
<form method="post" action="?m=alternatif_tambah1">
    <?php if($_POST) include'aksi.php'?>

    <div class="row">
        <div class="col-sm-6">

<?php if($_POST) include'aksi.php'?>
<form method="post" action="?m=data_alt_tambah&kode_tender=<?=$_GET[kode_paket]?>">
<div class="form-group">
    <label>Tender</label>
    <select class="form-control" name="kode_paket"><?=get_tender_option($_GET[kode_paket])?></select>
</div>

<?php if($_POST) include'aksi.php'?>
<form method="post" action="?m=ahli_tambah&kode_alt=<?=$_GET[kode_alt]?>">
<div class="form-group">
    <label>Alternatif</label>
    <select class="form-control" name="kode_alt"><?=get_data_alt_option($_GET[kode_alt])?></select>
</div>

            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="kode1" value="<?=$_POST[kode1]?>"/>
            </div>
            <div class="form-group">
                <label>Nama Alternatif <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama1" value="<?=$_POST[nama1]?>"/>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" name="keterangan1"><?=$_POST[keterangan1]?></textarea>
            </div>        
        </div>
        <div class="col-md-6">
            <?php foreach($KRITERIA1 as $key => $val):?>
            <div class="form-group">
                <label><?=$val->nama_kriteria1?></label>
                <input class="form-control" type="text" name="nilai1" value="<?=$_POST[nilai1]?>"/>
                </input>
            </div>
            <?php endforeach?>
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
        <a class="btn btn-danger" href="?m=alternatif1"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
    </div>    
</form>