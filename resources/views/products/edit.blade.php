@extends('adminlte::page')

@section('title', 'تعديل منتج')

@section('content_header')
    <h1>تعديل المنتج</h1>
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
            <label>التصنيف</label>
            <select name="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name_ar }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- صور المنتج الحالية --}}
        @if (!empty($product->images))
            <div class="form-group">
                <label>الصور الحالية</label>
                <div class="row">
                    @foreach ($product->images as $image)
                        <div class="col-md-3 text-center mb-3">
                            <img src="{{ asset('storage/' . $image) }}" class="img-fluid rounded mb-1">

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remove_images[]"
                                    value="{{ $image }}" id="remove_{{ md5($image) }}">
                                <label class="form-check-label text-danger" for="remove_{{ md5($image) }}">
                                    حذف
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- إضافة صور جديدة --}}
        <div class="form-group">
            <label>إضافة صور جديدة</label>
            <input type="file" name="images[]" class="form-control" multiple>
            <small class="text-muted">يمكنك اختيار أكثر من صورة</small>
        </div>

        <hr>

        {{-- اللغات --}}
        @php
            $langs = [
                'ar' => 'العربية',
                'en' => 'English',
                'fr' => 'Français',
                'es' => 'Español',
            ];
        @endphp

        @foreach ($langs as $key => $lang)
            <div class="card card-outline card-primary mb-3">
                <div class="card-header">
                    <h5 class="card-title">{{ $lang }}</h5>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label>العنوان</label>
                        <input type="text" name="title_{{ $key }}" class="form-control"
                            value="{{ old('title_' . $key, $product->{'title_' . $key}) }}" required>
                    </div>

                    <div class="form-group">
                        <label>الوصف</label>
                        <textarea name="description_{{ $key }}" class="form-control" rows="3">{{ old('description_' . $key, $product->{'description_' . $key}) }}</textarea>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- أحجام العبوات --}}
        <div class="card card-outline card-secondary">
            <div class="card-header">
                <h5 class="card-title">أحجام العبوات</h5>
            </div>

<div class="card-body">
    <h5>أحجام المنتج باللغة العربية</h5>
    <input type="text" name="sizes_ar" class="form-control mb-2"
           value="{{ is_array($product->sizes_ar) ? implode(' , ', $product->sizes_ar) : ($product->sizes_ar ?? '') }}"
           placeholder="أدخل أحجام المنتج">

    <h5>أحجام المنتج باللغة الإنجليزية</h5>
    <input type="text" name="sizes_en" class="form-control mb-2"
           value="{{ is_array($product->sizes_en) ? implode(' , ', $product->sizes_en) : ($product->sizes_en ?? '') }}"
           placeholder="أدخل أحجام المنتج">

    <h5>أحجام المنتج باللغة الفرنسية</h5>
    <input type="text" name="sizes_fr" class="form-control mb-2"
           value="{{ is_array($product->sizes_fr) ? implode(' , ', $product->sizes_fr) : ($product->sizes_fr ?? '') }}"
           placeholder="أدخل أحجام المنتج">

    <h5>أحجام المنتج باللغة الإسبانية</h5>
    <input type="text" name="sizes_es" class="form-control mb-2"
           value="{{ is_array($product->sizes_es) ? implode(' , ', $product->sizes_es) : ($product->sizes_es ?? '') }}"
           placeholder="أدخل أحجام المنتج">
</div>


        </div>

        <button type="submit" class="btn btn-primary mt-3">
            <i class="fas fa-save"></i> تحديث المنتج
        </button>

        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">
            رجوع
        </a>
    </form>

@stop
