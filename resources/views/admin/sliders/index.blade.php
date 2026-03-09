@extends('adminlte::page')
@section('title', __('admin.manage_sliders'))
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
                <h3 class="card-title m-0">{{ __('admin.manage_sliders') }}</h3>
                <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> {{ __('admin.add_slider') }}</a>
            </div>
        </div>
        <div class="card-body">
            <table id="slidersTable" class="table table-bordered table-striped table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>{{ __('admin.image') }}</th>
                        <th>{{ __('admin.alt_text') }}</th>
                        <th>{{ __('admin.order') }}</th>
                        <th>{{ __('admin.status') }}</th>
                        <th width="120">{{ __('admin.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliders as $slider)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('storage/' . $slider->image) }}" height="60" alt="slider"></td>
                        <td>{{ $slider->{'alt_' . $locale} ?? $slider->alt_en ?? $slider->alt_ar }}</td>
                        <td>{{ $slider->sort_order }}</td>
                        <td>{!! $slider->is_active ? '<span class="badge badge-success">'.__('admin.active').'</span>' : '<span class="badge badge-danger">'.__('admin.inactive').'</span>' !!}</td>
                        <td>
                            <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" class="d-inline delete-form">
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

@section('css')
<style>.table img { object-fit: cover; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }</style>
@endsection

@section('js')
<script>
$(function () {
    $('#slidersTable').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "order": [], // This prevents DataTables from overriding the controller's order
        "language": { "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json' : (app()->getLocale() == 'fr' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json' : (app()->getLocale() == 'es' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json' : '')) }}" }
    });
});
</script>
@endsection
