@extends('adminlte::page')

@section('title', __('messages.edit_category'))

@section('content_header')
    <h1>{{ __('messages.edit_category') }}</h1>
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

        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

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
                                    <input type="text" name="name_{{ $key }}" class="form-control" value="{{ old('name_' . $key, $category->{'name_' . $key}) }}" required>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- الصورة --}}
            <div class="form-group mb-3">
                <label>{{ __('messages.current_image') }}</label><br>
                @if ($category->image)
                    <img src="{{ asset('images/categories/' . $category->image) }}" width="150" class="rounded mb-2"><br>
                @endif
                <label>{{ __('messages.change_image') }}</label>
                <input type="file" name="image" class="form-control">
            </div>

            {{-- ترتيب الظهور --}}
            <div class="form-group mb-3">
                <label><i class="fas fa-sort-numeric-down text-warning"></i> ترتيب الظهور</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $category->sort_order) }}" min="0" placeholder="0 = أول قسم">
                <small class="form-text text-muted">القيمة الأصغر تظهر أولاً</small>
            </div>

            <button type="submit" class="btn btn-success mt-3">
                <i class="fas fa-save"></i> {{ __('messages.update_category') }}
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
