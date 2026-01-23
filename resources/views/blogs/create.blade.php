@extends('adminlte::page')

@section('title', 'إضافة مدونة')

@section('content_header')
    <h1>إضافة مدونة جديدة</h1>
@stop

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- الصورة الرئيسية --}}
        <div class="form-group">
            <label>الصورة الرئيسية</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        {{-- الصور الإضافية --}}
        <div class="form-group">
            <label>صور إضافية</label>
            <input type="file" name="images[]" class="form-control" multiple accept="image/*">
        </div>

        {{-- الفيديوهات --}}
        <div class="form-group">
            <label>فيديوهات (حد أقصى 2)</label>
            <input type="file" name="videos[]" class="form-control" multiple
                accept="video/mp4,video/webm,video/ogg,video/quicktime">
            <small class="text-muted">
                الصيغ المسموحة: mp4, webm, ogg, mov — حجم أقصى 50MB
            </small>
        </div>

        {{-- الحالة --}}
        <div class="form-group">
            <label>الحالة</label>
            <select name="status" class="form-control">
                <option value="new" {{ old('status') == 'new' ? 'selected' : '' }}>new</option>
                <option value="blog" {{ old('status') == 'blog' ? 'selected' : '' }}>blog</option>
            </select>
        </div>

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
                        <input type="text" name="name_{{ $key }}" class="form-control"
                            value="{{ old('name_' . $key) }}" required>
                    </div>

                    <div class="form-group">
                        <label>الوصف</label>
                        <textarea name="description_{{ $key }}" class="form-control editor" rows="4">{{ old('description_' . $key) }}</textarea>
                    </div>
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-success mt-3">
            <i class="fas fa-save"></i> حفظ المدونة
        </button>

        <a href="{{ route('blogs.index') }}" class="btn btn-secondary mt-3">
            رجوع
        </a>
    </form>

@stop

@section('js')
    {{-- CKEditor 5 --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
    <script>
        document.querySelectorAll('.editor').forEach((textarea) => {
            ClassicEditor
                .create(textarea)
                .catch(error => console.error(error));
        });
    </script>
@stop
