<div class="page-header">
    <h1>Hasil Perhitungan</h1>
</div>
<?php
$c = $db->get_results("SELECT * FROM tb_rel_alternatif WHERE kode_crips NOT IN (SELECT kode_crips FROM tb_crips)");
if (!$ALTERNATIF || !$KRITERIA):
    echo "Tampaknya anda belum mengatur alternatif dan kriteria. Silahkan tambahkan minimal 3 alternatif dan 3 kriteria.";
elseif ($c):
    echo "Tampaknya anda belum mengatur nilai alternatif. Silahkan atur pada menu <strong>Nilai Alternatif</strong>.";
else:
    $bobot = get_bobot();
    $bobot_normal = get_bobot_normal($bobot);  
    $analisa = get_analisa();  
    $data = get_data();
    $normal = get_normal($data, $bobot_normal);
    $total = get_total($normal);
    $rank = get_rank($total);   
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Bobot Kriteria</h3>
    </div>
    <div class="table-responsive"> 
        <table class="table table-bordered table-striped table-hover nw">
        <thead><tr>
            <th>Kriteria</th>
            <th>Bobot</th>
            <th>Normal</th>            
        </tr></thead>
        <?php foreach($KRITERIA as $key => $val):?>
        <tr>
            <td>[<?=$key?>] <?=$val->nama_kriteria?></td>
            <td><?=$bobot[$key]?></td>
            <td><?=$bobot_normal[$key]?></td>
        </tr>    
        <?php endforeach?>
        <tr>
            <td>Total</td>
            <td><?=array_sum($bobot)?></td>
            <td><?=array_sum($bobot_normal)?></td>
        </tr>
        </table>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Analisa</h3>
    </div>
    <div class="table-responsive"> 
        <table class="table table-bordered table-striped table-hover nw">
        <thead><tr>
            <th></th>
            <?php foreach($analisa[key($analisa)] as $key => $val):?>
            <th><?=$KRITERIA[$key]->nama_kriteria?></th>           
            <?php endforeach?>
        </tr></thead>
        <?php foreach($analisa as $key => $val):?>
        <tr>
            <th><?=$ALTERNATIF[$key]?></th>
            <?php foreach($val as $k => $v):?>
                <td><?=$v?></td>
            <?php endforeach?>
        </tr>    
        <?php endforeach?>
        </table>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Data</h3>
    </div>
    <div class="table-responsive"> 
        <table class="table table-bordered table-striped table-hover nw">
        <thead><tr>
            <th></th>
            <?php foreach($data[key($data)] as $key => $val):?>
            <th><?=$KRITERIA[$key]->nama_kriteria?></th>           
            <?php endforeach?>
        </tr></thead>
        <?php foreach($data as $key => $val):?>
        <tr>
            <th><?=$ALTERNATIF[$key]?></th>
            <?php foreach($val as $k => $v):?>
                <td><?=$v?></td>
            <?php endforeach?>
        </tr>    
        <?php endforeach?>
        </table>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Normalisasi</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
        <thead><tr>
            <th></th>
            <?php foreach($data[key($normal)] as $key => $val):?>
            <th><?=$key?></th>           
            <?php endforeach?>
            <th>Total</th>
        </tr></thead>
        <?php foreach($normal as $key => $val):?>
        <tr>
            <th><?=$ALTERNATIF[$key]?></th>
            <?php foreach($val as $k => $v):?>
            <td><?=round($v, 5)?></td>
            <?php endforeach?>
            <td><?=$total[$key]
        ?>
                
            </td>
        </tr>    
        <?php endforeach?>
        </table>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Perangkingan</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
        <thead><tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Total</th>
            <th>Rank</th>
        </tr></thead>

        <?php 
            foreach($rank as $key => $val):?>
        
        <tr>
            <th><?=$key?></th>
            <th><?=$ALTERNATIF[$key]?></th>
            <td class="text-primary"><?=round($total[$key], 3)?></td>
            <td class="text-primary"><?=$val?></td>
        </tr>                           
        <?php 
        $db->query("UPDATE tb_alternatif SET total='$total[$key]', rank='$val' WHERE kode_alternatif='$key'");
        endforeach ?>
        </table>        
    </div>          
    <div class="panel-body">
        <a class="btn btn-default" target="_blank" href="cetak.php?m=hitung"><span class="glyphicon glyphicon-print"></span> Cetak</a>
    </div> 
</div>
<?php endif?>
