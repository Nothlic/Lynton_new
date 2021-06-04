<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="col-lg-5">
        <?= form_open_multipart('tenant/createLiveStream'); ?>
            <div class="form-group">
                <label>Embed Code</label>
                <input type="text" class="form-control" id="code" name="code" placeholder="Link Youtube">
                <input type="text" class="form-control" id="idCompany" name="idCompany" value="<?= $user['idCompany'] ?>" placeholder="Link Youtube" hidden>
                <?= form_error('link', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label>Is Active &nbsp;<small>Max(2)</small></label>
                <div class="col-sm-12">
                    <label class="label-switch switch-primary">
                        <input type="checkbox" class="switch switch-bootstrap status" name="isActive" id="isActive" value="1" >
                        <span class="lable"></span></label>
                </div>
                <?= form_error('link', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label>Banner</label>
                <br>
                <input type="file" name="image" id="file">
            </div>


            <button type="submit" class="btn btn-primary float-right ml-2">Submit</button>
            <a class="btn btn-secondary float-right" href="<?php echo base_url() ?>tenant/liveStream">Back</a>
        <?php echo form_close(); ?>

    </div>
</div>
</div>


</body>

</html>