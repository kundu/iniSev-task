@extends('admin-panel.layout.app')
@push('title'){{ $title }}@endpush

@push('css')
    <style>
        td img{
            width: auto!important;
            height: auto!important;
            border-radius: unset!important;
        }
    </style>
@endpush

@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">{{ $title }}</h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <button class="btn btn-outline-warning btn-fw" type="button" data-toggle="collapse" data-target="#filterPanel" aria-expanded="false" aria-controls="filterPanel"> <i class="mdi mdi-filter-outline"></i> Filter </button>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.notices.create') }}" class="btn btn-outline-info btn-fw">Create New Notice</a>
                </li>
              </ol>
            </nav>
        </div>

        <div class="row collapse" id="filterPanel">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Searching Panel</h5>
                        {!! Form::open(['route' => 'admin.notices.manage', 'method' => 'get']) !!}
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::text('title', request('title') ?? null, ['class' => 'form-control input-default', 'placeholder' => 'Title ..']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::select('status', getStatus(), request('status') ?? null, ['class' => 'form-control select2', 'placeholder' => 'Select Status']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::select('pagination', getPagination(), request('pagination') ?? null, ['class' => 'form-control select2', 'placeholder' => 'Select Data Count']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-outline-warning btn-icon-text">
                                                <i class="mdi mdi-magnify btn-icon-prepend"></i> Search
                                            </button>
                                            <a href="{{ route('admin.notices.manage') }}" class="btn btn-outline-danger btn-icon-text"> <i class="mdi mdi-reload btn-icon-prepend"></i> Reset </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title display-4">Total Notices: {{ $notices->total() }} </h4>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Status Updated At</th>
                                <th>Status Updated By</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i = $notices->toArray()['from'];  ?>
                                @foreach ($notices as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td> {{ $item->title }} </td>
                                        <td> {{ $item->status }} </td>
                                        <td> {{ $item->createdBy->name }} </td>
                                        <td> {{ $item->created_at }} </td>
                                        <td> {{ $item->statusUpdatedBy->name ?? "N/A" }} </td>
                                        <td> {{ $item->status_updated_at ?? "N/A" }} </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-outline-info dropdown-toggle" id="dropdownMenuIconButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-logout"></i>
                                                </button>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton5">
                                                <a class="dropdown-item" href="{{ route('admin.notices.edit', $item->id) }}" title="edit">Edit</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $notices->appends(request()->query())->links('admin-panel.partial.pagination') }}

                    </div>
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
