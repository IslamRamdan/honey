@extends('adminlte::page')

@section('title', __('admin.users'))

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>{{ __('admin.users') }}</h1>

        <a href="{{ route('users.create') }}" class="btn btn-success">
            <i class="fas fa-user-plus"></i>
            {{ __('admin.add_user') }}
        </a>
    </div>
@stop

@section('plugins.Datatables', true)
@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        </div>
    @endif

    <div class="card card-outline card-primary">
        <div class="card-header border-0 pb-0">
            <h3 class="card-title m-0">{{ __('admin.manage_users') }}</h3>
        </div>

        <div class="card-body">
            <table id="usersTable" class="table table-bordered table-striped table-hover text-center">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>{{ __('admin.name') }}</th>
                        <th>{{ __('admin.email') }}</th>
                        <th>{{ __('admin.role') }}</th>
                        <th>{{ __('admin.date') }}</th>
                        <th>{{ __('admin.actions') }}</th>
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

                            <td>
                                @foreach($user->roles as $role)
                                    <span class="badge badge-{{ $role->name === 'super-admin' ? 'danger' : ($role->name === 'admin' ? 'primary' : 'success') }}">
                                        {{ $role->name }}
                                    </span>
                                @endforeach
                            </td>

                            <td>{{ $user->created_at->format('Y-m-d') }}</td>

                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>

                                @if(auth()->id() !== $user->id)
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">{{ __('admin.no_users') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
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

@section('js')
<script>
    $(function () {
        $('#usersTable').DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "language": {
                "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json' : (app()->getLocale() == 'fr' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json' : (app()->getLocale() == 'es' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json' : '')) }}"
            }
        });
    });
</script>
@endsection
