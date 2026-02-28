@extends('adminlte::page')

@section('title', __('messages.edit_blog'))

@section('content_header')
    <h1>{{ __('messages.edit_blog') }}</h1>
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
                <label>{{ __('messages.main_image') }}</label>
                @if ($blog->image)
                    <div class="mb-2">
                        <img src="{{ asset('images/blogs/' . $blog->image) }}" width="150" class="rounded">
                    </div>
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            {{-- الصور الإضافية --}}
            <div class="form-group mb-3">
                <label>{{ __('messages.additional_images') }}</label>

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
                <small class="text-muted">{{ __('messages.add_new_images_note') }}</small>
            </div>

            {{-- الفيديوهات --}}
            <div class="form-group mb-3">
                <label>{{ __('messages.videos_count', ['count' => count($blog->videos ?? [])]) }}</label>

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
                    <small class="text-muted">{{ __('messages.video_formats_limit') }}</small>
                @endif
            </div>

            {{-- الحالة --}}
            <div class="form-group mb-3">
                <label>{{ __('messages.status') }}</label>
                <select name="status" class="form-control">
                    <option value="new" {{ $blog->status === 'new' ? 'selected' : '' }}>{{ __('messages.new') }}
                    </option>
                    <option value="blog" {{ $blog->status === 'blog' ? 'selected' : '' }}>{{ __('messages.blog') }}
                    </option>
                </select>
            </div>

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
                        <div class="form-group mb-3">
                            <label>{{ __('messages.title') }}</label>
                            <input type="text" name="name_{{ $key }}" class="form-control"
                                value="{{ old('name_' . $key, $blog->{'name_' . $key}) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>{{ __('messages.description') }}</label>
                            <textarea name="description_{{ $key }}" class="form-control editor" rows="4">{{ old('description_' . $key, $blog->{'description_' . $key}) }}</textarea>
                        </div>
                    </div>
                </div>
            @endforeach
            <h4 class="mt-4">{{ __('messages.seo_settings_for_each_language') }}</h4>

            @foreach (['ar' => __('messages.arabic'), 'en' => __('messages.english'), 'fr' => __('messages.french'), 'es' => __('messages.spanish')] as $code => $label)
                <div class="card card-outline card-success mb-3">
                    <div class="card-header">
                        <h5 class="card-title">{{ __('messages.seo') }} ({{ $label }})</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{ __('messages.title') }} ({{ $label }})</label>
                            <input type="text" name="seo_title_{{ $code }}" class="form-control"
                                value="{{ old('seo_title_' . $code, $blog->{'seo_title_' . $code} ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label>{{ __('messages.description') }} ({{ $label }})</label>
                            <textarea name="seo_description_{{ $code }}" class="form-control" rows="3">{{ old('seo_description_' . $code, $blog->{'seo_description_' . $code} ?? '') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>{{ __('messages.keywords') }} ({{ $label }})</label>
                            <input type="text" name="seo_keywords_{{ $code }}" class="form-control"
                                value="{{ old('seo_keywords_' . $code, $blog->{'seo_keywords_' . $code} ?? '') }}">
                        </div>
                    </div>
                </div>
            @endforeach


            <button type="submit" class="btn btn-success mt-3">
                <i class="fas fa-save"></i> {{ __('messages.update_blog') }}
            </button>

            <a href="{{ route('blogs.index') }}" class="btn btn-secondary mt-3">{{ __('messages.back') }}</a>
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
                if (!confirm("{{ __('messages.delete_image_confirm') }}")) return;
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
                if (!confirm("{{ __('messages.delete_video_confirm') }}")) return;
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
