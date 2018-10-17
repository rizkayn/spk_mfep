<?php
    $row = $db->get_row("SELECT * FROM tb_alternatif1 WHERE kode_alternatif1='$_GET[ID]'"); 
?>
<div class="page-header">
    <h1>Ubah Alternatif</h1>
</div>
<form method="post" action="?m=alternatif_ubah1&ID=<?=$row->kode_alternatif1?>">
<?php if($_POST) include'aksi.php'?>
<div class="row">
    <div class="col-sm-6">                
        <div class="form-group">
            <label>Kode <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="kode1" readonly="readonly" value="<?=$row->kode_alternatif1?>"/>
        </div>
        <div class="form-group">
            <label>Nama Alternatif <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="nama1" value="<?=$row->nama_alternatif1?>"/>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" name="keterangan1"><?=$row->keterangan1?></textarea>
        </div>   
    </div>
    <div class="col-md-6">
        <?php 
        $rows = $db->get_results("SELECT * FROM tb_rel_alternatif1 r 
                INNER JOIN tb_kriteria1 k ON k.kode_kriteria1=r.kode_kriteria1
            WHERE kode_alternatif='$row->kode_alternatif1' ORDER BY r.kode_kriteria1");
        foreach($rows as $row):?>
        <div class="form-group">
            <label><?=$row->nama_kriteria1?></label>
            <select class="form-control" name="nilai1[<?=$row->ID?>]">
                <?=get_crips_option($row->kode_kriteria1, $row->kode_crips1)?>
            </select>
        </div>
        <?php endforeach?>
    </div>
</div>
<div class="form-group">
    <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
    <a class="btn btn-danger" href="?m=alternatif1"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
</div> 
</form>