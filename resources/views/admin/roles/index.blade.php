@extends('adminlte::page')

@section('title', __('admin.roles'))

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>{{ __('admin.roles') }}</h1>

        <a href="{{ route('admin.roles.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i>
            {{ __('admin.add_role') }}
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
            <h3 class="card-title m-0">{{ __('admin.roles_list') }}</h3>
        </div>

        <div class="card-body">
            <table id="rolesTable" class="table table-bordered table-striped table-hover text-center">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>{{ __('admin.role_name') }}</th>
                        <th>{{ __('admin.permissions') }}</th>
                        <th>{{ __('admin.users_count') }}</th>
                        <th>{{ __('admin.actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $role->name }}</strong>
                                @if($role->name === 'super-admin')
                                    <span class="badge badge-danger ml-1">{{ __('admin.protected') }}</span>
                                @endif
                            </td>
                            <td class="text-left">
                                @if($role->name === 'super-admin')
                                    <span class="badge badge-success">{{ __('admin.all_permissions') }}</span>
                                @else
                                    @foreach($role->permissions as $permission)
                                        <span class="badge badge-info mb-1">{{ __('admin.perm_' . str_replace('-', '_', $permission->name)) }}</span>
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ $role->users()->count() }}</td>
                            <td>
                                @if($role->name !== 'super-admin')
                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">{{ __('admin.no_roles') }}</td>
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
            [dir="rtl"] .main-sidebar { right: 0; left: auto; }
            [dir="rtl"] .content-wrapper,
            [dir="rtl"] .main-footer { margin-right: 250px; margin-left: 0; }
        </style>
    @endif
@endsection

@section('js')
<script>
    $(function () {
        $('#rolesTable').DataTable({
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
