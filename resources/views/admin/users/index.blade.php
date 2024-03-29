@extends(Auth()->user()->type === 1 ? 'layouts.admin' : 'layouts.user')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            @if (session()->has('notification'))
                <div class="alert alert-success alert-dismissible">{{ session()->get('notification') }}</div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible">{{ session()->get('error') }}</div>
            @endif
            <div class="page-header">
                <div class="user align-items-center">
                    <div class="col">
                        <h3 class="page-title">Tài khoản quản trị</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Danh sách User</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="user">
                <div class="col-md-12 d-flex ">
                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title float-start mr-auto">Danh sách User</h4>
                            <x-search-form>
                                <x-slot:slot>
                                    <select name="role" id="role" class="form-select">
                                        <option></option>
                                        <option value="1" {{ request()->role == 1 ? 'selected' : '' }}>Admin</option>
                                        <option value="3" {{ request()->role == 3 ? 'selected' : '' }}>Student</option>
                                    </select>
                                </x-slot:slot>
                            </x-search-form>
                            <a href="{{ route('user.create') }}"><button class="btn btn-primary add">Tạo tài khoản mới<i
                                        class="fa-solid fa-plus"></i></button></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive no-radius">
                                <table class="table table-hover table-center table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                ID
                                                <x-sort-link columnName="id" />
                                            </th>
                                            <th>Tên
                                                <x-sort-link columnName="name" />
                                            </th>
                                            <th>Số điện thoại</th>
                                            <th> Email
                                                <x-sort-link columnName="email" />
                                            </th>
                                            <th class="text-center">Type</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="font-weight-600">{{ $user->id }}</div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('user.show', ['user' => $user->id]) }}">
                                                        {{ $user->name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $user->phone }}
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $user->role_name }}
                                                </td>
                                                <td>
                                                    {{ $user->created_at }}
                                                </td>
                                                <td>
                                                    {{ $user->updated_at }}
                                                </td>
                                                <td>
                                                    <div class="actions d-flex">
                                                        <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                                                            class="btn btn-sm bg-success-light me-2 edit-btn">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>

                                                        <x-button-delete
                                                            route="{{ route('user.destroy', ['user' => $user->id]) }}"
                                                            deleteId="{{ $user->id }}"
                                                            isUser="true" />
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div class="mt-5">
                                    {{ $users->appends(request()->all())->links() }}</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('/assets/js/user.js') }}"></script>
@endpush
