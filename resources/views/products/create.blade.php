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
                        <input type="text" name="title_{{ $key }}" class="form-control"
                            value="{{ old('title_' . $key) }}" required>
                    </div>

                    <div class="form-group">
                        <label>{{ __('messages.description') }}</label>
                        <textarea name="description_{{ $key }}" class="form-control" rows="3">{{ old('description_' . $key) }}</textarea>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- أحجام العبوات لكل لغة --}}
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h5 class="card-title">{{ __('messages.package_sizes') }}</h5>
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.package_size_ar') }}</label>
                    <input type="text" name="sizes_ar" class="form-control" value="{{ old('sizes_ar') }}"
                        placeholder="{{ __('messages.size_example_ar') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.package_size_en') }}</label>
                    <input type="text" name="sizes_en" class="form-control" value="{{ old('sizes_en') }}"
                        placeholder="{{ __('messages.size_example_en') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.package_size_fr') }}</label>
                    <input type="text" name="sizes_fr" class="form-control" value="{{ old('sizes_fr') }}"
                        placeholder="{{ __('messages.size_example_fr') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('messages.package_size_es') }}</label>
                    <input type="text" name="sizes_es" class="form-control" value="{{ old('sizes_es') }}"
                        placeholder="{{ __('messages.size_example_es') }}">
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
