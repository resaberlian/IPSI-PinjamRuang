<div class="product-status mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h3>Data Kategori</h3>
                    <br>
                    <?php echo $this->session->flashdata('hasil'); ?>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>NAMA</th>
                            <th>AKSI</th>
                        </tr>
                        <?php
                        $no=1;
                            foreach ($datakat as $l) {
                                echo '<tr>                          
                            <td>'.$no.'</td>
                            <td>'.$l->nama_kat.'</td>
                            <td>
                            <a class="btn btn-primary btn-md"  href=""> Edit </a>
                            <a class="btn btn-danger btn-md" onclick="return confirm(\'Anda yakin ingin menghapus?\')" href="'.base_url().'index.php/Ruang/delete/'.$l->id_kat.'"> Hapus </a>
                            </td>
                            <tr>';
                            $no++;
                            }   
                        ?>
                    </table>
                    <a href="http://localhost/rest_ci_client/index.php/kategori/create" style="float: right;">+ Tambah data</a>
                    
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