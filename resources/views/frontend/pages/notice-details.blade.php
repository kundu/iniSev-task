@extends('frontend.layout.main')
@push('title'){{ $title }}@endpush

@push('css')
    <style>
        .blog_content_details img{
            max-width: 100% !important;
        }
    </style>
@endpush

@section('content')

    <main id="main">
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Notice: {{ $notice->title }}</h2>
                    <ol>
                        <li><a href="{{ route('frontend.notice.board') }}">Notice Board</a></li>
                        <li>{{ $notice->title }}</li>
                    </ol>
                </div>

            </div>
        </section>

        <section>
            <div class="container">
                <div class="blog_background">

                    <div class="row mt-4 mb-4">
                        <div class="col-lg-9 col-md-4 col-sm-9">
                            <h1 class="blog_content_detail_h1">{{ $notice->title }}</h1>
                            <h3 class="blog_content_detail_h3">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $notice->status_updated_at)
                                ->format('d M Y')  }}</h3>
                        </div>
                    </div>

                    <div class="blog_content_details mt-4">
                        {!! $notice->description !!}
                    </div>
                </div>
            </div>

            </div>
        </section>
    </main>


@endsection

@push('css_links')

@endpush
@push('js_links')

@endpush
@push('js')


@endpush
