<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between align-items-center">
                <h5 class="m-0 font-weight-bold text-primary"><?= $title ?></h5>
                <a href="<?php echo base_url() ?>tenant/createLiveStream" class="btn btn-sm btn-success float-right"><i class="fa fa-plus"></i></a>
            </div>
            <?= $this->session->flashdata('message'); ?>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Embed Code</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Embed Code</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($youtube as $u) : ?>


                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $u['title'] ?></td>
                                <td><?php echo $u['code'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo base_url() ?>tenant/editLiveStream/<?php echo $u['id'] ?>" class="btn btn-info btn-flat mr-2"><i class="fa fa-edit"></i></a>
                                        <a href="<?php echo base_url() ?>tenant/deleteLiveStream/<?php echo $u['id'] ?>" class="btn btn-danger btn-flat mr-2"><i class="fa fa-trash"></i></a>
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