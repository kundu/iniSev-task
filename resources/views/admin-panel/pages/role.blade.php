@extends('admin-panel.layout.app')
@push('title'){{ $title }}@endpush

@push('css')
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            font-size: 1em!important;
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #3b3e44;
        }
        .select2-container--default .select2-selection--single .select2-search__field, .select2-container--default .select2-dropdown .select2-search__field, .select2-container--default .select2-selection--multiple .select2-search__field {
            color: white;
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
                    <button type="button" class="btn btn-outline-info btn-fw" data-toggle="modal" data-target="#createModal" data-placement="top">Create Role</button>
                </li>
              </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title display-4">Total User: {{ $roles->total() }} </h4>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = $roles->toArray()['from'];  ?>
                                @foreach ($roles as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td> {{ $item->name }} </td>
                                        <td>
                                            @if ($item->id != 1)
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-outline-info dropdown-toggle" id="dropdownMenuIconButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="mdi mdi-logout"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton5">
                                                        @php
                                                            $permissionIds =$item->permissions->pluck('id')->toArray();
                                                        @endphp
                                                    <a class="dropdown-item" href="javascript:void()" title="name edit" data-toggle="modal" data-target="#editModal" data-placement="top" onclick="updateClick({{ json_encode($item) }}, {{ json_encode($permissionIds) }})">Edit</a>
                                                    </div>
                                                </div>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $roles->appends(request()->query())->links('admin-panel.partial.pagination') }}
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
                        <h5 class="modal-title">Create New Role</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>

                    {!! Form::open(['route' => 'admin.users.role.store', 'method' => 'post']) !!}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('name', "Role Name", []) !!}
                                            {!! Form::text('name', null, ['class' => 'form-control input-default', 'required']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('permission_ids', "Select Permissions", []) !!}
                                            {!! Form::select('permission_ids[]', $permissions, null, ['class' => 'form-control select2', 'multiple', 'required']) !!}
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
                        <h5 class="modal-title">Edit Role</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>

                    {!! Form::open(['route' => 'admin.users.role.update', 'method' => 'put']) !!}
                        <input type="hidden" name="id" id="id">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('name', "Role Name", []) !!}
                                            {!! Form::text('name', null, ['class' => 'form-control input-default', 'required', 'id'=>'name_id']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="basic-form">
                                        <div class="form-group">
                                            {!! Form::label('permission_id', "Select Permissions", []) !!}
                                            {!! Form::select('permission_id[]', $permissions, null, ['class' => 'form-control select2', 'id' => 'permission_id', 'multiple', 'required']) !!}
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
        function updateClick(item, permissionIds){
            console.log(item, permissionIds);
            $('#id').val(item.id);
            $('#name_id').val(item.name);
            $.each(permissionIds, function(idx, val) {
                console.log(val);
                $("#permission_id option[value='"+val+"']").attr("selected", "selected").trigger('change');
            });
        }
    </script>
@endpush
