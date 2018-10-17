<div class="page-header">
    <h1>Data Tender</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">        
        <form class="form-inline">
            <input type="hidden" name="m" value="tender" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=tender_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>Kode Paket</th>
            <th>Nama Paket</th>
            <th>Nilai Paket</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <?php
    $q = esc_field($_GET['q']);
    $rows = $db->get_results("SELECT * FROM tb_tender WHERE nama_paket LIKE '%$q%' ORDER BY kode_paket");
    $no=0;
    foreach($rows as $row):?>
    <tr>
        <td><?=$row->kode_paket ?></td>
        <td><?=$row->nama_paket?></td>
        <td><?=$row->nilai_paket?></td>
        <td>
            <a class="btn btn-xs btn-warning" href="?m=tender_ubah&ID=<?=$row->kode_paket?>"><span class="glyphicon glyphicon-edit"></span></a>
            <a class="btn btn-xs btn-danger" href="aksi.php?act=tender_hapus&ID=<?=$row->kode_paket?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
        </td>
    </tr>
    <?php endforeach;
    ?>
    </table>
</div>