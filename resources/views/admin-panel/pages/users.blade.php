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
                    <button class="btn btn-outline-warning btn-fw" type="button" data-toggle="collapse" data-target="#filterPanel" aria-expanded="false" aria-controls="filterPanel"> <i class="mdi mdi-filter-outline"></i> Filter </button>
                </li>
                <li class="breadcrumb-item">
                    <button type="button" class="btn btn-outline-info btn-fw" data-toggle="modal" data-target="#createModal" data-placement="top">Create User</button>
                </li>
              </ol>
            </nav>
        </div>

        {{-- <div class="row collapse" id="filterPanel">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Searching Panel</h5>
                        {!! Form::open(['route' => 'admin.service.category', 'method' => 'get']) !!}
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::text('name', request('name') ?? null, ['class' => 'form-control input-default', 'placeholder' => 'Category Name']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::select('service_id', $services, request('service_id') ?? null, ['class' => 'form-control select2', 'placeholder' => 'Select Service']) !!}
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
                                            <a href="{{ route('admin.service.category') }}" class="btn btn-outline-danger btn-icon-text"> <i class="mdi mdi-reload btn-icon-prepend"></i> Reset </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div> --}}


        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title display-4">Total User: {{ $users->total() }} </h4>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i = $users->toArray()['from'];  ?>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td> {{ $item->name }} </td>
                                        <td> {{ $item->email }} </td>
                                        <td> {{ $item->roles[0]->name ?? "" }} </td>
                                        <td>
                                            @php
                                                $roleId = $item->roles[0]->id ?? 0;
                                            @endphp
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-outline-info dropdown-toggle" id="dropdownMenuIconButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-logout"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton5">
                                                <a class="dropdown-item" href="javascript:void()" title="name edit" data-toggle="modal" data-target="#editModal" data-placement="top" onclick="updateClick({{ json_encode($item) }}, {{ $roleId }})">Edit</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $users->appends(request()->query())->links('admin-panel.partial.pagination') }}

                    </div>
                </div>
                </div>
            </div>
        </div>

        <!-- Create -->
        <div class="modal fade" id="createModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create New Category</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>

                    {!! Form::open(['route' => 'admin.users.store', 'method' => 'post']) !!}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('name', "User Name", []) !!}
                                            {!! Form::text('name', null, ['class' => 'form-control input-default', 'required']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('email', "User Email", []) !!}
                                            {!! Form::email('email', null, ['class' => 'form-control input-default', 'required']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('role_id', "Select Role", []) !!}
                                            {!! Form::select('role_id', $roles, null, ['class' => 'form-control select2', 'required', 'placeholder' => 'Select Role', 'id'=>'status_id']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('password', "Password", []) !!}
                                            {!! Form::password('password', null, ['class' => 'form-control input-default', 'required']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('password_confirmation', "Confirm Password", []) !!}
                                            {!! Form::password('password_confirmation', null, ['class' => 'form-control input-default', 'required']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-warning btn-fw" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-success btn-fw">Submit</button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>


        <!-- Edit -->
        <div class="modal fade" id="editModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>

                    {!! Form::open(['route' => 'admin.users.update', 'method' => 'put']) !!}
                        <input type="hidden" name="id" id="id">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('name', "User Name", []) !!}
                                            {!! Form::text('name', null, ['class' => 'form-control input-default', 'required', 'id' => 'name_id']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('email', "User Email", []) !!}
                                            {!! Form::email('email', null, ['class' => 'form-control input-default', 'required', 'id'=> 'email_id']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('role_id', "Select Role", []) !!}
                                            {!! Form::select('role_id', $roles, null, ['class' => 'form-control select2', 'required', 'placeholder' => 'Select Role', 'id'=>'role_id']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('password', "Password", []) !!}
                                            {!! Form::password('password', null, ['class' => 'form-control input-default', 'required']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('password_confirmation', "Confirm Password", []) !!}
                                            {!! Form::password('password_confirmation', null, ['class' => 'form-control input-default', 'required']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-warning btn-fw" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-success btn-fw">Update</button>
                        </div>
                    {!! Form::close() !!}

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
    <script>
        function updateClick(item, role){
            console.log(item);
            $('#id').val(item.id);
            $('#name_id').val(item.name);
            $('#email_id').val(item.email);
            $('#role_id').val(role).trigger('change');
        }
    </script>
@endpush
