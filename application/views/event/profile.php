<section id="home-event-section">
    <div class="page-wrapper chiller-theme">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#" style="z-index:1;">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper bg-glass">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="<?php echo base_url()?>event/home">lynton</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            <strong><?= $user['name']; ?></strong>
                        </span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>Menu</span>
                        </li>
                        <li class="sidebar">
                            <a href="<?=  base_url()?>event/profile">
                                <i class="fa fa-user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="header-menu">
                            <span>Setting</span>
                        </li>
                        <li>
                            <a href="<?php echo base_url()?>auth/logout">
                                <i class="fa fa-power-off"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>

            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <a href="#" class="link">
                    <!-- <i class="fa fa-bell"></i> -->
                </a>
                <a href="#" class="link">
                    <!-- <i class="fa fa-envelope"></i> -->
                </a>
                <a href="#" class="link">
                    <!-- <i class="fa fa-cog"></i> -->
                </a>
                <a href="#" class="link">
                    <!-- <i class="fa fa-power-off"></i> -->
                </a>
            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content" style="z-index:0;height:100%">
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->

                <div class="row">
                    <div class="col-lg-8">

                        <?= form_open_multipart('user/edit'); ?>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Full name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">Picture</div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>


                        </form>


                    </div>
                </div>



            </div>
            <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    </main>
        <!-- page-content" -->
    </div>
</section>