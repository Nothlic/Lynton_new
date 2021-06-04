<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="col-lg-8">
        <?php echo form_open_multipart('Produk/tambahProduk'); ?>
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" class="form-control" id="judul" name="idCompany" placeholder="Nama Produk" value="<?= $user['idCompany']?>" hidden>
            <input type="text" class="form-control" id="judul" name="name" placeholder="Nama Produk">
        </div>
        <div class="form-group">
            <label>Harga Produk</label>
            <input type="number" class="form-control" id="judul" name="price" placeholder="Harga">
        </div>


        <label>Foto</label>
        <br>
        <input type="file" name="image" id="file">

        <button type="submit" class="btn btn-primary float-right ml-2">Submit</button>
        <a class="btn btn-secondary float-right" href="<?php echo base_url() ?>Produk">Back</a>

        <?php echo form_close(); ?>
    </div>
</div>
</div>


</body>

</html>