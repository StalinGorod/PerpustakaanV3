@extends('layout')

@section('content')

<body>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Users</h1>
        </div>

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="card-text">
                            <a href="/tambahuser" class="btn btn-primary">Tambah User</a>
                            <hr>
                            <table class="table table-bordered col-lg-6">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no=1;
                                    @endphp
                                    @foreach($user as $u)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$u->username}}</td>
                                        <td>{{$u->level}}</td>
                                        <td>
                                            <a href="/edituser/{{$u->user_id}}" class="btn btn-success">Edit</a>
                                            <a href="/deleteuser/{{$u->user_id}}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                                        </td>
                                    </tr>
                                    @php
                                    $no++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    @include('sweetalert::alert')
</body>
<!-- /.container-fluid -->
@endsection