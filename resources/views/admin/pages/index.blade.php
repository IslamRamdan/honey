@extends('adminlte::page')
@section('title', __('admin.manage_pages'))
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
                <h3 class="card-title m-0">{{ __('admin.manage_pages') }}</h3>
                <a href="{{ route('admin.pages.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> {{ __('admin.add_page') }}</a>
            </div>
        </div>
        <div class="card-body">
            <table id="pagesTable" class="table table-bordered table-striped table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>{{ __('admin.slug') }}</th>
                        <th>{{ __('admin.title') }}</th>
                        <th>{{ __('admin.icon') }}</th>
                        <th>{{ __('admin.status') }}</th>
                        <th width="120">{{ __('admin.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $page)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><code>{{ $page->slug }}</code></td>
                        <td>{{ Str::limit($page->{'title_' . $locale} ?? $page->title_en ?? $page->title_ar, 50) }}</td>
                        <td>@if($page->icon)<i class="{{ $page->icon }}"></i> <small class="text-muted">{{ $page->icon }}</small>@endif</td>
                        <td>{!! $page->is_active ? '<span class="badge badge-success">'.__('admin.active').'</span>' : '<span class="badge badge-danger">'.__('admin.inactive').'</span>' !!}</td>
                        <td>
                            <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="d-inline delete-form">
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
    $('#pagesTable').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "language": { "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json' : (app()->getLocale() == 'fr' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json' : (app()->getLocale() == 'es' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json' : '')) }}" }
    });
});
</script>
@endsection
