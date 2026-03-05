@extends('adminlte::page')

@section('title', __('admin.activity_logs'))

@section('plugins.Datatables', true)

@section('content_header')
    <h1>{{ __('admin.activity_logs') }}</h1>
@stop

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('admin.activity_logs') }}</h3>
        </div>
        <div class="card-body">
            <table id="activityTable" class="table table-bordered table-striped table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>{{ __('admin.causer') }}</th>
                        <th>{{ __('admin.description_log') }}</th>
                        <th>{{ __('admin.subject') }}</th>
                        <th>IP</th>
                        <th>{{ __('admin.date') }}</th>
                        <th>{{ __('admin.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($log->causer)
                                    <span class="badge badge-info">{{ $log->causer->name }}</span>
                                @else
                                    <span class="text-muted">System</span>
                                @endif
                            </td>
                            <td>
                                @if($log->description == 'created')
                                    <span class="badge badge-success">{{ __('admin.add') }}</span>
                                @elseif($log->description == 'updated')
                                    <span class="badge badge-warning">{{ __('admin.edit') }}</span>
                                @elseif($log->description == 'deleted')
                                    <span class="badge badge-danger">{{ __('admin.delete') }}</span>
                                @else
                                    <span class="badge badge-secondary">{{ $log->description }}</span>
                                @endif
                            </td>
                            <td>
                                @if($log->subject_type)
                                    <code>{{ class_basename($log->subject_type) }} #{{ $log->subject_id }}</code>
                                @else
                                    -
                                @endif
                            </td>
                            <td><span class="badge badge-dark">{{ $log->ip_address ?? 'N/A' }}</span></td>
                            <td dir="ltr" class="text-right">{{ $log->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.activity_logs.show', $log->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i> {{ __('admin.details') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
<script>
    $(function () {
        $('#activityTable').DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "order": [[5, "desc"]],
            "language": {
                "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json' : (app()->getLocale() == 'fr' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json' : (app()->getLocale() == 'es' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json' : '')) }}"
            }
        });
    });
</script>
@endsection
