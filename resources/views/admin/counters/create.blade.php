@extends('adminlte::page')
@section('title', __('admin.add_counter_title'))
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header"><h3 class="card-title">{{ __('admin.add_counter_title') }}</h3></div>
        <div class="card-body">
            <form action="{{ route('admin.counters.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>{{ __('admin.icon') }} (CSS Class) *</label>
                        <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon') }}" placeholder="e.g. fas fa-cart-shopping" required>
                        @error('icon') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label>{{ __('admin.number') }} *</label>
                        <input type="text" name="number" class="form-control @error('number') is-invalid @enderror" value="{{ old('number') }}" placeholder="e.g. 28000000" required>
                        @error('number') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label>{{ __('admin.display_text') }}</label>
                        <input type="text" name="display_text" class="form-control" value="{{ old('display_text') }}" placeholder="e.g. 28M+">
                    </div>
                </div>
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
                                    <div class="form-group mb-0">
                                        <label>{{ __('admin.title') }} ({{ $lang }}) @if($key=='ar' || $key=='en') <span class="text-danger">*</span> @endif</label>
                                        <input type="text" name="title_{{ $key }}" class="form-control" value="{{ old('title_' . $key) }}" {{ $key=='ar' || $key=='en' ? 'required' : '' }}>
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
                <a href="{{ route('admin.counters.index') }}" class="btn btn-secondary">{{ __('admin.back') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection
