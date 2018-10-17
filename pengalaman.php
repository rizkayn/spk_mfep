<div class="page-header">
    <h1>Data Pengalaman Ahli</h1>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<form class="form-inline">
    <input type="hidden" name="m" value="pengalaman" />
    <div class="form-group">
        <select class="form-control" name="kode_ahli" onchange="this.form.submit()">
        <option value="">Pilih Ahli</option>
        <?=get_ahli_option($_GET['kode_ahli'])?>
        </select>
    </div>
    <div class="form-group">
        <a class="btn btn-primary" href="?m=pengalaman_tambah&kode_ahli=<?=$_GET[kode_ahli]?>"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
    </div>
</form>
</div>
<table class="table table-bordered table-hover table-striped">
<thead>
    <tr>
        <th>No</th>
        <th>Nama Ahli</th>
        <th>Mulai</th>
        <th>Sampai</th>
        <th>Referensi</th>
        <th>Posisi</th>
        <th>Lingkup</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
<?php
$q = esc_field($_GET['q']);
$rows = $db->get_results("SELECT c.kode_pengalaman, c.kode_ahli, k.nama_ahli, c.mulai, c.sampai, c.referensi, c.posisi, c.lingkup FROM tb_pengalaman c INNER JOIN tb_ahli k ON k.kode_ahli=c.kode_ahli WHERE c.kode_ahli='$_GET[kode_ahli]' ORDER BY k.nama_ahli,mulai,sampai,referensi,posisi,lingkup");
$no=1;
foreach($rows as $row):?>
<tr>
    <td><?=$no++?></td>
    <td><?=$row->nama_ahli?></td>
    <td><?=$row->mulai?></td>
    <td><?=$row->sampai?></td>
    <td><?=$row->referensi?></td>
    <td><?=$row->posisi?></td>
    <td><?=$row->lingkup?></td>
    <td>
        <a class="btn btn-xs btn-warning" href="?m=pengalaman_ubah&ID=<?=$row->kode_pengalaman?>&kode_ahli=<?=$row->kode_ahli?>"><span class="glyphicon glyphicon-edit"></span></a>
        <a class="btn btn-xs btn-danger" href="aksi.php?act=pengalaman_hapus&ID=<?=$row->kode_pengalaman?>&kode_ahli=<?=$row->kode_ahli?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
</tr>
<?php endforeach;
?>
</tbody>
</table>
</div>