<div class="page-header">
    <h1>Hasil Perhitungan</h1>
</div>
<table class="table table-bordered table-hover table-striped">
<thead>
    <tr>
        <th>Rank</th>
        <th>Kode</th>
        <th>Nama Alternatif</th>
        <th>Total</th>
    </tr>
</thead>
<?php
$q = esc_field($_GET['q']);
$rows = $db->get_results("SELECT * FROM tb_alternatif WHERE nama_alternatif LIKE '%$q%' ORDER BY rank");
$no=0;

foreach($rows as $row):?>
<tr>
    <td><?=$row->rank?></td>
    <td><?=$row->kode_alternatif?></td>
    <td><?=$row->nama_alternatif?></td>
    <td><?=$row->total?></td>
</tr>
<?php endforeach;?>
</table>
</div>