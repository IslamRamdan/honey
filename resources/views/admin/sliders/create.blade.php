@extends('adminlte::page')
@section('title', __('admin.add_slider_title'))
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header"><h3 class="card-title">{{ __('admin.add_slider_title') }}</h3></div>
        <div class="card-body">
            <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>{{ __('admin.slider_image') }} *</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" required>
                    @error('image') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                @php
                    $langs = [
                        'ar' => __('messages.arabic') ?? 'العربية',
                        'en' => __('messages.english') ?? 'English',
                        'fr' => __('messages.french') ?? 'Français',
                        'es' => __('messages.spanish') ?? 'Español',
                    ];
                @endphp
                <div class="card card-outline card-primary mb-3 mt-3">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            @foreach ($langs as $key => $lang)
                                <li class="nav-item">
                                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="custom-tabs-{{ $key }}-tab" data-toggle="pill" href="#custom-tabs-{{ $key }}" role="tab">
                                        @if($key == 'ar') 🇸🇦 @elseif($key == 'en') 🇬🇧 @elseif($key == 'fr') 🇫🇷 @elseif($key == 'es') 🇪🇸 @endif
                                        {{ $lang }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($langs as $key => $lang)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="custom-tabs-{{ $key }}" role="tabpanel">
                                    <div class="form-group mb-0">
                                        <label>{{ __('admin.alt_text') }} ({{ $lang }})</label>
                                        <input type="text" name="alt_{{ $key }}" class="form-control" value="{{ old('alt_' . $key) }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{ __('admin.order') }}</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                    </div>
                    <div class="form-group col-md-6 d-flex align-items-end">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" checked>
                            <label class="custom-control-label" for="is_active">{{ __('admin.enabled') }}</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ __('admin.save') }}</button>
                <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">{{ __('admin.back') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection
