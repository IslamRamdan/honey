@extends('adminlte::page')

@section('title', __('messages.add_blog'))

@section('content_header')
    <h1>{{ __('messages.add_new_blog') }}</h1>
@stop

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- الصورة الرئيسية --}}
        <div class="form-group">
            <label>{{ __('messages.main_image') }}</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        {{-- الصور الإضافية --}}
        <div class="form-group">
            <label>{{ __('messages.additional_images') }}</label>
            <input type="file" name="images[]" class="form-control" multiple accept="image/*">
        </div>

        {{-- الفيديوهات --}}
        <div class="form-group">
            <label>{{ __('messages.videos_limit') }}</label>
            <input type="file" name="videos[]" class="form-control" multiple
                accept="video/mp4,video/webm,video/ogg,video/quicktime">
            <small class="text-muted">
                {{ __('messages.allowed_formats') }}
            </small>
        </div>

        {{-- الحالة --}}
        <div class="form-group">
            <label>{{ __('messages.status') }}</label>
            <select name="status" class="form-control">
                <option value="new" {{ old('status') == 'new' ? 'selected' : '' }}>{{ __('messages.new') }}</option>
                <option value="blog" {{ old('status') == 'blog' ? 'selected' : '' }}>{{ __('messages.blog') }}</option>
            </select>
        </div>

        {{-- اللغات --}}
        @php
            $langs = [
                'ar' => __('messages.arabic'),
                'en' => __('messages.english'),
                'fr' => __('messages.french'),
                'es' => __('messages.spanish'),
            ];
        @endphp

        @foreach ($langs as $key => $lang)
            <div class="card card-outline card-primary mb-3">
                <div class="card-header">
                    <h5 class="card-title">{{ $lang }}</h5>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>{{ __('messages.title') }}</label>
                        <input type="text" name="name_{{ $key }}" class="form-control"
                            value="{{ old('name_' . $key) }}" required>
                    </div>

                    <div class="form-group">
                        <label>{{ __('messages.description') }}</label>
                        <textarea name="description_{{ $key }}" class="form-control editor" rows="4">{{ old('description_' . $key) }}</textarea>
                    </div>
                </div>
            </div>
        @endforeach
        <h4 class="mt-4">{{ __('messages.seo_settings_for_each_language') }}</h4>
        @foreach (['ar' => __('messages.arabic'), 'en' => __('messages.english'), 'fr' => __('messages.french'), 'es' => __('messages.spanish')] as $code => $label)
            <div class="card card-outline card-success mb-3">
                <div class="card-header">
                    <h5 class="card-title">{{ __('messages.seo') }} ({{ $label }})</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>{{ __('messages.title') }} ({{ $label }})</label>
                        <input type="text" name="seo_title_{{ $code }}" class="form-control"
                            value="{{ old('seo_title_' . $code, $blog->{'seo_title_' . $code} ?? '') }}">
                    </div>
                    <div class="form-group">
                        <label>{{ __('messages.description') }} ({{ $label }})</label>
                        <textarea name="seo_description_{{ $code }}" class="form-control" rows="3">{{ old('seo_description_' . $code, $blog->{'seo_description_' . $code} ?? '') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>{{ __('messages.keywords') }} ({{ $label }})</label>
                        <input type="text" name="seo_keywords_{{ $code }}" class="form-control"
                            value="{{ old('seo_keywords_' . $code, $blog->{'seo_keywords_' . $code} ?? '') }}">
                    </div>
                </div>
            </div>
        @endforeach


        <button type="submit" class="btn btn-success mt-3">
            <i class="fas fa-save"></i> {{ __('messages.save_blog') }}
        </button>

        <a href="{{ route('blogs.index') }}" class="btn btn-secondary mt-3">
            {{ __('messages.back') }}
        </a>
    </form>

@stop

@section('js')
    {{-- CKEditor 5 --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
    <script>
        document.querySelectorAll('.editor').forEach((textarea) => {
            ClassicEditor
                .create(textarea)
                .catch(error => console.error(error));
        });
    </script>
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
