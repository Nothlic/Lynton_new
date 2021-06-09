<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="col-lg-8">
        <?php echo form_open_multipart('Promotion/prosesedit'); ?>
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value=<?php echo $promotion['title'] ?>/>

        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea  class="form-control" id="description" name="description" placeholder="Description"><?php echo $promotion['description'] ?></textarea>
        </div>

        <div class="form-group">
            <label>Is Active &nbsp;<small>Max(2)</small></label>
            <div class="col-sm-12">
                <label class="label-switch switch-primary">
                    <input type="checkbox" class="switch switch-bootstrap status" name="isActive" id="isActive" value="1"
                           <?php if($promotion['isActive'] == 1) :?>checked="checked<?php else:?> <?php endif;?>"
                    >
                    <span class="lable"></span></label>
            </div>
        </div>

        <input type="text" class="form-control" id="judul" name="id" placeholder="id" value=<?php echo $promotion['id'] ?> hidden>
        <input type="text" class="form-control" id="judul" name="old_file" placeholder="Nama Produk" value="<?php echo $promotion['image'] ?>" hidden>

        <label>Foto</label>
        <br>
        <input type="file" name="image" id="file">

        <button type="submit" class="btn btn-primary float-right ml-2">Submit</button>
        <a class="btn btn-secondary float-right" href="<?php echo base_url() ?>Promotion">Back</a>

        <?php echo form_close(); ?>
    </div>
</div>
</div>


</body>

</html>