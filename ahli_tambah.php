<div class="page-header">
    <h1>Tambah Ahli</h1>
</div>
<div class="row">
<div class="col-sm-6">
<?php if($_POST) include'aksi.php'?>
<form method="post" action="?m=ahli_tambah&kode_alt=<?=$_GET[kode_alt]?>">
<div class="form-group">
    <label>Alternatif</label>
    <select class="form-control" name="kode_alt"><?=get_data_alt_option($_GET[kode_alt])?></select>
</div>
<div class="form-group">
    <label>Nama</label>
    <input class="form-control" type="text" name="nama_ahli" value="<?=$_POST[nama_ahli]?>" />
</div>



<td>Posisi</td>
<td>
	<div class="form-group">
		<select name="posisi" class="form-control" id="posisi" >
            <option value="Team Leader">Team Leader</option>
            <option value="Supervision Engineer">Supervision Engineer</option>
            <option value="Setingkat PME/HE/BE/CI/QE">Setingkat PME/HE/BE/CI/QE</option>
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
        </select>
    </div>
</td>

<td>Sertifikat</td>
<td>
	<div class="form-group">
		<select name="sertifikat" class="form-control" id="sertifikat" >
            <option value="Ada/Sesuai">Ada/Sesuai</option>
            <option value="Tidak Ada">Tidak Ada</option>
        </select>
    </div>
</td>

<td>Pendidikan</td>
<td>
	<div class="form-group">
		<select name="pendidikan" class="form-control" id="pendidikan" >
            <option value="Setara KAK">Setara KAK</option>
            <option value="Dibawah KAK">Dibawah KAK</option>
        </select>
    </div>
</td>
<button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
<a class="btn btn-danger" href="?m=ahli&kode_alt=<?=$_GET[kode_alt]?>"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
</form>
</div>
</div>