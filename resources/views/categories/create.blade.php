@extends('adminlte::page')

@section('title', 'إضافة تصنيف جديد')

@section('content_header')
    <h1>إضافة تصنيف جديد</h1>
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
                        <div class="form-group mb-3">
                            <label>الاسم</label>
                            <input type="text" name="name_{{ $key }}" class="form-control"
                                value="{{ old('name_' . $key) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label>الوصف</label>
                            <textarea name="description_{{ $key }}" class="form-control" rows="3">{{ old('description_' . $key) }}</textarea>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- الصورة --}}
            <div class="form-group mb-3">
                <label>الصورة</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-success mt-3">
                <i class="fas fa-save"></i> حفظ التصنيف
            </button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">
                رجوع
            </a>
        </form>
    </div>
@stop
