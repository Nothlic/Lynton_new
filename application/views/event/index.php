<section id="event-section">
    <div class="event-wrapper">
        <div class="event-stream">
            <div class="entry-video embed-responsive embed-responsive-16by9">
                <div id="player"></div>
                <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/pKO9UjSeLew?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay=1; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                <div id="iframeBlocker" style="position:absolute; top: 0; left: 0; width:100%; height:100%;background-color:aliceblue;opacity:0.1;"></div>
            </div>

        </div>

        <div class="event-chat bg-glass">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="menu-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">CHAT</a>
                    <a class="menu-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">SHOPPING</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="chat-section-wrapper">
                        <div class="chat-wrapper" id="chat-wrapper">
                        </div>

                        <div class="chat-send-wrapper" style="padding-top:10px">
                            <div class="input-group">
                                <input hidden="" type="text" name="idCompany" class="form-control idCompany" id="idCompany" value="<?= $company['id'] ?>">
                                <input hidden="" type="text" name="name" class="form-control name" id="name" value="<?= $user['name'] ?>">
                                <input hidden="" type="text" name="image" class="form-control image" id="image" value="<?= $user['image'] ?>">
                                <input type="text" name="text" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 philips-text-field text">
                                <div class="input-group-append">
                                    <button id="btn-chat" type="submit" class="btn philips-color-custom btn-chat">Kirim </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="shopping-wrapper">
                        <?php foreach ($products as $product) { ?>
                            <div class="shopping-item">
                                <div class="shopping-img">
                                    <img src="<?php echo base_url('assets/img/produk/') . $product['image'] ?>" />
                                </div>

                                <div class="shopping-info">
                                    <div class="item-name"><?= $product['name'] ?></div>
                                    <div class="item-description">
                                        Rp. <?= number_format($product['price'], 2, ',', '.'); ?>
                                    </div>

                                    <a href="https://api.whatsapp.com/send?phone=<?= $company['phoneNumber'] ?> " target="_blank" class="btn btn-success btn-block item-order-button">ORDER</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="<?php echo base_url() ?>event/home" class="text-white">
        <div class="float">
            <i class="fas fa-home"></i>
        </div>
    </a>


    <div class="float-mobile">
        MENU
    </div>
</section>