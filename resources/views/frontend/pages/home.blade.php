@extends('frontend.layout.main')
@push('title'){{ $title }}@endpush

@push('css')
    <style>
        .tablinks:hover{
            opacity: .7;
            transition: .5s;
        }
    </style>
@endpush

@section('content')

<main id="main">
    <div class="container">
        <div class="particle_text">
            <h4>Welcome to</h4>
            <h3>Inisev</h3>
            <div class="underline"></div>
            <p>Checkout our dynamic notice board</p>
            <a href="{{ route('frontend.notice.board') }}" class="main-div">Notice Board</a>
        </div>
    </div>



</main><!-- End #main -->


@endsection

@push('css_links')

@endpush
@push('js_links')
<!-- Particle Movement JS -->
<script type="text/javascript" src="{{ asset('frontend-assets/assets/vendor/partial/particles.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend-assets/assets/vendor/partial/stats.min.js') }}"></script>
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
@endpush
@push('js')
@endpush
