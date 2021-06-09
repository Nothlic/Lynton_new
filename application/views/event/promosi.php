<section id="home-event-section">
    <div class="page-wrapper chiller-theme">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#" style="z-index:1;">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper bg-glass">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="<?php echo base_url() ?>event/home">lynton</a>
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
                            <a href="<?= base_url() ?>event/profile">
                                <i class="fa fa-user"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="header-menu">
                            <span>Setting</span>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>auth/logout">
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
                </a>
                <a href="#" class="link">
                </a>
                <a href="#" class="link">
                </a>
                <a href="#" class="link">
                </a>
            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content" style="z-index:0;height:100%">
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <div class="default-section">
                    <div class="promotion-wrapper">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="text-body-wrapper">
                                    <div class="img-wrapper">
                                        <img src="<?php echo base_url('assets/img/promotion/') . $promotion['image'] ?> " />
                                    </div>

                                    <div class="date-wrapper">
                                        <?php echo date_format(new DateTime($promotion['created_at']), 'd F Y'); ?>
                                    </div>

                                    <div class="title">
                                        <?= $promotion['title'] ?>
                                    </div>

                                    <div class="description">
                                        <?= $promotion['description'] ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="sticky-body-wrapper">
                                    <div class="sticky-item">
                                        <div class="title">
                                            <div class="container">
                                                Promosi Lainnya
                                            </div>
                                        </div>

                                        <?php foreach ($anotherPromotion as $another) { ?>
                                            <a href="<?php echo base_url() ?>event/promosi/<?php echo $another['id'] ?>">
                                                <div class="item">
                                                    <img class="background" src="<?php echo base_url('assets/img/promotion/') . $another['image'] ?>" />
                                                    <div class="text">
                                                        <div class="container">
                                                            <?php echo $another['title'] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</section>