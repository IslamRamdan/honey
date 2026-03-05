@extends('adminlte::page')
@section('title', __('admin.manage_faqs'))
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
                <h3 class="card-title m-0">{{ __('admin.manage_faqs') }}</h3>
                <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> {{ __('admin.add_faq') }}</a>
            </div>
        </div>
        <div class="card-body">
            <table id="faqsTable" class="table table-bordered table-striped table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>{{ __('admin.question') }}</th>
                        <th>{{ __('admin.answer') }}</th>
                        <th>{{ __('admin.order') }}</th>
                        <th>{{ __('admin.status') }}</th>
                        <th width="120">{{ __('admin.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faqs as $faq)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Str::limit($faq->{'question_' . $locale} ?? $faq->question_en ?? $faq->question_ar, 60) }}</td>
                        <td>{{ Str::limit($faq->{'answer_' . $locale} ?? $faq->answer_en ?? $faq->answer_ar, 80) }}</td>
                        <td>{{ $faq->sort_order }}</td>
                        <td>{!! $faq->is_active ? '<span class="badge badge-success">'.__('admin.active').'</span>' : '<span class="badge badge-danger">'.__('admin.inactive').'</span>' !!}</td>
                        <td>
                            <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="d-inline delete-form">
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
    $('#faqsTable').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "language": { "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json' : (app()->getLocale() == 'fr' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json' : (app()->getLocale() == 'es' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json' : '')) }}" }
    });
});
</script>
@endsection
