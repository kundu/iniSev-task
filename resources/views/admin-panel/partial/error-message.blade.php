<script>
    @if($errors->any())
        <?php $html = '';?>
        @foreach ($errors->all() as $error)
            <?php $html .= '⚠ '. $error.'<br>';?>
        @endforeach
        toastr.error("{!! $html !!}", "Invalid input", {
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
            tapToDismiss: 1,
        });
    @endif

</script>
