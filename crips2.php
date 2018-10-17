<div class="page-header">
    <h1>Nilai Crips</h1>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<form class="form-inline">
    <input type="hidden" name="m" value="crips" />
    <div class="form-group">
        <select class="form-control" name="kode_kriteria2" onchange="this.form.submit()">
        <option value="">Pilih kriteria</option>
        <?=get_kriteria_option($_GET['kode_kriteria2'])?>
        </select>
    </div>
    <div class="form-group">
        <a class="btn btn-primary" href="?m=crips_tambah2&kode_kriteria2=<?=$_GET[kode_kriteria]?>"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
    </div>
</form>
</div>
<table class="table table-bordered table-hover table-striped">
<thead>
    <tr>
        <th>No</th>
        <th>Nama Kriteria</th>
        <th>Nama crips</th>
        <th>Nilai</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
<?php
$q = esc_field($_GET['q']);
$rows = $db->get_results("SELECT c.kode_crips2, c.kode_kriteria2, k.nama_kriteria2, c.nama_crips2, c.nilai2 FROM tb_crips2 c INNER JOIN tb_kriteria2 k ON k.kode_kriteria2=c.kode_kriteria2 WHERE c.kode_kriteria2='$_GET[kode_kriteria2]' ORDER BY k.nama_kriteria2, nilai2");
$no=1;
foreach($rows as $row):?>
<tr>
    <td><?=$no++?></td>
    <td><?=$row->nama_kriteria2?></td>
    <td><?=$row->nama_crips2?></td>
    <td><?=$row->nilai2?></td>
    <td>
        <a class="btn btn-xs btn-warning" href="?m=crips_ubah2&ID=<?=$row->kode_crips2?>&kode_kriteria2=<?=$row->kode_kriteria2?>"><span class="glyphicon glyphicon-edit"></span></a>
        <a class="btn btn-xs btn-danger" href="aksi.php?act=crips_hapus2&ID=<?=$row->kode_crips2?>&kode_kriteria2=<?=$row->kode_kriteria2?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
</tr>
<?php endforeach;
?>
</tbody>
</table>
</div>