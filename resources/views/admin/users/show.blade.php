@extends(Auth()->user()->type === 1 ? 'layouts.admin' : 'layouts.user')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">User Detail</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item active">User Detail</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row settings-tab">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header all-center">
                            <a href="#" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle"
                                    src="{{ asset('assets/img/profiles/avatar-02.jpg') }}" alt="User Image">
                                <i class="fe fe-camera"></i>
                            </a>
                            <h6>{{ $user->name }}</h6>
                            <p>{{ $user->role_name }}</p>
                        </div>
                        <div class="card-body p-0">
                            <div class="profile-list">
                                <i class="fa-solid fa-id-card"></i>
                                ID
                                <h5 class="float-end">{{ $user->id }}</h5>
                            </div>
                            <div class="profile-list">
                                <i class="fa-solid fa-envelope"></i>
                                Email
                                <h5 class="float-end">{{ $user->email }}</h5>
                            </div>
                            <div class="profile-list">
                                <i class="fa-solid fa-phone"></i>
                                Phone
                                <h5 class="float-end">{{ $user->phone }}</h5>
                            </div>
                            <div class="profile-list">
                                <button type="button" class="btn btn-block btn-outline-light">View History</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">User Courses</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Old Price</th>
                                        <th>Lessons</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td>{{ $course->name }}</td>
                                            <td>{{ $course->price }} $</td>
                                            <td>{{ $course->old_price }} $</td>
                                            <td>{{ $course->lessons_count }}</td>
                                            <td>{{ $course->category->name ?? null }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
