<div class="page-header">
    <h1>Data Alternatif</h1>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<form class="form-inline">
    <input type="hidden" name="m" value="data_alt" />
    <div class="form-group">
        <select class="form-control" name="kode_paket" onchange="this.form.submit()">
        <option value="">Pilih Paket</option>
        <?=get_tender_option($_GET['kode_paket'])?>
        </select>
    </div>
    <div class="form-group">
        <a class="btn btn-primary" href="?m=data_alt_tambah&kode_paket=<?=$_GET[kode_paket]?>"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
    </div>
</form>
</div>
<table class="table table-bordered table-hover table-striped">
<thead>
    <tr>
        <th>No</th>
        <th>Nama Paket</th>
        <th>Nama Alternatif</th>
        <th>Nilai</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
<?php
$q = esc_field($_GET['q']);
$rows = $db->get_results("SELECT c.kode_alt, c.kode_paket, k.nama_paket, c.nama_alt, c.nilai_alt FROM tb_data_alt c INNER JOIN tb_tender k ON k.kode_paket=c.kode_paket WHERE c.kode_paket='$_GET[kode_paket]' ORDER BY k.nama_paket, nilai_alt");
$no=1;
foreach($rows as $row):?>
<tr>
    <td><?=$no++?></td>
    <td><?=$row->nama_paket?></td>
    <td><?=$row->nama_alt?></td>
    <td><?=$row->nilai_alt?></td>
    <td>
        <a class="btn btn-xs btn-warning" href="?m=data_alt_ubah&ID=<?=$row->kode_alt?>&kode_paket=<?=$row->kode_paket?>"><span class="glyphicon glyphicon-edit"></span></a>
        <a class="btn btn-xs btn-danger" href="aksi.php?act=data_alt_hapus&ID=<?=$row->kode_alt?>&kode_paket=<?=$row->kode_paket?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
</tr>
<?php endforeach;
?>
</tbody>
</table>
</div>