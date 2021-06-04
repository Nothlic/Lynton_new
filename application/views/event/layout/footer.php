<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/dropzone/dist/dropzone.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/'); ?>js/library/boostrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url('assets/'); ?>js/library/slick.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/library/gsap-min.js"></script>
<script src="<?= base_url('assets/'); ?>js/library/aos.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
</body>

</html>

<script>
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
        $('.image-output').addClass('type-active');
        $('.upload-wrapper').addClass('d-none');
    };

    $('.button-reupload').click(function() {
        $('.upload-wrapper').removeClass('d-none');
        $('.image-output').removeClass('type-active');

    })


    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;

    //pKO9UjSeLew
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            width: '100%',
            videoId: 'pKO9UjSeLew',
            playerVars: {
                'autoplay': 1,
                'playsinline': 1,
                'rel': 0,
                'controls': 0,
                'showinfo': 0,
                'autohide': 1,
                'modestbranding': 1

            },
            events: {
                "onReady": onPlayerReady,
                'onStateChange': onPlayerStateChange
            },
        });
    }



    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
        event.target.playVideo();
    }


    function LoadOnce() {
        window.location.reload();
    }

    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
    // var done = false;
    // var p = document.getElementById("player");

    // if (performance.navigation.type == 1) {
    //     // $(p).hide();
    //     window.location = "<?php echo base_url() ?>user";
    // }


    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.ENDED) {
            $('.start-video').fadeIn('normal');
        }
        switch (event.data) {
            case YT.PlayerState.UNSTARTED:
                break;
            case YT.PlayerState.ENDED:
                console.log('ended');
                break;
            case YT.PlayerState.PLAYING:
                console.log('playing');
                break;
            case YT.PlayerState.PAUSED:
                location.reload();
                break;
            case YT.PlayerState.BUFFERING:
                break;
            case YT.PlayerState.CUED:
                console.log('video cued');
                break;
        }
    }



    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    $(document).ready(function() {
        if (isMobile.any()) {
            $('.float').css('display', 'none');


            $('.float-mobile').click(function() {
                $(".float").toggle();
            });
        }

        $('#next').click(function() {
            let name = $('#name').val();
            if (name === "") {
                Swal.fire({
                    title: 'Name is Required',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            } else {
                $(this).parent().addClass('active');
                $('#section1').parent().removeClass('show');
                $('#section2').parent().addClass('show');
                $('#nameInput').html(name);
            }

        })

        $('#next2').click(function() {
            let age = $('#age').val();

            if (age === "") {
                Swal.fire({
                    title: 'Age is Required',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            } else if (age < 17) {
                Swal.fire({
                    title: 'Under Age!',
                    text: 'Min Age 17 Y.O',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                })
            } else if (age >= 99) {
                Swal.fire({
                    title: "Age's Invalid!",
                    icon: 'warning',
                    confirmButtonText: 'OK'
                })
            } else {
                $(this).parent().addClass('active');
                $('#section2').parent().removeClass('show');
                $('#section3').parent().addClass('show');
                $('#questionnaire-section').addClass('type-category');
                $('.questionnaire-content-wrapper').addClass('type-category');
            }

        })

        $('#next3').click(function() {
            $(this).parent().addClass('active');
            $('#section3').parent().removeClass('show');
            $('#section4').parent().addClass('show');
            $('#questionnaire-section').removeClass('type-category');
            $('.questionnaire-content-wrapper').removeClass('type-category');
        })

        $('#nextTenant').click(function() {
            $(this).parent().addClass('active');
            $('#section1').parent().removeClass('show');
            $('#section2').parent().addClass('show');
        });


        $('#nextTenant2').click(function() {
            let category = $('#category').val();
            if (category === "" || category === undefined) {
                Swal.fire({
                    title: 'Category is Required',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            } else {
                $(this).parent().addClass('active');
                $('#section2').parent().removeClass('show');
                $('#section3').parent().addClass('show');
            }
        });


        $('#nextTenant3').click(function() {
            let address = $('#address').val();
            if (address === "" || address === undefined) {
                Swal.fire({
                    title: 'Address is Required',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            } else {
                $(this).parent().addClass('active');
                $('#section3').parent().removeClass('show');
                $('#section4').parent().addClass('show');
            }
        });


        $('#nextTenant4').click(function() {
            let file = $('#file').val();
            if (file === "" || file === undefined) {
                Swal.fire({
                    title: 'Logo Company is Required',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            } else {
                $(this).parent().addClass('active');
                $('#section4').parent().removeClass('show');
                $('#section5').parent().addClass('show');
            }
        });
    });

    $(".sidebar-dropdown > a").click(function() {
        $(".sidebar-submenu").slideUp(200);
        if (
            $(this)
            .parent()
            .hasClass("active")
        ) {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .parent()
                .removeClass("active");
        } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
                .next(".sidebar-submenu")
                .slideDown(200);
            $(this)
                .parent()
                .addClass("active");
        }
    });

    $("#close-sidebar").click(function() {
        $(".page-wrapper").removeClass("toggled");
    });
    $("#show-sidebar").click(function() {
        $(".page-wrapper").addClass("toggled");
    });
</script>