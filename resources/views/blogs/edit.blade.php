@extends('adminlte::page')

@section('title', 'تعديل المدونة')

@section('content_header')
    <h1>تعديل المدونة</h1>
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

        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- الصورة الرئيسية --}}
            <div class="form-group mb-3">
                <label>الصورة الرئيسية</label>
                @if ($blog->image)
                    <div class="mb-2">
                        <img src="{{ asset('images/blogs/' . $blog->image) }}" width="150" class="rounded">
                    </div>
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            {{-- الصور الإضافية --}}
            <div class="form-group mb-3">
                <label>الصور الإضافية </label>

                <div class="d-flex flex-wrap gap-2 mb-2" id="additionalImages">
                    @foreach ($blog->images ?? [] as $index => $img)
                        <div class="position-relative" style="width:150px;height:150px" data-index="{{ $index }}">
                            <img src="{{ asset('images/blogs/' . $img) }}" class="w-100 h-100 rounded border"
                                style="object-fit:cover">
                            <button type="button" class="btn btn-danger btn-sm delete-image"
                                style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%)">
                                ×
                            </button>
                        </div>
                    @endforeach
                </div>

                <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                <small class="text-muted">يمكنك إضافة صور جديدة بدون حذف القديمة</small>
            </div>

            {{-- الفيديوهات --}}
            <div class="form-group mb-3">
                <label>الفيديوهات ({{ count($blog->videos ?? []) }}/2)</label>

                <div class="d-flex flex-wrap gap-3 mb-2" id="videosContainer">
                    @foreach ($blog->videos ?? [] as $index => $video)
                        <div class="position-relative" style="width:220px" data-index="{{ $index }}">
                            <video controls class="w-100 rounded border">
                                <source src="{{ asset('videos/blogs/' . $video) }}" type="video/mp4">
                            </video>
                            <button type="button" class="btn btn-danger btn-sm delete-video"
                                style="position:absolute;top:5px;right:5px">
                                ×
                            </button>
                        </div>
                    @endforeach
                </div>

                @if (count($blog->videos ?? []) < 2)
                    <input type="file" name="videos[]" class="form-control" multiple
                        accept="video/mp4,video/webm,video/ogg,video/quicktime">
                    <small class="text-muted">mp4, webm, ogg, mov — حد أقصى فيديوهين</small>
                @endif
            </div>

            {{-- الحالة --}}
            <div class="form-group mb-3">
                <label>الحالة</label>
                <select name="status" class="form-control">
                    <option value="new" {{ $blog->status === 'new' ? 'selected' : '' }}>new</option>
                    <option value="blog" {{ $blog->status === 'blog' ? 'selected' : '' }}>blog</option>
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
                        <div class="form-group mb-3">
                            <label>العنوان</label>
                            <input type="text" name="name_{{ $key }}" class="form-control"
                                value="{{ old('name_' . $key, $blog->{'name_' . $key}) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>الوصف</label>
                            <textarea name="description_{{ $key }}" class="form-control editor" rows="4">{{ old('description_' . $key, $blog->{'description_' . $key}) }}</textarea>
                        </div>
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-success mt-3">
                <i class="fas fa-save"></i> تحديث المدونة
            </button>

            <a href="{{ route('blogs.index') }}" class="btn btn-secondary mt-3">رجوع</a>
        </form>
    </div>
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
    <script>
        document.querySelectorAll('.editor').forEach(el => {
            ClassicEditor.create(el).catch(err => console.error(err));
        });

        // حذف صورة
        document.querySelectorAll('.delete-image').forEach(btn => {
            btn.onclick = function() {
                if (!confirm('حذف الصورة؟')) return;
                let box = this.closest('[data-index]');
                fetch(`/blogs/{{ $blog->id }}/image/${box.dataset.index}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                }).then(() => box.remove());
            };
        });

        // حذف فيديو
        document.querySelectorAll('.delete-video').forEach(btn => {
            btn.onclick = function() {
                if (!confirm('حذف الفيديو؟')) return;
                let box = this.closest('[data-index]');
                fetch(`/blogs/{{ $blog->id }}/video/${box.dataset.index}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                }).then(() => box.remove());
            };
        });
    </script>
@stop
