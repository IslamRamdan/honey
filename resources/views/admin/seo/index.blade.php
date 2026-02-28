@extends('adminlte::page')

@section('title', __('messages.seo_settings'))

@section('content_header')
    <h1>{{ __('messages.manage_seo') }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('admin.seo.create') }}" class="btn btn-primary">
                {{ __('messages.add_seo_page') }}
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>{{ __('messages.page') }}</th>
                        <th>{{ __('messages.title') }} (AR)</th>
                        <th>{{ __('messages.title') }} (EN)</th>
                        <th>{{ __('messages.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($seoMetas as $seo)
                        <tr>
                            <td>{{ $seo->page }}</td>
                            <td>{{ $seo->title_ar }}</td>
                            <td>{{ $seo->title_en }}</td>
                            <td>
                                <a href="{{ route('admin.seo.edit', $seo->id) }}" class="btn btn-sm btn-warning">
                                    {{ __('messages.edit') }}
                                </a>

                                <form action="{{ route('admin.seo.destroy', $seo->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('{{ __('messages.confirm_delete') }}')">
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
