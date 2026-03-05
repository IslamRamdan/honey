@extends('adminlte::page')

@section('title', __('messages.add_product'))

@section('content_header')
    <h1>{{ __('messages.add_new_product') }}</h1>
@stop

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- التصنيف --}}
        <div class="form-group">
            <label>{{ __('messages.category') }}</label>
            <select name="category_id" class="form-control" required>
                <option value="">{{ __('messages.select_category') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->{'name_' . app()->getLocale()} }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- صور المنتج --}}
        <div class="form-group">
            <label>{{ __('messages.product_images') }}</label>
            <input type="file" name="images[]" class="form-control" multiple>
            <small class="text-muted">{{ __('messages.multiple_images_note') }}</small>
        </div>

        <hr>

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
                            
                            <div class="form-group mb-3">
                                <label>{{ __('messages.title') ?? 'العنوان' }} ({{ $lang }}) <span class="text-danger">*</span></label>
                                <input type="text" name="title_{{ $key }}" class="form-control" value="{{ old('title_' . $key) }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label>{{ __('messages.description') ?? 'الوصف' }} ({{ $lang }}) <span class="text-danger">*</span></label>
                                <textarea name="description_{{ $key }}" class="form-control" rows="3" required>{{ old('description_' . $key) }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label>{{ __('messages.package_sizes') ?? 'أحجام العبوات' }} ({{ $lang }})</label>
                                <input type="text" name="sizes_{{ $key }}" class="form-control" value="{{ old('sizes_' . $key) }}" placeholder="e.g. 250g, 500g">
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-success mt-3">
            <i class="fas fa-save"></i> {{ __('messages.save_product') }}
        </button>

        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">
            {{ __('messages.back') }}
        </a>
    </form>

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
