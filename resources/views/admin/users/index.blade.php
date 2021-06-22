@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-responsive-sm">
                                <thead>
                                <tr>
                                    <th>{{ trans('admin.manage_data.users.content.register_time') }}</th>
                                    <th>{{ trans('admin.manage_data.users.content.name') }}</th>
                                    <th>{{ trans('admin.manage_data.users.content.email') }}</th>
                                    <th>{{ trans('admin.manage_data.users.content.website') }}</th>
                                    <th>{{ trans('admin.manage_data.users.content.payment_plan') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->website }}</td>
                                        <td>
                                            @if ($user->has_free_access)
                                                {{ trans('admin.manage_data.users.content.free_access.title') }}
                                                <form action="{{ route('admin.users.toggle_free_access', $user) }}"
                                                      method="POST"
                                                      style="display: inline-block; margin-left: 10px">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        {{ trans('admin.manage_data.users.content.free_access.content.remove') }}
                                                    </button>
                                                </form>
                                            @else
                                                ---
                                                <form action="{{ route('admin.users.toggle_free_access', $user) }}"
                                                      method="POST"
                                                      style="display: inline-block; margin-left: 10px">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-info">
                                                        {{ trans('admin.manage_data.users.content.free_access.content.give') }}
                                                    </button>
                                                </form>
                                            @endif
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
        </div>
    </div>
@endsection
