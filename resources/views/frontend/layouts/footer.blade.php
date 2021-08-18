@section('footer')
{{--<script src="{{url('backend/plugins/jQuery/jQuery-2.1.3.min.js')}}"></script>--}}
{{--<script src="{{url('backend/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/fastclick/fastclick.min.js')}}"></script>--}}
{{--<script src="{{url('backend/bootstrap/dist/js/app.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/plugins/chartjs/Chart.min.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/bootstrap/dist/js/pages/dashboard2.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/bootstrap/dist/js/demo.js')}}" type="text/javascript"></script>--}}
{{--<script src="{{url('backend/bootstrap/custom/custom.js')}}"></script>--}}
{{--</body>--}}
{{--</html>--}}



<!-- contact start -->


{{--        <div class="icon_main">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-12">--}}
{{--                    <div class="menu_text">--}}
{{--                        <ul>--}}
{{--                            <li><a href="#"><img src="{{url('frontend/images/fb-icon.png')}}"></a></li>--}}
{{--                            <li><a href="#"><img src="{{url('frontend/images/twitter-icon.png')}}"></a></li>--}}
{{--                            <li><a href="#"><img src="{{url('frontend/images/in-icon.png')}}"></a></li>--}}
{{--                            <li><a href="#"><img src="{{url('frontend/images/google-icon.png')}}"></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="copyright_main">--}}
{{--    <div class="container">--}}
        <p class="copy_text">© 2021 All Rights Reserved</p>
{{--    </div>--}}
{{--</div>--}}



<!-- contact end -->
<!-- Javascript files-->




<script src="{{url('frontend/js/jquery.min.js')}}"></script>
<script src="{{url('frontend/js/popper.min.js')}}"></script>
<script src="{{url('frontend/js/bootstrap.bundle.min.js')}}"></script>


<script src="{{url('frontend/js/jquery-3.0.0.min.js')}}"></script>
<script src="{{url('frontend/js/plugin.js')}}"></script>
<!-- sidebar -->
<script src="{{url('frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{url('frontend/js/custom.js')}}"></script>
<!-- javascript -->
{{--<script src="{{url('frontend/js/owl.carousel.js')}}"></script>--}}
<script>
    $(document).ready(function () {
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });

        $(".zoom").hover(function () {

            $(this).addClass('transition');
        }, function () {

            $(this).removeClass('transition');
        });
    });
</script>


</body>

</html>


@endsection
