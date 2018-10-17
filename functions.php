<?php
include 'config.php';

$rows = $db->get_results("SELECT kode_alternatif, nama_alternatif FROM tb_alternatif ORDER BY kode_alternatif");
foreach($rows as $row){
    $ALTERNATIF[$row->kode_alternatif] = $row->nama_alternatif;
}

$rows = $db->get_results("SELECT * FROM tb_kriteria ORDER BY kode_kriteria");
foreach($rows as $row){
    $KRITERIA[$row->kode_kriteria] = $row;
}

$rows = $db->get_results("SELECT kode_alternatif1, nama_alternatif1 FROM tb_alternatif1 ORDER BY kode_alternatif1");
foreach($rows as $row){
    $ALTERNATIF1[$row->kode_alternatif1] = $row->nama_alternatif1;
}

$rows = $db->get_results("SELECT * FROM tb_kriteria1 ORDER BY kode_kriteria1");
foreach($rows as $row){
    $KRITERIA1[$row->kode_kriteria1] = $row;
}

$rows = $db->get_results("SELECT * FROM tb_tender ORDER BY kode_paket");
foreach($rows as $row){
    $tender[$row->kode_paket] = $row;
}

$rows = $db->get_results("SELECT * FROM tb_data_alt ORDER BY kode_alt");
foreach($rows as $row){
    $data_alt[$row->kode_alt] = $row;
}

$rows = $db->get_results("SELECT * FROM tb_ahli ORDER BY kode_ahli");
foreach($rows as $row){
    $ahli[$row->kode_ahli] = $row;
}

$rows = $db->get_results("SELECT * FROM tb_pengalaman ORDER BY kode_pengalaman");
foreach($rows as $row){
    $pengalaman[$row->kode_pengalaman] = $row;
}

function get_crips_option($kriteria, $selected = 0){
    global $db;
    $rows = $db->get_results("SELECT kode_crips, nilai, nama_crips FROM tb_crips WHERE kode_kriteria='$kriteria' ORDER BY kode_crips");
    foreach($rows as $row){
        if($row->kode_crips==$selected)
            $a.="<option value='$row->kode_crips' selected>$row->nama_crips</option>";
        else
            $a.="<option value='$row->kode_crips'>$row->nama_crips</option>";
    }
    return $a;
}

function get_kriteria_option($selected = 0){
    global $KRITERIA;  
    //print_r($KRITERIA);
    foreach($KRITERIA as $key => $value){
        if($key==$selected)
            $a.="<option value='$key' selected>$value->nama_kriteria</option>";
        else
            $a.="<option value='$key'>$value->nama_kriteria</option>";
    }
    return $a;
}

function get_tender_option($selected = 0){
    global $tender;  
    //print_r($TENDER);
    foreach($tender as $key => $value){
        if($key==$selected)
            $a.="<option value='$key' selected>$value->nama_paket</option>";
        else
            $a.="<option value='$key'>$value->nama_paket</option>";
    }
    return $a;
}

function get_ahli_option($data_alt, $selected = 0){
    global $ahli;  
    //print_r($TENDER);
    foreach($ahli as $key => $value){
        if($key==$selected)
            $a.="<option value='$key' selected>$value->nama_ahli</option>";
        else
            $a.="<option value='$key'>$value->nama_ahli</option>";
    }
    return $a;
   /* global $db;
    $rows = $db->get_results("SELECT kode_ahli, posisi, nama_ahli, lingkup, sertifikat, pendidikan FROM tb_ahli WHERE kode_alt='$data_alt' ORDER BY kode_ahli");
    foreach($rows as $row){
        if($row->kode_ahli==$selected)
            $a.="<option value='$row->kode_ahli' selected>$row->nama_ahli</option>";
        else
            $a.="<option value='$row->kode_ahli'>$row->nama_ahli</option>";
    }
    return $a; */
}

function get_pengalaman_option($ahli, $selected = 0){
    global $pengalaman;  
    //print_r($TENDER);
    foreach($pengalaman as $key => $value){
        if($key==$selected)
            $a.="<option value='$key' selected>$value->mulai</option>";
        else
            $a.="<option value='$key'>$value->mulai</option>";
    }
    return $a;
}

function get_data_alt_option($tender, $selected = 0){
    global $data_alt;  
    //print_r($TENDER);
    foreach($data_alt as $key => $value){
        if($key==$selected)
            $a.="<option value='$key' selected>$value->nama_alt</option>";
        else
            $a.="<option value='$key'>$value->nama_alt</option>";
    }
    return $a;
   /* global $db;
    $rows = $db->get_results("SELECT kode_alt, nilai_alt, nama_alt FROM tb_data_alt WHERE kode_paket='$tender' ORDER BY kode_alt");
    foreach($rows as $row){
        if($row->kode_alt==$selected)
            $a.="<option value='$row->kode_alt' selected>$row->nama_alt</option>";
        else
            $a.="<option value='$row->kode_alt'>$row->nama_alt</option>";
    }
    return $a;
    */
}

function get_bobot(){
    $arr = array();
    global $KRITERIA;
    foreach($KRITERIA as $key => $val){
        $arr[$key] = $val->bobot;
    }
    return $arr;
}

function get_bobot_normal($bobot){
    $arr = array();
    foreach($bobot as $key => $val){
        $arr[$key] = $val / array_sum($bobot);
    }
    return $arr;
}

function get_rank($array){
    $data = $array;
    arsort($data);
    $no=1;
    $new = array();
    foreach($data as $key => $value){
        $new[$key] = $no++;
    }
    return $new;
}

function get_data(){
    global $db;
    
    $rows = $db->get_results("SELECT r.kode_alternatif, r.kode_kriteria, c.nilai 
    FROM tb_rel_alternatif r LEFT JOIN tb_crips c ON c.kode_crips=r.kode_crips
    ORDER BY kode_alternatif, kode_kriteria");
    
    $data = array();
    foreach($rows as $row){
        $data[$row->kode_alternatif][$row->kode_kriteria] = $row->nilai;
    }
    return $data;
}

function get_analisa(){
    global $db;
    
    $rows = $db->get_results("SELECT r.kode_alternatif, r.kode_kriteria, c.nama_crips, c.kode_crips 
    FROM tb_rel_alternatif r LEFT JOIN tb_crips c ON c.kode_crips=r.kode_crips
    ORDER BY kode_alternatif, kode_kriteria");
    
    $data = array();
    foreach($rows as $row){
        $data[$row->kode_alternatif][$row->kode_kriteria] = $row->nama_crips;
    }
    return $data;
}

function get_normal($data, $bobot_normal){    
    $arr = array();    
    foreach($data as $key => $val){                
        foreach($val as $k => $v){
            $arr[$key][$k] = $v * $bobot_normal[$k];
        }
    }        
    return $arr;
}

function get_total($normal){
    $arr = array();
    foreach($normal as $key => $val){
        $arr[$key] = array_sum($val);
    }
    return $arr;
}


/*Tahap 2*/

function get_bobot1(){
    $arr = array();
    global $KRITERIA1;
    foreach($KRITERIA1 as $key => $val){
        $arr[$key] = $val->bobot1;
    }
    return $arr;
}

function get_bobot_normal1($bobot){
    $arr = array();
    foreach($bobot1 as $key => $val){
        $arr[$key] = $val / array_sum($bobot1);
    }
    return $arr;
}

function get_rank1($array){
    $data1 = $array;
    arsort($data1);
    $no=1;
    $new = array();
    foreach($data1 as $key => $value){
        $new[$key] = $no++;
    }
    return $new;
}

function get_data1(){
    global $db;
    
    $rows = $db->get_results("SELECT r.kode_alternatif1, r.kode_kriteria1, c.nilai1 
    FROM tb_rel_alternatif1 r LEFT JOIN tb_crips1 c ON c.kode_crips1=r.kode_crips1
    ORDER BY kode_alternatif1, kode_kriteria1");
    
    $data1 = array();
    foreach($rows as $row){
        $data1[$row->kode_alternatif1][$row->kode_kriteria1] = $row->nilai1;
    }
    return $data1;
}

function get_analisa1(){
    global $db;
    
    $rows = $db->get_results("SELECT r.kode_alternatif1, r.kode_kriteria1, c.nama_crips1, c.kode_crips1 
    FROM tb_rel_alternatif1 r LEFT JOIN tb_crips1 c ON c.kode_crips1=r.kode_crips1
    ORDER BY kode_alternatif1, kode_kriteria1");
    
    $data = array();
    foreach($rows as $row){
        $data[$row->kode_alternatif1][$row->kode_kriteria1] = $row->nama_crips1;
    }
    return $data;
}

function get_normal1($data1, $bobot_normal1){    
    $arr = array();    
    foreach($data1 as $key => $val){                
        foreach($val as $k => $v){
            $arr[$key][$k] = $v * $bobot_normal1[$k];
        }
    }        
    return $arr;
}

function get_total1($normal1){
    $arr = array();
    foreach($normal1 as $key => $val){
        $arr[$key] = array_sum($val);
    }
    return $arr;
}


