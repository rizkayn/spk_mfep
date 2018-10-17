<?php
    $row = $db->get_row("SELECT * FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Ubah Alternatif</h1>
</div>
<form method="post" action="?m=alternatif_ubah&ID=<?=$row->kode_alternatif?>">
<?php if($_POST) include'aksi.php'?>
<div class="row">
    <div class="col-sm-6">                
        <div class="form-group">
            <label>Kode <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="kode" readonly="readonly" value="<?=$row->kode_alternatif?>"/>
        </div>
        <div class="form-group">
            <label>Nama Alternatif <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="nama" value="<?=$row->nama_alternatif?>"/>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" name="keterangan"><?=$row->keterangan?></textarea>
        </div>   
    </div>
    <div class="col-md-6">
        <?php 
        $rows = $db->get_results("SELECT * FROM tb_rel_alternatif r 
                INNER JOIN tb_kriteria k ON k.kode_kriteria=r.kode_kriteria
            WHERE kode_alternatif='$row->kode_alternatif' ORDER BY r.kode_kriteria");
        foreach($rows as $row):?>
        <div class="form-group">
            <label><?=$row->nama_kriteria?></label>
            <select class="form-control" name="nilai[<?=$row->ID?>]">
                <?=get_crips_option($row->kode_kriteria, $row->kode_crips)?>
            </select>
        </div>
        <?php endforeach?>
    </div>
</div>
<div class="form-group">
    <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
    <a class="btn btn-danger" href="?m=alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
</div> 
</form>