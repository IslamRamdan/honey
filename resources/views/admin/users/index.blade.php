@extends('adminlte::page')

@section('title', __('messages.users'))

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>{{ __('messages.users') }}</h1>

        <a href="{{ route('users.create') }}" class="btn btn-success">
            <i class="fas fa-user-plus"></i>
            {{ __('messages.add_user') }}
        </a>
    </div>
@stop


@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('messages.users_list') }}</h3>
        </div>

        <div class="card-body p-0">
            <table class="table table-bordered table-hover text-center">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>{{ __('messages.user') }}</th>
                        <th>{{ __('messages.email') }}</th>
                        <th>{{ __('messages.created_at') }}</th>
                        <th>{{ __('messages.actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td class="text-left">
                                <strong>{{ $user->name }}</strong>
                            </td>

                            <td>{{ $user->email }}</td>

                            <td>{{ $user->created_at->format('Y-m-d') }}</td>

                            <td>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('{{ __('messages.confirm_delete') }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">{{ __('messages.no_users') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer clearfix">
            {{ $users->links() }}
        </div>
    </div>

@stop
@section('adminlte_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">

    @if (app()->getLocale() == 'ar')
        <style>
            [dir="rtl"] .main-sidebar {
                right: 0;
                left: auto;
            }

            [dir="rtl"] .content-wrapper,
            [dir="rtl"] .main-footer {
                margin-right: 250px;
                margin-left: 0;
            }
        </style>
    @endif
@endsection
