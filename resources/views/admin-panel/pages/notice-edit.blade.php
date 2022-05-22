@extends('admin-panel.layout.app')
@push('title'){{ $title }}@endpush

@push('css')

@endpush

@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">{{ $title }}</h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.notices.manage') }}" class="btn btn-outline-info btn-fw">Notices</a>
                </li>
              </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">


                    {!! Form::open(['route' => 'admin.notices.update', 'method' => 'put', 'files' => true]) !!}
                        <input type="hidden" name="id" value="{{ $notice->id }}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('title', "Notice Title", []) !!}
                                            {!! Form::text('title', $notice->title, ['class' => 'form-control input-default', 'required']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('status', "Select Notice Status", []) !!}
                                            {!! Form::select('status', getStatus(), $notice->status, ['class' => 'form-control select2', 'required', 'placeholder' => 'Select Status']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('description', "Description", []) !!}
                                            <textarea class="form-control" name="description" id="summernote">{{ $notice->description }}</textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <button type="submit" class="btn btn-outline-success btn-fw float-right">Update</button>
                    {!! Form::close() !!}

                </div>
                </div>
            </div>
        </div>

    </div>


@endsection

@push('css_links')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush
@push('js_links')

@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
         $('#summernote').summernote({
            height: 400
        });
    </script>
@endpush
