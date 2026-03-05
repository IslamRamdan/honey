@extends('adminlte::page')

@section('title', __('messages.add_new_category'))

@section('content_header')
    <h1>{{ __('messages.add_new_category') }}</h1>
@stop

@section('content')
    <div class="container-fluid">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- الأسماء والوصف لكل لغة --}}
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
                                <div class="form-group">
                                    <label>{{ __('messages.name') ?? 'الاسم' }} ({{ $lang }}) <span class="text-danger">*</span></label>
                                    <input type="text" name="name_{{ $key }}" class="form-control" value="{{ old('name_' . $key) }}" required>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- الصورة --}}
            <div class="form-group mb-3">
                <label>{{ __('messages.image') }}</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-success mt-3">
                <i class="fas fa-save"></i> {{ __('messages.save_category') }}
            </button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">
                {{ __('messages.back') }}
            </a>
        </form>
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
