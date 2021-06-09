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
            <div class="container-fluid">
                <div class="default-section">
                    <div class="main-title-section text-left">
                        Promosi
                    </div>
                    <div class="banner-wrapper">
                        <?php foreach($promotions as $promotion){?>
                            <a href="<?php echo base_url()?>event/promosi/<?php echo $promotion['id'] ?>">
                                <img src="<?php echo base_url('assets/img/promotion/'). $promotion['image'];?>" class="image-slider" />
                            </a>
                        <?php }?>
                    </div>
                </div>
                <div class="default-section">
                    <div class="main-title-section text-left">
                        Special Buat Kamu
                    </div>
                    <div class="special-wrapper">
                        <?php foreach($live_streams as $live_stream){?>
                            <a href="<?php echo base_url('event/index/') . $live_stream['idCompany']?>">
                                <div class="special-item">
                                    <div class="special-image">
                                        <img src="<?php echo base_url('assets/img/banner/') .$live_stream['banner'];?>" />
                                    </div>
                                    <div class="special-title">Event</div>
                                </div>
                            </a>
                        <?php }?>


                    </div>
                </div>

                <div class="default-section">
                    <div class="d-flex justify-content-between filter-wrapper">
                        <div class="main-title-section">
                            Live
                        </div>
                        <div class="filter">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Category</label>
                                </div>
                                <select class="custom-select"  id="category" name="category">
                                    <option value="" selected>All Categories</option>
                                    <option value="Technology">Technology</option>
                                    <option value="Food">Food</option>
                                    <option value="Otomotive">Otomotive</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Furniture">Furniture</option>
                                    <option value="Fintech">Fintech</option>
                                    <option value="Health">Health</option>
                                    <option value="Academic">Academic</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button" id="filter">Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="special-wrapper" id="live">
                    </div>
                </div>

<!--                <div class="default-section">-->
<!--                    <div class="main-title-section text-left">-->
<!--                        Artikel-->
<!--                    </div>-->
<!--                    <div class="article-wrapper">-->
<!--                        <a href="#">-->
<!--                            <img src="https://placeimg.com/640/480/arch" class="image-slider" />-->
<!--                        </a>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
            </div>

        </main>
        <!-- page-content" -->
    </div>
</section>