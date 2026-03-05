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

                {{-- التنقل بين صفحات SEO --}}
                <div class="form-group">
                    <label>{{ __('messages.choose_page') }}</label>
                    <select id="pageSelector" class="form-control">
                        @foreach($allSeoPages as $seoPage)
                            <option value="{{ $seoPage->id }}" {{ $seoPage->id == $seo->id ? 'selected' : '' }}>
                                {{ $seoPage->page }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- حقل مخفي لاسم الصفحة --}}
                <input type="hidden" name="page" value="{{ $seo->page }}">

                {{-- اللغات --}}
                @php
                    $langs = [
                        'ar' => __('messages.arabic') ?? 'العربية',
                        'en' => __('messages.english') ?? 'English',
                        'fr' => __('messages.french') ?? 'Français',
                        'es' => __('messages.spanish') ?? 'Español',
                    ];
                @endphp
                <div class="card card-outline card-primary mb-4 mt-3">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            @foreach ($langs as $code => $lang)
                                <li class="nav-item">
                                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="custom-tabs-{{ $code }}-tab" data-toggle="pill" href="#custom-tabs-{{ $code }}" role="tab" aria-controls="custom-tabs-{{ $code }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        @if($code == 'ar') 🇸🇦 
                                        @elseif($code == 'en') 🇬🇧 
                                        @elseif($code == 'fr') 🇫🇷 
                                        @elseif($code == 'es') 🇪🇸 
                                        @endif
                                        {{ $lang }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($langs as $code => $lang)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="custom-tabs-{{ $code }}" role="tabpanel" aria-labelledby="custom-tabs-{{ $code }}-tab">
                                    <div class="form-group">
                                        <label>{{ __('messages.title') }} ({{ strtoupper($code) }})</label>
                                        <input type="text" name="title_{{ $code }}" class="form-control" value="{{ old('title_' . $code, $seo->{'title_' . $code}) }}">
                                    </div>
                                    <div class="form-group">
                                        <label>{{ __('messages.description') }} ({{ strtoupper($code) }})</label>
                                        <textarea name="description_{{ $code }}" class="form-control" rows="3">{{ old('description_' . $code, $seo->{'description_' . $code}) }}</textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>{{ __('messages.keywords') }} ({{ strtoupper($code) }})</label>
                                        <input type="text" name="keywords_{{ $code }}" class="form-control" value="{{ old('keywords_' . $code, $seo->{'keywords_' . $code}) }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

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
        // التنقل بين صفحات SEO عند تغيير القائمة
        document.getElementById('pageSelector').addEventListener('change', function() {
            var selectedId = this.value;
            window.location.href = '/admin/seo/' + selectedId + '/edit';
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
