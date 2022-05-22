<script>
    @if(Session::has('success'))
        toastr.success("{{ session('success') }}", "Success", {
            timeOut: 5000,
            closeButton: 1,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            positionClass: "toast-top-right",
            preventDuplicates: 0,
            onclick: null,
            showDuration: "200",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: 1
        });
    @endif

    @if(Session::has('error'))
        toastr.error("{{ session('error') }}", "Error", {
            timeOut: 5000,
            closeButton: 1,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            positionClass: "toast-top-right",
            preventDuplicates: 0,
            onclick: null,
            showDuration: "200",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: 1
        });
    @endif

    @if(Session::has('info'))
        toastr.info("{{ session('info') }}", "Info", {
            timeOut: 5000,
            closeButton: 1,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            positionClass: "toast-top-right",
            preventDuplicates: 0,
            onclick: null,
            showDuration: "200",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: 1
        });
    @endif

    @if(Session::has('warning'))
        toastr.warning("{{ session('warning') }}", "Warning", {
            timeOut: 5000,
            closeButton: 1,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            positionClass: "toast-top-right",
            preventDuplicates: 0,
            onclick: null,
            showDuration: "200",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: 1
        });
    @endif

  </script>
