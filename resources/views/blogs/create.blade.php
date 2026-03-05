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
                'ar' => __('messages.arabic') ?? 'العربية',
                'en' => __('messages.english') ?? 'English',
                'fr' => __('messages.french') ?? 'Français',
                'es' => __('messages.spanish') ?? 'Español',
            ];
        @endphp

        <div class="card card-outline card-primary mb-3">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    @foreach ($langs as $key => $lang)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="custom-tabs-{{ $key }}-tab" data-toggle="pill" href="#custom-tabs-{{ $key }}" role="tab" aria-controls="custom-tabs-{{ $key }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                @if($key == 'ar') 🇸🇦 
                                @elseif($key == 'en') 🇬🇧 
                                @elseif($key == 'fr') 🇫🇷 
                                @elseif($key == 'es') 🇪🇸 
                                @endif
                                {{ $lang }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    @foreach ($langs as $key => $lang)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="custom-tabs-{{ $key }}" role="tabpanel" aria-labelledby="custom-tabs-{{ $key }}-tab">
                            
                            <h5 class="text-primary border-bottom pb-2">{{ __('messages.content_details') ?? 'تفاصيل المحتوى' }}</h5>
                            <div class="form-group mb-3">
                                <label>{{ __('messages.title') ?? 'العنوان' }} ({{ $lang }}) <span class="text-danger">*</span></label>
                                <input type="text" name="name_{{ $key }}" class="form-control" value="{{ old('name_' . $key) }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>{{ __('messages.description') ?? 'المحتوى' }} ({{ $lang }}) <span class="text-danger">*</span></label>
                                <textarea name="description_{{ $key }}" class="form-control editor" rows="4">{{ old('description_' . $key) }}</textarea>
                            </div>

                            <h5 class="text-success border-bottom pb-2 mt-4">{{ __('messages.seo_settings_for_each_language') ?? 'إعدادات محركات البحث (SEO)' }}</h5>
                            <div class="row">
                                <div class="col-md-6 form-group mb-3">
                                    <label>{{ __('messages.seo') ?? 'SEO' }} {{ __('messages.title') ?? 'العنوان' }} ({{ $lang }})</label>
                                    <input type="text" name="seo_title_{{ $key }}" class="form-control" value="{{ old('seo_title_' . $key) }}">
                                </div>
                                <div class="col-md-6 form-group mb-3">
                                    <label>{{ __('messages.seo') ?? 'SEO' }} {{ __('messages.keywords') ?? 'الكلمات المفتاحية' }} ({{ $lang }})</label>
                                    <input type="text" name="seo_keywords_{{ $key }}" class="form-control" value="{{ old('seo_keywords_' . $key) }}">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>{{ __('messages.seo') ?? 'SEO' }} {{ __('messages.description') ?? 'الوصف' }} ({{ $lang }})</label>
                                <textarea name="seo_description_{{ $key }}" class="form-control" rows="3">{{ old('seo_description_' . $key) }}</textarea>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>


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
