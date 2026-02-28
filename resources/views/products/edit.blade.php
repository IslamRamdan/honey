@extends('adminlte::page')

@section('title', __('messages.edit_product'))

@section('content_header')
    <h1>{{ __('messages.edit_product') }}</h1>
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

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- التصنيف --}}
        <div class="form-group">
            <label>{{ __('messages.category') }}</label>
            <select name="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->{'name_' . app()->getLocale()} }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- صور المنتج الحالية --}}
        @if (!empty($product->images))
            <div class="form-group">
                <label>{{ __('messages.current_images') }}</label>
                <div class="row">
                    @foreach ($product->images as $image)
                        <div class="col-md-3 text-center mb-3">
                            <img src="{{ asset('storage/' . $image) }}" class="img-fluid rounded mb-1">

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remove_images[]"
                                    value="{{ $image }}" id="remove_{{ md5($image) }}">
                                <label class="form-check-label text-danger" for="remove_{{ md5($image) }}">
                                    {{ __('messages.delete') }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- إضافة صور جديدة --}}
        <div class="form-group">
            <label>{{ __('messages.add_new_images') }}</label>
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
                            value="{{ old('title_' . $key, $product->{'title_' . $key}) }}" required>
                    </div>

                    <div class="form-group">
                        <label>{{ __('messages.description') }}</label>
                        <textarea name="description_{{ $key }}" class="form-control" rows="3">{{ old('description_' . $key, $product->{'description_' . $key}) }}</textarea>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- أحجام العبوات --}}
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h5 class="card-title">{{ __('messages.package_sizes') }}</h5>
            </div>

            <div class="card-body">
                <h5>{{ __('messages.package_size_ar') }}</h5>
                <input type="text" name="sizes_ar" class="form-control mb-2" value="{{ $product->sizes_ar ?? '' }}"
                    placeholder="{{ __('messages.size_placeholder') }}">

                <h5>{{ __('messages.package_size_en') }}</h5>
                <input type="text" name="sizes_en" class="form-control mb-2" value="{{ $product->sizes_en ?? '' }}"
                    placeholder="{{ __('messages.size_placeholder') }}">

                <h5>{{ __('messages.package_size_fr') }}</h5>
                <input type="text" name="sizes_fr" class="form-control mb-2" value="{{ $product->sizes_fr ?? '' }}"
                    placeholder="{{ __('messages.size_placeholder') }}">

                <h5>{{ __('messages.package_size_es') }}</h5>
                <input type="text" name="sizes_es" class="form-control mb-2" value="{{ $product->sizes_es ?? '' }}"
                    placeholder="{{ __('messages.size_placeholder') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            <i class="fas fa-save"></i> {{ __('messages.update_product') }}
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
