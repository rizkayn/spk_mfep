<?php
require_once 'functions.php';

/** LOGIN */ 
if ($mod=='login'){
    $user = esc_field($_POST['user']);
    $pass = esc_field($_POST['pass']);
    
    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$user' AND pass='$pass'");
    if($row){
        $_SESSION['login'] = $row->user;
        redirect_js("index.php");
    } else{
        print_msg("Salah kombinasi username dan password.");
    }          
} elseif($act=='logout'){
    unset($_SESSION[login]);
    header("location:index.php?m=login");
} else if ($mod=='password'){
    $pass1 = $_POST[pass1];
    $pass2 = $_POST[pass2];
    $pass3 = $_POST[pass3];
    
    $row = $db->get_row("SELECT * FROM tb_admin WHERE user='$_SESSION[login]' AND pass='$pass1'");        
    
    if($pass1=='' || $pass2=='' || $pass3=='')
        print_msg('Field bertanda * harus diisi.');
    elseif(!$row)
        print_msg('Password lama salah.');
    elseif( $pass2 != $pass3 )
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else{        
        $db->query("UPDATE tb_admin SET pass='$pass2' WHERE user='$_SESSION[login]'");                    
        print_msg('Password berhasil diubah.', 'success');
    }
} 

/** ALTERNATIF */
elseif($mod=='alternatif_tambah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    if($kode=='' || $nama=='')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM tb_alternatif WHERE kode_alternatif='$kode'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO tb_alternatif (kode_alternatif, nama_alternatif, keterangan) VALUES ('$kode', '$nama', '$keterangan')");
        foreach($_POST[nilai] as $key => $val){
            $db->query("INSERT INTO tb_rel_alternatif(kode_alternatif, kode_kriteria, kode_crips) VALUES ('$kode', '$key', '$val')");            
        }                           
        redirect_js("index.php?m=alternatif");
    }
} else if($mod=='alternatif_ubah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    if($kode=='' || $nama=='')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_alternatif SET nama_alternatif='$nama', keterangan='$keterangan' WHERE kode_alternatif='$_GET[ID]'");
        foreach($_POST[nilai] as $key => $val){
            $db->query("UPDATE tb_rel_alternatif SET kode_crips='$val' WHERE ID='$key'");            
        } 
        redirect_js("index.php?m=alternatif");
    }
} else if ($act=='alternatif_hapus'){
    $db->query("DELETE FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_alternatif WHERE kode_alternatif='$_GET[ID]'");
    header("location:index.php?m=alternatif");
} 

/** ALTERNATIF 1*/
elseif($mod=='alternatif_tambah1'){
    $kode1 = $_POST['kode1'];
    $nama1 = $_POST['nama1'];
    $keterangan1 = $_POST['keterangan1'];
    $nilai1 = $_POST['nilai1'];

    if($kode1=='' || $nama1=='' || $nilai1=='')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM tb_alternatif1 WHERE kode_alternatif1='$kode1'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO tb_alternatif1 (kode_alternatif1, nama_alternatif1, keterangan1) VALUES ('$kode1', '$nama1', '$keterangan1')");
        foreach($_POST[nilai1] as $key => $val){
            $db->query("INSERT INTO tb_rel_alternatif1(kode_alternatif1, kode_kriteria1, kode_crips1) VALUES ('$kode1', '$key', '$val')");            
        }                           
        redirect_js("index.php?m=alternatif1");
    }
} else if($mod=='alternatif_ubah1'){
    $kode1 = $_POST['kode1'];
    $nama1 = $_POST['nama1'];
    $keterangan1 = $_POST['keterangan1'];
    if($kode1=='' || $nama1=='')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_alternatif1 SET nama_alternatif1='$nama1', keterangan1='$keterangan1' WHERE kode_alternatif1='$_GET[ID]'");
        foreach($_POST[nilai1] as $key => $val){
            $db->query("UPDATE tb_rel_alternatif1 SET kode_crips1='$val' WHERE ID='$key'");            
        } 
        redirect_js("index.php?m=alternatif1");
    }
} else if ($act=='alternatif_hapus1'){
    $db->query("DELETE FROM tb_alternatif1 WHERE kode_alternatif1='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_alternatif1 WHERE kode_alternatif1='$_GET[ID]'");
    header("location:index.php?m=alternatif1");
} 

/** KRITERIA */    
if($mod=='kriteria_tambah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $bobot = $_POST['bobot'];
    
    if($kode=='' || $nama=='' || $bobot=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM tb_kriteria WHERE kode_kriteria='$kode'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO tb_kriteria (kode_kriteria, nama_kriteria, bobot) VALUES ('$kode', '$nama', '$bobot')");               
        $db->query("INSERT INTO tb_rel_alternatif(kode_alternatif, kode_kriteria, kode_crips) SELECT kode_alternatif, '$kode', -1  FROM tb_alternatif");           
        redirect_js("index.php?m=kriteria");
    }                    
} else if($mod=='kriteria_ubah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $bobot = $_POST['bobot'];
    
    if($kode=='' || $nama=='' || $bobot=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_kriteria SET nama_kriteria='$nama', bobot='$bobot' WHERE kode_kriteria='$_GET[ID]'");
        redirect_js("index.php?m=kriteria");
    }    
} else if ($act=='kriteria_hapus'){
    $db->query("DELETE FROM tb_kriteria WHERE kode_kriteria='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_alternatif WHERE kode_kriteria='$_GET[ID]'");
    header("location:index.php?m=kriteria");
} 

/** KRITERIA1 */    
if($mod=='kriteria_tambah1'){
    $kode1 = $_POST['kode1'];
    $nama1 = $_POST['nama1'];
    $bobot1 = $_POST['bobot1'];
    
    if($kode1=='' || $nama1=='' || $bobot1=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM tb_kriteria1 WHERE kode_kriteria1='$kode1'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO tb_kriteria1 (kode_kriteria1, nama_kriteria1, bobot1) VALUES ('$kode1', '$nama1', '$bobot1')");               
        $db->query("INSERT INTO tb_rel_alternatif1(kode_alternatif1, kode_kriteria1, kode_crips1) SELECT kode_alternatif1, '$kode1', -1  FROM tb_alternatif1");           
        redirect_js("index.php?m=kriteria1");
    }                    
} else if($mod=='kriteria_ubah1'){
    $kode1 = $_POST['kode1'];
    $nama1 = $_POST['nama1'];
    $bobot1 = $_POST['bobot1'];
    
    if($kode1=='' || $nama1=='' || $bobot1=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_kriteria SET nama_kriteria1='$nama1', bobot1='$bobot1' WHERE kode_kriteria1='$_GET[ID]'");
        redirect_js("index.php?m=kriteria1");
    }    
} else if ($act=='kriteria_hapus1'){
    $db->query("DELETE FROM tb_kriteria1 WHERE kode_kriteria1='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_alternatif1 WHERE kode_kriteria1='$_GET[ID]'");
    header("location:index.php?m=kriteria1");
} 

/** KRITERIA2 */    
if($mod=='kriteria_tambah2'){
    $kode2 = $_POST['kode2'];
    $nama2 = $_POST['nama2'];
    $bobot2 = $_POST['bobot2'];
    
    if($kode2=='' || $nama2=='' || $bobot2=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM tb_kriteria2 WHERE kode_kriteria2='$kode2'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO tb_kriteria2 (kode_kriteria2, nama_kriteria2, bobot2) VALUES ('$kode2', '$nama2', '$bobot2')");               
        $db->query("INSERT INTO tb_rel_alternatif2(kode_alternatif2, kode_kriteria2, kode_crips2) SELECT kode_alternatif2, '$kode2', -1  FROM tb_alternatif2");           
        redirect_js("index.php?m=kriteria2");
    }                    
} else if($mod=='kriteria_ubah2'){
    $kode2 = $_POST['kode2'];
    $nama2 = $_POST['nama2'];
    $bobot2 = $_POST['bobot2'];
    
    if($kode2=='' || $nama2=='' || $bobot2=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_kriteria2 SET nama_kriteria2='$nama2', bobot2='$bobot2' WHERE kode_kriteria2='$_GET[ID]'");
        redirect_js("index.php?m=kriteria2");
    }    
} else if ($act=='kriteria_hapus2'){
    $db->query("DELETE FROM tb_kriteria2 WHERE kode_kriteria2='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_alternatif2 WHERE kode_kriteria2='$_GET[ID]'");
    header("location:index.php?m=kriteria2");
} 


/** DATA TENDER */    
if($mod=='tender_tambah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $nilai = $_POST['nilai'];
    
    if($kode=='' || $nama=='' || $nilai=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM tb_tender WHERE kode_paket='$kode'"))
        print_msg("Kode sudah ada!");
    else{
        $db->query("INSERT INTO tb_tender (kode_paket, nama_paket, nilai_paket) VALUES ('$kode', '$nama', '$nilai')");               
                 
        redirect_js("index.php?m=tender");
    }                    
} else if($mod=='tender_ubah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $nilai = $_POST['nilai'];
    
    if($kode=='' || $nama=='' || $nilai=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_tender SET nama_paket='$nama', nilai_paket='$nilai' WHERE kode_paket='$_GET[ID]'");
        redirect_js("index.php?m=tender");
    }    
} else if ($act=='tender_hapus'){
    $db->query("DELETE FROM tb_tender WHERE kode_paket='$_GET[ID]'");
    header("location:index.php?m=tender");
} 


/** CRIPS */    
if($mod=='crips_tambah'){
    $nilai = $_POST['nilai'];
    $nama_crips = $_POST['nama_crips'];
    
    if($nilai=='' || $nama_crips=='')
        print_msg("Nilai dan nama tidak boleh kosong!");
    else{
        $db->query("INSERT INTO tb_crips (kode_kriteria, nilai, nama_crips) VALUES ('$_POST[kode_kriteria]', '$nilai', '$nama_crips')");           
        redirect_js("index.php?m=crips&kode_kriteria=$_GET[kode_kriteria]");
    }                  
} else if($mod=='crips_ubah'){
    $nilai = $_POST['nilai'];
    $nama_crips = $_POST['nama_crips'];
    
    if($nilai=='' || $nama_crips=='')
        print_msg("Nilai dan nama tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_crips SET nilai='$nilai', nama_crips='$nama_crips' WHERE kode_crips='$_GET[ID]'");
        redirect_js("index.php?m=crips&kode_kriteria=$_GET[kode_kriteria]");
    }   
} else if ($act=='crips_hapus'){
    $db->query("DELETE FROM tb_crips WHERE kode_crips='$_GET[ID]'");
    header("location:index.php?m=crips&kode_kriteria=$_GET[kode_kriteria]");
} 


/** DATA_ALTERNATIF */
if($mod=='data_alt_tambah'){
    $nilai_alt = $_POST['nilai_alt'];
    $nama_alt = $_POST['nama_alt'];
    
    if($nilai_alt=='' || $nama_alt=='')
        print_msg("Nilai dan nama tidak boleh kosong!");
    else{
        $db->query("INSERT INTO tb_data_alt (kode_paket, nilai_alt, nama_alt) VALUES ('$_POST[kode_paket]', '$nilai_alt', '$nama_alt')");           
        redirect_js("index.php?m=data_alt&kode_paket=$_GET[kode_paket]");
    }                  
} else if($mod=='data_alt_ubah'){
    $nilai_alt = $_POST['nila_alti'];
    $nama_alt = $_POST['nama_alt'];
    
    if($nilai_alt=='' || $nama_alt=='')
        print_msg("Nilai dan nama tidak boleh kosong!");
    else{
        $db->query("UPDATE tb_data_alt SET nilai_alt='$nilai_alt', nama_alt='$nama_alt' WHERE kode_alt='$_GET[ID]'");
        redirect_js("index.php?m=data_alt&kode_paket=$_GET[kode_paket]");
    }   
} else if ($act=='data_alt_hapus'){
    $db->query("DELETE FROM tb_data_alt WHERE kode_alt='$_GET[ID]'");
    header("location:index.php?m=data_alt&kode_paket=$_GET[kode_paket]");
} 

/** AHLI */
if($mod=='ahli_tambah'){
    $posisi = $_POST['posisi'];
    $nama_ahli = $_POST['nama_ahli'];
    $lingkup = $_POST['lingkup'];
    $sertifikat = $_POST['sertifikat'];
    $pendidikan = $_POST['pendidikan'];

    
    if($posisi=='' || $nama_ahli==''|| $lingkup==''|| $sertifikat==''|| $pendidikan=='')
        print_msg("Nilai dan nama tidak boleh kosong!");
    else{
        $db->query("INSERT INTO tb_ahli (kode_alt, posisi, nama_ahli, lingkup, sertifikat, pendidikan ) VALUES ('$_POST[kode_alt]', '$posisi', '$nama_ahli', 'lingkup', 'sertifikat', 'pendidikan')");           
        redirect_js("index.php?m=ahli&kode_alt=$_GET[kode_alt]");
    }                  
} else if($mod=='ahli_ubah'){
    $posisi = $_POST['posisi'];
    $nama_ahli = $_POST['nama_ahli'];
    $lingkup = $_POST['lingkup'];
    $sertifikat = $_POST['sertifikat'];
    $pendidikan = $_POST['pendidikan'];
    
    if($posisi=='' || $nama_ahli==''|| $lingkup==''|| $sertifikat==''|| $pendidikan=='')
        print_msg("Nilai dan nama tidak boleh kosong!");
    else{
        $db->query("INSERT INTO tb_ahli (kode_alt, posisi, nama_ahli, lingkup, sertifikat, pendidikan ) VALUES ('$_POST[kode_alt]', '$posisi', '$nama_ahli', 'lingkup', 'sertifikat', 'pendidikan')");           
        redirect_js("index.php?m=ahli&kode_alt=$_GET[kode_alt]");
    }   
} else if ($act=='ahli_hapus'){
    $db->query("DELETE FROM tb_ahli WHERE kode_ahli='$_GET[ID]'");
    header("location:index.php?m=ahli&kode_alt=$_GET[kode_paket]");
} 