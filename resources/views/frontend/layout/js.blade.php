<!-- Vendor JS Files -->
<script src="{{ asset('frontend-assets/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend-assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend-assets/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('frontend-assets/assets/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
<script src="{{ asset('frontend-assets/assets/vendor/venobox/venobox.min.js') }}"></script>
<script src="{{ asset('frontend-assets/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('frontend-assets/assets/vendor/counterup/counterup.min.js') }}" defer></script>
<script src="{{ asset('frontend-assets/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend-assets/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('admin-assets/assets/vendors/sweet-alert/sw.min.js') }}"></script>

<script src="{{ asset('admin-assets/assets/vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('admin-assets/assets/js/select2.js') }}"></script>
<script src="{{ asset('admin-assets/assets/vendors/toastr/js/toastr.min.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('frontend-assets/assets/js/main.js') }}"></script>

<!-- Slick Slider JS -->
<script type="text/javascript" src="{{ asset('frontend-assets/assets/vendor/slick/slick.js')}}"></script>

@stack('js_links')

<script>
    $(document).ready(function() {

        function hidePreloader() {
            var preloader = $('.spinner-wrapper');
            preloader.delay(1500).fadeOut("slow");
        }
        hidePreloader();
    });


    function getErrorHtml($errors) {
        var errorsHtml = '';
        $.each($errors, function (key, value) {
            if (value.constructor === Array) {
                $.each(value, function (i, v) {
                    errorsHtml += '<li>' + v + '</li>';
                });
            } else {
                errorsHtml += '<li>' + value[0] + '</li>';
            }
        });
        return errorsHtml
    }
</script>
@stack('js')
