<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">

        <div class="col-xl-12 col-lg-12">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row d-flex justify-content-between align-items-center">
                        <h5 class="m-0 font-weight-bold text-primary"><?= $title ?></h5>
                    </div>
                    <?= $this->session->flashdata('message'); ?>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Live Event</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Live Event</th>
                                <th>Time</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($report as $u) : ?>


                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $u['name'] ?></td>
                                    <td><?php echo $u['title'] ?></td>
                                    <td><?php echo $u['date_create'] ?></td>
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
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->