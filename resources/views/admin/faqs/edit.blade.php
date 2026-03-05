@extends('adminlte::page')
@section('title', __('admin.edit_faq'))
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header"><h3 class="card-title">{{ __('admin.edit_faq') }}</h3></div>
        <div class="card-body">
            <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
                @csrf @method('PUT')
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
                                    <div class="form-group mb-3">
                                        <label>{{ __('admin.question') }} ({{ $lang }}) @if($key=='ar' || $key=='en') <span class="text-danger">*</span> @endif</label>
                                        <textarea name="question_{{ $key }}" class="form-control" rows="3" {{ $key=='ar' || $key=='en' ? 'required' : '' }}>{{ old('question_' . $key, $faq->{'question_' . $key}) }}</textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>{{ __('admin.answer') }} ({{ $lang }}) @if($key=='ar' || $key=='en') <span class="text-danger">*</span> @endif</label>
                                        <textarea name="answer_{{ $key }}" class="form-control" rows="4" {{ $key=='ar' || $key=='en' ? 'required' : '' }}>{{ old('answer_' . $key, $faq->{'answer_' . $key}) }}</textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{ __('admin.order') }}</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $faq->sort_order) }}">
                    </div>
                    <div class="form-group col-md-6 d-flex align-items-end">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" {{ $faq->is_active ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">{{ __('admin.enabled') }}</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ __('admin.update') }}</button>
                <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">{{ __('admin.back') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection
