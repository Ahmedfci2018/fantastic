<!doctype html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="/public/assets/css/material-icons.css" />
    <!-- Material Kit CSS -->
    <link href="/public/assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <link rel="stylesheet" href="/public/assets/css/font-awesome.min.css">


    {{--noty--}}
    <link rel="stylesheet" href="/public/assets/plugins/noty/noty.css">
    <script src="/public/assets/plugins/noty/noty.min.js"></script>

    @if (app()->getLocale() == 'ar')

        <!--  Material Dashboard CSS    -->
        <link href="/public/assets/css/rtl/material-dashboard.css" rel="stylesheet"/>

        <!--  CSS for Demo Purpose, don't include it in your project     -->

        {{--<style>
            html[dir="rtl"] .icon {
                -moz-transform: scaleX(-1);
                -o-transform: scaleX(-1);
                -webkit-transform: scaleX(-1);
                transform: scaleX(-1);
                filter: FlipH;
                -ms-filter: "FlipH";
            }

            .wrapper .boxContainer .fancyBox {
                text-align: left;
                padding-left: 10px;
                text-decoration: underline;
                color: #4A8CF7;
            }

            .wrapper .boxContainer .fancyBox {
                text-decoration: underline;
                color: #4A8CF7;
            }

            html[dir="ltr"] .wrapper .boxContainer .fancyBox {
                text-align: left;
                padding-left: 10px;
            }

            html[dir="rtl"] .wrapper .boxContainer .fancyBox {
                text-align: right;
                padding-right: 10px;
            }

            html[dir="rtl"] .sidebar {
                text-align: right;
                padding: 0 0 0 10px;
            }

            .content {
                text-align: left;
            }
            html[dir="rtl"] .content {
                text-align: right;
            }
            .content {
                text-align: start;
            }

            .content {
                padding-left: 12px;
                margin-right: 20px;
            }
            html[dir="rtl"] .content body {
                padding-left: 0;
                padding-right: 12px;
                margin-left: 20px;
                margin-right: 0px;
                padding-inline-start: 12px;
                margin-inline-end: 20px;
            }

        </style>--}}

        <style>
            .content {
                text-align: left;
            }
            html[dir="rtl"] .content {
                text-align: right;
                padding-left: 0;
                padding-right: 12px;
                margin-left: 20px;
                margin-right: 0px;
                padding-inline-start: 12px;
                margin-inline-end: 20px;
            }

        </style>
    @endif
    <style>
        select{
            background-color: #202940 !important;
        }
    </style>
</head>

<body class="dark-edition">
<div class="wrapper ">
    @include('back-end.layout.side-bar')
    <div class="main-panel">
        <!-- Navbar -->

        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
                @include('partials._session')
            </div>
        </div>
        @include('back-end.layout.footer')
    </div>
</div>

    <!--   Core JS Files   -->
{{--Jquery--}}
    <script src="/public/assets/js/core/jquery.min.js"></script>

    <script src="/public/assets/js/core/popper.min.js"></script>
    <script src="/public/assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="/public/assets/js/default-passive-events.js"></script>
    <script src="/public/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="/public/assets/js/buttons.js"></script>

    <!-- Chartist JS -->
    <script src="/public/assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="/public/assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/public/assets/js/material-dashboard.js?v=2.1.0"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="/public/assets/demo/demo.js"></script>
    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');

                $sidebar_img_container = $sidebar.find('.sidebar-background');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');

                window_width = $(window).width();

                $('.fixed-plugin a').click(function(event) {
                    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .active-color span').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                    }
                });

                $('.fixed-plugin .background-color .badge').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('background-color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                    }
                });

                $('.fixed-plugin .img-holder').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).parent('li').siblings().removeClass('active');
                    $(this).parent('li').addClass('active');


                    var new_image = $(this).find("img").attr('src');

                    if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $sidebar_img_container.fadeIn('fast');
                        });
                    }

                    if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $full_page_background.fadeOut('fast', function() {
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                            $full_page_background.fadeIn('fast');
                        });
                    }

                    if ($('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                    }
                });

                $('.switch-sidebar-image input').change(function() {
                    $full_page_background = $('.full-page-background');

                    $input = $(this);

                    if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar_img_container.fadeIn('fast');
                            $sidebar.attr('data-image', '#');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page_background.fadeIn('fast');
                            $full_page.attr('data-image', '#');
                        }

                        background_image = true;
                    } else {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar.removeAttr('data-image');
                            $sidebar_img_container.fadeOut('fast');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page.removeAttr('data-image', '#');
                            $full_page_background.fadeOut('fast');
                        }

                        background_image = false;
                    }
                });

                $('.switch-sidebar-mini input').change(function() {
                    $body = $('body');

                    $input = $(this);

                    if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                    } else {

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                        setTimeout(function() {
                            $('body').addClass('sidebar-mini');

                            md.misc.sidebar_mini_active = true;
                        }, 300);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);

                });
            });
        });

        // delete Noty
        $('.delete').click(function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "@lang('site.confirm_delete')",
                type: "warning",
                killer: true,
                buttons: [
                    Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function () {
                        that.closest('form').submit();
                    }),

                    Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();

        });//end of delete noty

        //image preview
        $('.image').change(function () {

            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.img-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
        });

        // delete Noty
        $('.delete').click(function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "<?php echo app('translator')->getFromJson('site.confirm_delete'); ?>",
                type: "warning",
                killer: true,
                buttons: [
                    Noty.button("<?php echo app('translator')->getFromJson('site.yes'); ?>", 'btn btn-success mr-2', function () {
                        that.closest('form').submit();
                    }),

                    Noty.button("<?php echo app('translator')->getFromJson('site.no'); ?>", 'btn btn-primary mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();

        });//end of delete
    </script>

</body>

</html>
