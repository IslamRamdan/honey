@extends('adminlte::page')

@section('title', __('messages.edit_seo'))

@section('content_header')
    <h1>{{ __('messages.edit_seo') }}</h1>
@stop

@section('content')
    <div class="card">
        <form action="{{ route('admin.seo.update', $seo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">

                {{-- اختيار الصفحة --}}
                <div class="form-group">
                    <label>{{ __('messages.choose_page') }}</label>
                    <select name="page" class="form-control">
                        <option value="home" {{ $seo->page == 'home' ? 'selected' : '' }}>{{ __('messages.home') }}
                        </option>
                        <option value="about" {{ $seo->page == 'about' ? 'selected' : '' }}>{{ __('messages.about_us') }}
                        </option>
                        <option value="contact" {{ $seo->page == 'contact' ? 'selected' : '' }}>{{ __('messages.contact') }}
                        </option>
                        <option value="categories" {{ $seo->page == 'categories' ? 'selected' : '' }}>
                            {{ __('messages.products') }}</option>
                        <option value="all-blogs" {{ $seo->page == 'all-blogs' ? 'selected' : '' }}>
                            {{ __('messages.blogs') }}</option>
                        <option value="all-news" {{ $seo->page == 'all-news' ? 'selected' : '' }}>
                            {{ __('messages.news') }}</option>
                    </select>
                </div>

                {{-- اللغات --}}
                @foreach (['ar' => 'Arabic', 'en' => 'English', 'fr' => 'French', 'es' => 'Spanish'] as $code => $label)
                    <div class="card card-outline card-primary mb-3">
                        <div class="card-header">
                            <h5 class="card-title">{{ __('messages.' . strtolower($label)) }}</h5>
                        </div>

                        <div class="card-body">
                            {{-- Title --}}
                            <div class="form-group">
                                <label>{{ __('messages.title') }} ({{ strtoupper($code) }})</label>
                                <input type="text" name="title_{{ $code }}" class="form-control"
                                    value="{{ old('title_' . $code, $seo->{'title_' . $code}) }}">
                            </div>

                            {{-- Description --}}
                            <div class="form-group">
                                <label>{{ __('messages.description') }} ({{ strtoupper($code) }})</label>
                                <textarea name="description_{{ $code }}" class="form-control" rows="3">{{ old('description_' . $code, $seo->{'description_' . $code}) }}</textarea>
                            </div>

                            {{-- Keywords --}}
                            <div class="form-group">
                                <label>{{ __('messages.keywords') }} ({{ strtoupper($code) }})</label>
                                <input type="text" name="keywords_{{ $code }}" class="form-control"
                                    value="{{ old('keywords_' . $code, $seo->{'keywords_' . $code}) }}">
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- OG Image --}}
                <div class="form-group">
                    <label>{{ __('messages.og_image') }}</label>
                    <input type="file" name="image" class="form-control">
                    @if ($seo->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $seo->image) }}" alt="OG Image" width="150">
                        </div>
                    @endif
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-success">{{ __('messages.save_changes') }}</button>
            </div>
        </form>
    </div>
@stop

@push('js')
    <script>
        // أي JS إضافي إذا حبيت
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
