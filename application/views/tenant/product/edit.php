<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="col-lg-8">
        <?php echo form_open_multipart('Produk/prosesedit'); ?>
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" class="form-control" id="judul" name="name" placeholder="Nama Produk" value=<?php echo $produk['name'] ?>>

        </div>
        <div class="form-group">
            <label>Harga Produk</label>
            <input type="number" class="form-control" id="judul" name="price" placeholder="Harga" value=<?php echo $produk['price'] ?>>
        </div>

        <input type="text" class="form-control" id="judul" name="id" placeholder="Nama Produk" value=<?php echo $produk['id'] ?> hidden>
        <input type="text" class="form-control" id="judul" name="idCompany" placeholder="Nama Produk" value=<?php echo $produk['idCompany'] ?> hidden>
        <input type="text" class="form-control" id="judul" name="old_file" placeholder="Nama Produk" value="<?php echo $produk['image'] ?>" hidden>

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