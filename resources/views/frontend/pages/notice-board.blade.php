@extends('frontend.layout.main')
@push('title'){{ $title }}@endpush

@push('css')

@endpush

@section('content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Notice Board</h2>
                    <ol>
                        <li><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li>Notice Board</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->


        <section>
            <div class="container">
                <div class="blog_background">
                    <h1 class="blog_h1 text-center">
                        Welcome to Notice Board
                    </h1>
                    <div id="notices-board-show-id">
                        <div class="blog_content">
                            <div class="row" >
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h1 class="blog_content_h1"> jascnas </h1>
                                    <h3 class="blog_content_h3"> time </h3>
                                    <p class="blog_content_p"><a href="#">Read Full Notice Board</a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </section>

    </main><!-- End #main -->


@endsection

@push('css_links')

@endpush
@push('js_links')

@endpush
@push('js')

    <script>
        var id = [];
        dataLoad();
        function dataLoad(){
            $(document).ready(function(){
                notices = [];
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{!! route('frontend.ajax.get.notices') !!}",
                    type: "POST",
                    data: {id:id},
                    dataType: "json",
                    beforeSend: function() {
                    },
                    success: function (data) {
                        if(data.success){
                            notices = data.data;
                            if(notices.length){
                                notices.forEach(element => {
                                url ='<?php echo e(url('/')); ?>' + '/notice-board/' + element.url;
                                html =
                                    '<div class="blog_content">' +
                                        '<div class="row" >'+
                                            '<div class="col-lg-12 col-md-12 col-sm-12">'+
                                                '<h1 class="blog_content_h1">'+element.title+'</h1>' +
                                                '<h3 class="blog_content_h3"> '+element.status_updated_at+' </h3>' +
                                                '<p class="blog_content_p"><a href="'+url+'" target="_blank">Read Full Notice Board</a> </p>' +
                                            '</div>'+
                                        '</div>'+
                                    '</div>';

                                    $("#notices-board-show-id").prepend(html);
                                    id.push(element.id)
                                });

                            }
                        }
                    },
                    complete: function (data) {
                        if(notices.length){
                            toastr.success("New notice has announced", "Notice Board", {
                                timeOut: 5000,
                                closeButton: 1,
                                debug: !1,
                                newestOnTop: !0,
                                progressBar: !0,
                                positionClass: "toast-top-right",
                                preventDuplicates: 0,
                                onclick: null,
                                showDuration: "200",
                                hideDuration: "7000",
                                extendedTimeOut: "3000",
                                showEasing: "swing",
                                hideEasing: "linear",
                                showMethod: "fadeIn",
                                hideMethod: "fadeOut",
                                tapToDismiss: 1
                            });
                        }
                    }
                });
            });
            setTimeout(dataLoad, 2000);
        }

    </script>
@endpush
