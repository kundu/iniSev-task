@extends('admin-panel.layout.app')
@push('title'){{ $title }}@endpush

@push('css')

@endpush

@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">{{ $title }}</h3>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.users.password.change.update', 'method' => 'put']) !!}
                            <div class="col-lg-6" style="margin: 0 auto;">
                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('name', "Your name", []) !!}
                                            {!! Form::text('name', auth()->user()->name, ['class' => 'form-control input-default', 'required']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('password', "New Password", []) !!}
                                            {!! Form::password('password', null, ['class' => 'form-control input-default', 'required', 'autocoplete'=> 'off']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('password_confirmation', "Confirm New Password", []) !!}
                                            {!! Form::password('password_confirmation', null, ['class' => 'form-control input-default', 'required', 'autocoplete'=> 'off']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-success btn-fw float-right">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>



    </div>


@endsection

@push('css_links')

@endpush
@push('js_links')

@endpush

@push('js')

@endpush
