<div class="page-header">
    <h1>Tambah Kriteria</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if($_POST) include'aksi.php'?>
        <form method="post" action="?m=kriteria_tambah2">
            <div class="form-group">
                <label>Kode <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name2="kode2" value="<?=$_POST[kode2]?>"/>
            </div>
            <div class="form-group">
                <label>Nama Kriteria <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name2="nama2" value="<?=$_POST[nama2]?>"/>
            </div>
            <div class="form-group">
                <label>Bobot <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name2="bobot2" value="<?=$_POST[bobot2]?>"/>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=kriteria2"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>
            