<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css">
<?php if($this->session->userdata('level') == 'siswa'){?>
<div class="section-admin container-fluid">
<h1 class="text-left">Dashboard Siswa</h1>
    <div class="row admin text-center">
        <div class="col-md-12">
            <div class="row">
                <?php
                foreach($dataruang as $l){?>
                 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                        <h4 class="text-left"><?php echo $l->nama_ruang?></h4>
                        <img src="http://localhost/rest-api/assets/images/ruang/<?php echo $l->gambar?>">
                        <p class="text-left"><?php echo $l->status_pinjam?></p>
                        <p class="text-right"><a href="<?php echo $l->id_ruang?>">Lihat detail</a></p>
                        </div>
                </div>
            <?php
                }
                ?>
               
            </div>
        </div>
    </div>
</div>
<?php
} else{?>
    <div class="section-admin container-fluid"> 
    <div class="row admin text-center">
        <div class="col-md-12">
            <div class="row" >
                <?php
                $no = 0;
                foreach($count as $l){
                $nama = ['Ruang', 'User', 'Peminjaman'];
                $icon = ['fa fa-shield', 'fa fa-user', 'fa fa-calendar'];
                    ?>
                 <div class="col-lg-4 col-md-3" style="padding : 100px 20px 0px 20px;">
                    <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                    <i class="<?php echo $icon[$no]?>"></i>
                    <h4 class="text-center"> Jumlah <?php echo $nama[$no];?></h4>
                    <p class="text-center"><?php echo $l->jml;?></p></div>
                </div>
            <?php
            $no++;
                }
                ?>
               
            </div>
        </div>
    </div>
</div>
<?php
}
?>