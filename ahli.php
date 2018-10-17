<div class="page-header">
    <h1>Data Tenaga Ahli</h1>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<form class="form-inline">
    <input type="hidden" name="m" value="ahli" />
    <div class="form-group">
        <select class="form-control" name="kode_alt" onchange="this.form.submit()">
        <option value="">Pilih Alternatif</option>
        <?=get_data_alt_option($_GET['kode_alt'])?>
        </select>
    </div>
    <div class="form-group">
        <a class="btn btn-primary" href="?m=ahli_tambah&kode_alt=<?=$_GET[kode_alt]?>"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
    </div>
</form>
</div>
<table class="table table-bordered table-hover table-striped">
<thead>
    <tr>
        <th>No</th>
        <th>Nama Alternatif</th>
        <th>Nama Ahli</th>
        <th>Posisi</th>
        <th>Lingkup</th>
        <th>Sertifikat</th>
        <th>Pendidikan</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
<?php
$q = esc_field($_GET['q']);
$rows = $db->get_results("SELECT c.kode_ahli, c.kode_alt, k.nama_alt, c.nama_ahli, c.posisi, c.lingkup, c.sertifikat, c.pendidikan FROM tb_ahli c INNER JOIN tb_data_alt k ON k.kode_alt=c.kode_alt WHERE c.kode_alt='$_GET[kode_alt]' ORDER BY k.nama_alt, posisi, lingkup, sertifikat, pendidikan");
$no=1;
foreach($rows as $row):?>
<tr>
    <td><?=$no++?></td>
    <td><?=$row->nama_alt?></td>
    <td><?=$row->nama_ahli?></td>
    <td><?=$row->posisi?></td>
    <td><?=$row->lingkup?></td>
    <td><?=$row->sertifikat?></td>
    <td><?=$row->pendidikan?></td>
    <td>
        <a class="btn btn-xs btn-warning" href="?m=ahli_ubah&ID=<?=$row->kode_ahli?>&kode_alt=<?=$row->kode_alt?>"><span class="glyphicon glyphicon-edit"></span></a>
        <a class="btn btn-xs btn-danger" href="aksi.php?act=ahli_hapus&ID=<?=$row->kode_ahli?>&kode_alt=<?=$row->kode_alt?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
</tr>
<?php endforeach;
?>
</tbody>
</table>
</div>