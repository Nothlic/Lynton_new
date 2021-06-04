<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="col-lg-6">
        <?= form_open_multipart('tenant/prosesEditLiveStream'); ?>
            <div class="form-group">
                <label>Embed Code</label>
                <input type="text" class="form-control" id="code" name="code" placeholder="Link Youtube" value="<?php echo $youtube['code'] ?>">
                <input type="text" class="form-control" id="id" name="id" placeholder="Link Youtube" value="<?php echo $youtube['id'] ?>" hidden>
                <?= form_error('link', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <label>Is Active &nbsp;<small>Max(2)</small></label>
            <div class="col-sm-12">
                <label class="label-switch switch-primary">
                    <input type="checkbox" class="switch switch-bootstrap status" name="isActive" id="isActive" value="1"
                           <?php if($youtube['isActive'] == 1) :?>checked="checked<?php else:?> <?php endif;?>"
                    >
                    <span class="lable"></span></label>
            </div>

            <div class="form-group">
                <div class="col-sm-2">Banner</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="<?= base_url('assets/img/banner/') . $youtube['banner']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-6">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <input type="hidden" name="oldFile" value="<?= $youtube['banner']?>"/>
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary float-right ml-2">Submit</button>
            <a class="btn btn-secondary float-right" href="<?php echo base_url() ?>tenant/liveStream">Back</a>
        </form>

    </div>
</div>
</div>


</body>

</html>