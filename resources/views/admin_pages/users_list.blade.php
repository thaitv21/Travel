@extends('admin')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header row">
            <h6 class="m-0 font-weight-bold text-primary col-lg-10">{{ trans('admin.users_list') }}</h6>
            <a class="btn btn-success col-lg-2 text-white" href="{{ route('action_users.index') }}">{{ trans('admin.add_btn') }}</a>
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
                                @if ($user->role_id == config('constains.is_user'))
                                    <td>{{ trans('admin.user') }}</td>
                                @else
                                    <td>{{ trans('admin.admin_acc') }}</td>
                                @endif
                                
                                @if ($user->status == config('constains.hidden'))
                                    <td><a href="{{ route('hidden_user', $user->id) }}" class="btn btn-primary" id="user_action">{{ trans('admin.btn_lock') }}</a></td>
                                @else 
                                    <td><a href="{{ route('hidden_user', $user->id) }}" class="btn btn-primary" id="user_action">{{ trans('admin.unlock') }}</a></td>
                                @endif
                                <td><form 
                                        action="{{ route('action_users.edit', $user->id) }}" 
                                        method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-primary float-right">
                                            {{ trans('admin.edit') }}
                                        </button>
                                    </form>
                                </td>
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
