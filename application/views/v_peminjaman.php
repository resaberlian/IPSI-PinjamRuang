<div class="product-status mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h3>Data Peminjaman</h3>
                    <br>
                    <table>
                        <tr>
                            <th style="text-align:center;">No.</th>
                            <th style="text-align:center;">Nama ruang</th>
                            <th style="text-align:center;">Waktu pinjam</th>
                            <th style="text-align:center;">Waktu kembali</th>
                            <th style="text-align:center;">Keterangan pinjam</th>
                            <th style="text-align:center;">Nama user</th>
                            <th style="text-align:center;">Aksi</th>
                        </tr>
                        <?php
                        $no=1;
                            foreach ($datapinjam as $l) {
                                echo '<tr>                          
                            <td style="text-align:center;">'.$no.'</td>
                            <td style="text-align:center;">'.$l->nama_ruang.'</td>
                            <td style="text-align:center;">'.$l->waktu_pinjam.'</td>
                            <td style="text-align:center;">'.$l->waktu_kembali.'</td>
                            <td style="text-align:center; width:300px;">'.$l->ket_pinjam.'</td>
                            <td style="text-align:center;">'.$l->nama.'</td>
                            <td style="text-align:center;">
                            <a href="'.base_url('index.php/Peminjaman/terima/'.$l->id_pinjam).'" class="btn btn-warning" data-toggle="modal">Terima</a> 
                            <a href="'.base_url('index.php/tolak/tolak/'.$l->id_pinjam).'" class="btn btn-danger" data-toggle="modal" onclick="return confirm(\'anda yakin?\')">Tolak</a>
                            </td>
                            <tr>';
                            $no++;
                            }   
                        ?>
                    </table>
                    <?php if($this->session->flashdata('hasil')!=null): ?>
			        <div class= "alert alert-success"><?= $this->session->flashdata('hasil');?></div>
			        <?php endif?>
                    <div class="custom-pagination">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>