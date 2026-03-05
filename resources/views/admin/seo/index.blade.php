@extends('adminlte::page')

@section('title', __('messages.seo_settings'))

@section('content_header')
    <h1>{{ __('messages.manage_seo') }}</h1>
@stop

@section('plugins.Datatables', true)
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header border-0 pb-0">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h3 class="card-title m-0">{{ __('messages.manage_seo') }}</h3>
                <a href="{{ route('admin.seo.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> {{ __('messages.add_seo_page') }}
                </a>
            </div>
        </div>

        <div class="card-body">
            <table id="seoTable" class="table table-bordered table-striped table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>{{ __('admin.page_identifier') }}</th>
                        <th>{{ __('admin.meta_title') }}</th>
                        <th width="120">{{ __('admin.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($seoMetas as $seo)
                        <tr>
                            <td>{{ $seo->page }}</td>
                            <td>{{ $seo->{'title_'.app()->getLocale()} ?? $seo->title_en ?? $seo->title_ar }}</td>
                            <td>
                                <a href="{{ route('admin.seo.edit', $seo->id) }}" class="btn btn-sm btn-warning">
                                    {{ __('messages.edit') }}
                                </a>

                                <form action="{{ route('admin.seo.destroy', $seo->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        {{ __('messages.delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
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
        $('#seoTable').DataTable({
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
