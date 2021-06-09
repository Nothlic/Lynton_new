<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"><?= $title?></h5>
            <?= $this->session->flashdata('message'); ?>
            <a href="<?php echo base_url() ?>Promotion/tambah" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i></a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach ($promotion as $u) : ?>

                        <div class="modal fade" id="lihatGambar<?php echo $u['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Gambar Promosi : <?= $u['image'] ?></h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md">
                                            <img src="<?= base_url() ?>assets/img/promotion/<?= $u['image'] ?>" class="img-thumbnail mt-2 mb-2  " alt="...">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $u['title'] ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?php echo base_url() ?>Promotion/editPromotion/<?php echo $u['id'] ?>" class="btn btn-info btn-flat mr-2"><i class="fa fa-edit"></i></a>
                                    <a href="<?php echo base_url() ?>Promotion/hapusPromotion/<?php echo $u['id'] ?>" class="btn btn-danger btn-flat mr-2"><i class="fa fa-trash"></i></a>
                                    <a href="#" class="btn btn-secondary btn-flat mr-2" data-toggle="modal" data-target="#lihatGambar<?php echo $u['id']; ?>"><i class="fa fa-eye"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->



</body>

</html>