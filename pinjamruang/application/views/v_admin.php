<div class="product-status mg-tb-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-status-wrap">
                    <h3>Data Admin</h3>
                    <br>
                    <?php echo $this->session->flashdata('hasil'); ?>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>NAMA</th>
                            <th>username</th>
                            <th>password</th>
                            <th>level</th>
                        </tr>
                        <?php
                        $no=1;
                            foreach ($dataadmin as $l) {
                                echo '<tr>                          
                            <td>'.$no.'</td>
                            <td>'.$l->nama.'</td>
                            <td>'.$l->username.'</td>
                            <td>'.$l->password.'</td>
                            <td>'.$l->nama_lvl.'</td>
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