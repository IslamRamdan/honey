@extends('adminlte::page')
@section('title', __('admin.manage_map_locations') ?? 'إدارة مواقع الخريطة')
@section('plugins.Datatables', true)
@section('content')
@php $locale = app()->getLocale(); @endphp
<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card card-outline card-primary">
        <div class="card-header border-0 pb-0">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h3 class="card-title m-0">{{ __('admin.manage_map_locations') ?? 'إدارة مواقع الخريطة' }}</h3>
                <a href="{{ route('admin.map_locations.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> {{ __('admin.add_new') ?? 'إضافة جديد' }}</a>
            </div>
        </div>
        <div class="card-body">
            <table id="mapLocationsTable" class="table table-bordered table-striped table-hover">
                <thead class="bg-light">
                    <tr>
                        <th width="50">#</th>
                        <th>{{ __('admin.title') ?? 'العنوان' }}</th>
                        <th>{{ __('admin.latitude') ?? 'خط العرض' }}</th>
                        <th>{{ __('admin.longitude') ?? 'خط الطول' }}</th>
                        <th>{{ __('admin.order') ?? 'الترتيب' }}</th>
                        <th>{{ __('admin.status') ?? 'الحالة' }}</th>
                        <th width="120">{{ __('admin.actions') ?? 'الإجراءات' }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($locations as $location)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $location->{'title_' . $locale} ?? $location->title_en ?? $location->title_ar }}</td>
                        <td>{{ $location->latitude }}</td>
                        <td>{{ $location->longitude }}</td>
                        <td>{{ $location->sort_order }}</td>
                        <td>{!! $location->is_active ? '<span class="badge badge-success">'.(__('admin.active') ?? 'مفعل').'</span>' : '<span class="badge badge-danger">'.(__('admin.inactive') ?? 'غير مفعل').'</span>' !!}</td>
                        <td>
                            <a href="{{ route('admin.map_locations.edit', $location) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.map_locations.destroy', $location) }}" method="POST" class="d-inline delete-form">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(function () {
    $('#mapLocationsTable').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "order": [],
        "language": { "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json' : (app()->getLocale() == 'fr' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json' : (app()->getLocale() == 'es' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json' : '')) }}" }
    });
});
</script>
@endsection
