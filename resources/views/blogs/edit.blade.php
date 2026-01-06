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

        <form id="updateBlogForm" action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
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
                <input type="file" name="image" class="form-control">
            </div>

            {{-- الصور الإضافية --}}
            <div class="form-group mb-3">
                <label>الصور الإضافية ({{ count($blog->images ?? []) }}/4)</label>
                <div class="d-flex flex-wrap gap-2 mb-2" id="additionalImages">
                    @if ($blog->images)
                        @foreach ($blog->images as $index => $img)
                            <div class="position-relative" style="width:150px; height:150px;"
                                data-index="{{ $index }}">
                                <img src="{{ asset('images/blogs/' . $img) }}" class="rounded border w-100 h-100"
                                    style="object-fit: cover;">
                                <button type="button" class="btn btn-sm btn-danger delete-image"
                                    style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%);">
                                    ×
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>

                @if (count($blog->images ?? []) < 4)
                    <input type="file" name="images[]" class="form-control" multiple id="imagesInput">
                    <small class="text-muted">يمكنك إضافة صور جديدة بدون حذف القديمة (حد أقصى 4 صور)</small>
                @endif
            </div>

            {{-- الفيديوهات --}}
            <div class="form-group mb-3">
                <label>روابط الفيديو</label>
                @php $videos = $blog->videos ?? []; @endphp
                <input type="url" name="videos[]" class="form-control mb-2" value="{{ $videos[0] ?? '' }}"
                    placeholder="رابط فيديو 1">
                <input type="url" name="videos[]" class="form-control" value="{{ $videos[1] ?? '' }}"
                    placeholder="رابط فيديو 2">
            </div>

            {{-- الحالة --}}
            <div class="form-group mb-3">
                <label>الحالة</label>
                <select name="status" class="form-control">
                    <option value="new" {{ $blog->status == 'new' ? 'selected' : '' }}>new</option>
                    <option value="blog" {{ $blog->status == 'blog' ? 'selected' : '' }}>blog</option>
                </select>
            </div>

            {{-- الأسماء والوصف --}}
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
                                value="{{ old('name_' . $key, $blog->{'name_' . $key}) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>الوصف</label>
                            <textarea name="description_{{ $key }}" class="form-control editor" rows="3">{{ old('description_' . $key, $blog->{'description_' . $key}) }}</textarea>
                        </div>
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-success mt-3">
                <i class="fas fa-save"></i> تحديث المدونة
            </button>

            <a href="{{ route('blogs.index') }}" class="btn btn-secondary mt-3">
                رجوع
            </a>
        </form>
    </div>
@stop

@section('js')
    {{-- CKEditor 5 Classic --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
    <script>
        document.querySelectorAll('.editor').forEach((textarea) => {
            ClassicEditor.create(textarea).catch(error => console.error(error));
        });

        // حذف الصور الإضافية عبر AJAX
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-image').forEach(button => {
                button.addEventListener('click', function() {
                    if (!confirm('هل تريد حذف هذه الصورة؟')) return;

                    let parentDiv = this.closest('[data-index]');
                    let index = parentDiv.dataset.index;
                    let blogId = {{ $blog->id }};

                    fetch(`/blogs/${blogId}/image/${index}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            }
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                parentDiv.remove();
                                if (document.querySelectorAll('#additionalImages div').length <
                                    4 && !document.querySelector('#imagesInput')) {
                                    let input = document.createElement('input');
                                    input.type = 'file';
                                    input.name = 'images[]';
                                    input.id = 'imagesInput';
                                    input.className = 'form-control mt-2';
                                    input.multiple = true;
                                    document.querySelector('.form-group:has(#additionalImages)')
                                        .appendChild(input);
                                }
                            } else {
                                alert('حدث خطأ، لم يتم حذف الصورة');
                            }
                        });
                });
            });
        });
    </script>
@stop
