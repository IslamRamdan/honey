@extends('adminlte::page')

@section('title', __('messages.add_seo'))

@section('content_header')
    <h1>{{ __('messages.add_seo') }}</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('admin.seo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">

                {{-- اختيار الصفحة --}}
                <div class="form-group">
                    <label>{{ __('messages.choose_page') }}</label>
                    <select name="page" class="form-control select2" required>
                        <option value="">{{ __('messages.select_page') }}</option>
                        <option value="home">{{ __('messages.home') }}</option>
                        <option value="about">{{ __('messages.about') }}</option>
                        <option value="contact">{{ __('messages.contact') }}</option>
                        <option value="categories">{{ __('messages.products') }}</option>
                        <option value="all-blogs">{{ __('messages.blogs') }}</option>
                        <option value="all-news">{{ __('messages.news') }}</option>
                        <option value="categories.show.products">{{ __('messages.products') }}</option>
                    </select>
                </div>

                {{-- اللغات --}}
                @foreach (['ar' => 'arabic', 'en' => 'english', 'fr' => 'french', 'es' => 'spanish'] as $code => $lang)
                    <div class="card card-outline card-primary mb-3">
                        <div class="card-header">
                            <h5 class="card-title">{{ __('messages.' . $lang) }}</h5>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label>{{ __('messages.title') }} ({{ strtoupper($code) }})</label>
                                <input type="text" name="title_{{ $code }}" class="form-control"
                                    value="{{ old('title_' . $code) }}">
                            </div>

                            <div class="form-group">
                                <label>{{ __('messages.description') }} ({{ strtoupper($code) }})</label>
                                <textarea name="description_{{ $code }}" class="form-control" rows="3">{{ old('description_' . $code) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>{{ __('messages.keywords') }} ({{ strtoupper($code) }})</label>
                                <input type="text" name="keywords_{{ $code }}" class="form-control"
                                    value="{{ old('keywords_' . $code) }}">
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- OG Image --}}
                <div class="form-group mt-3">
                    <label>{{ __('messages.og_image') }}</label>
                    <input type="file" name="image" class="form-control">
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-success">{{ __('messages.save') }}</button>
            </div>
        </form>
    </div>
@stop

@push('js')
    <script>
        $('.select2').select2({
            width: '100%'
        });
    </script>
@endpush

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
