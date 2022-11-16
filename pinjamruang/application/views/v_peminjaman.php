<div class="product-status mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h3>Data Peminjaman</h3>
                    <br>
                    <?php echo $this->session->flashdata('hasil'); ?>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>NAMA ruang</th>
                            <th>waktu pinjam</th>
                            <th>waktu kembali</th>
                            <th>ket pinjam</th>
                            <th>nama user</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $no=1;
                            foreach ($datapinjam as $l) {
                                echo '<tr>                          
                            <td>'.$no.'</td>
                            <td>'.$l->nama_ruang.'</td>
                            <td>'.$l->waktu_pinjam.'</td>
                            <td>'.$l->waktu_kembali.'</td>
                            <td>'.$l->ket_pinjam.'</td>
                            <td>'.$l->nama.'</td>
                            <td>
                            <a href="'.base_url('index.php/Peminjaman/terima/'.$l->id_ruang).'" class="btn btn-warning" data-toggle="modal">Terima</a> 
                            <a href="'.base_url('index.php/tolak/tolak/'.$l->id_pinjam).'" class="btn btn-danger" data-toggle="modal" onclick="return confirm(\'anda yakin?\')">Tolak</a>
                            </td>
                            <tr>';
                            $no++;
                            }   
                        ?>
                    </table>
                    
                    <div class="custom-pagination">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>