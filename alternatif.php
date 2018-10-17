<div class="page-header">
    <h1>Data Alternatif</h1>
</div>
<div class="panel panel-default">
<div class="panel-heading">
    <form class="form-inline">
        <input type="hidden" name="m" value="alternatif" />
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
        </div>
        <div class="form-group">
            <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
        </div>
        <div class="form-group">
            <a class="btn btn-primary" href="?m=alternatif_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
        </div>
    </form>
</div>



<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Alternatif</h3>
    </div>
    <div class="table-responsive"> 

<table class="table table-bordered table-hover table-striped">
<thead>
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama Alternatif</th>
        <th>Keterangan</th>
        <?php foreach($KRITERIA as $key => $val):?>
        <th><?=$val->nama_kriteria?></th>
        <?php endforeach?>
        <th>Aksi</th>
    </tr>
</thead>
<?php
$q = esc_field($_GET['q']);
$rows = $db->get_results("SELECT * FROM tb_alternatif WHERE nama_alternatif LIKE '%$q%' ORDER BY kode_alternatif");
$no=0;

$analisa = get_analisa();

//echo '<pre>'. print_r($analisa, 1) . '</pre>';
foreach($rows as $row):?>
<tr>
    <td><?=++$no ?></td>
    <td><?=$row->kode_alternatif?></td>
    <td><?=$row->nama_alternatif?></td>
    <td><?=$row->keterangan?></td>
    <?php foreach($analisa[$row->kode_alternatif] as $k => $v):?>
    <td><?=$v?></td>
    <?php endforeach?>
    <td>
        <a class="btn btn-xs btn-warning" href="?m=alternatif_ubah&ID=<?=$row->kode_alternatif?>"><span class="glyphicon glyphicon-edit"></span></a>
        <a class="btn btn-xs btn-danger" href="aksi.php?act=alternatif_hapus&ID=<?=$row->kode_alternatif?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
</tr>
<?php endforeach;?>
</table>
</div>
</div>
</div>