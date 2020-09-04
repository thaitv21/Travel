@extends('admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ trans('admin.users_list') }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th>{{ trans('admin.id') }}</th>
                        <th>{{ trans('admin.name') }}</th>
                        <th>{{ trans('admin.email') }}</th>
                        <th>{{ trans('admin.avt') }}</th>
                        <th>{{ trans('admin.role') }}</th>
                        <th>{{ trans('admin.status') }}</th>
                        <th>{{ trans('admin.action') }}</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><img class="img-avt-admin"src="{{ asset($user->avatar) }}"></td>
                                <td>{{ $user->role_id }}</td>
                                <td>{{ $user->status }}</td>
                                <td><a href="{{ route('hidden_user', $user->id) }}" class="btn-hide" id="user_action">{{ trans('admin.action') }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
