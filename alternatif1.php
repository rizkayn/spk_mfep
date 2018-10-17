<div class="page-header">
    <h1>Data Alternatif</h1>
</div>
<div class="panel panel-default">
<div class="panel-heading">
    <form class="form-inline">
        <input type="hidden" name="m" value="alternatif1" />
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
        </div>
        <div class="form-group">
            <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
        </div>
        <div class="form-group">
            <a class="btn btn-primary" href="?m=alternatif_tambah1"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
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
        <?php foreach($KRITERIA1 as $key => $val):?>
        <th><?=$val->nama_kriteria?></th>
        <?php endforeach?>
        <th>Aksi</th>
    </tr>
</thead>
<?php
$q = esc_field($_GET['q']);
$rows = $db->get_results("SELECT * FROM tb_alternatif1 WHERE nama_alternatif1 LIKE '%$q%' ORDER BY kode_alternatif1");
$no=0;

$analisa1 = get_analisa1();

//echo '<pre>'. print_r($analisa, 1) . '</pre>';
foreach($rows as $row):?>
<tr>
    <td><?=++$no ?></td>
    <td><?=$row->kode_alternatif1?></td>
    <td><?=$row->nama_alternatif1?></td>
    <td><?=$row->keterangan1?></td>
    <?php foreach($analisa1[$row->kode_alternatif1] as $k => $v):?>
    <td><?=$v?></td>
    <?php endforeach?>
    <td>
        <a class="btn btn-xs btn-warning" href="?m=alternatif_ubah1&ID=<?=$row->kode_alternatif1?>"><span class="glyphicon glyphicon-edit"></span></a>
        <a class="btn btn-xs btn-danger" href="aksi.php?act=alternatif_hapus1&ID=<?=$row->kode_alternatif1?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
</tr>
<?php endforeach;?>
</table>
</div>
</div>
</div>