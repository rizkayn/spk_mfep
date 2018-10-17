<div class="page-header">
    <h1>Tambah Pengalaman</h1>
</div>
<div class="row">
<div class="col-sm-6">
<?php if($_POST) include'aksi.php'?>
<form method="post" action="?m=pengalaman_tambah&kode_ahli=<?=$_GET[kode_ahli]?>">
<div class="form-group">
    <label>Ahli</label>
    <select class="form-control" name="kode_ahli"><?=get_ahli_option($_GET[kode_ahli])?></select>
</div>
<div class="form-group">
    <label>mulai</label>
    <input class="form-control" type="date" name="mulai" value="<?=$_POST[mulai]?>" />
</div>

<div class="form-group">
    <label>sampai</label>
    <input class="form-control" type="date" name="sampai" value="<?=$_POST[sampai]?>" />
</div>

<td>Referensi</td>
<td>
    <div class="form-group">
        <select name="Referensi" class="form-control" id="Referensi" >
            <option value="Ada/Sesuai">Ada/Sesuai</option>
            <option value="Tidak Ada">Tidak Ada</option>
        </select>
    </div>
</td>

<td>Posisi</td>
<td>
	<div class="form-group">
		<select name="posisi" class="form-control" id="posisi" >
            <option value="Team Leader">Team Leader</option>
            <option value="Supervision Engineer">Supervision Engineer</option>
            <option value="Setingkat PME/HE/BE/CI/QE">Setingkat PME/HE/BE/CI/QE</option>
            <option value="Setingkat Sub Proff">Setingkat Sub Proff</option>
        </select>
    </div>
</td>

<td>Lingkup</td>
<td>
	<div class="form-group">
		<select name="lingkup" class="form-control" id="lingkup" >
            <option value="Core Team">Core Team</option>
            <option value="Supervisi">Supervisi</option>
            <option value="Perencanaan">Perencanaan</option>
            <option value="Pelaksana">Pelaksana</option>
        </select>
    </div>
</td>

<button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
<a class="btn btn-danger" href="?m=pengalaman&kode_ahli=<?=$_GET[kode_ahli]?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
</form>
</div>
</div>