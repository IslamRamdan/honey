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
                    <div class="alert alert-info">
                        {{ __('messages.blog_language_requirement') ?? 'Required: enter the title and content in at least one language. Other languages are optional.' }}
                    </div>
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        @foreach ($langs as $key => $lang)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="custom-tabs-{{ $key }}" role="tabpanel" aria-labelledby="custom-tabs-{{ $key }}-tab">
                                
                                <h5 class="text-primary border-bottom pb-2">{{ __('messages.content_details') ?? 'تفاصيل المحتوى' }}</h5>
                                <div class="form-group mb-3">
                                    <label>{{ __('messages.title') ?? 'العنوان' }} ({{ $lang }})</label>
                                    <input type="text" name="name_{{ $key }}" class="form-control" value="{{ old('name_' . $key, $blog->{'name_' . $key}) }}">
                                </div>

                                <div class="form-group mb-3">
                                    <label>{{ __('messages.description') ?? 'المحتوى' }} ({{ $lang }})</label>
                                    <textarea name="description_{{ $key }}" class="form-control editor" rows="4">{{ old('description_' . $key, $blog->{'description_' . $key}) }}</textarea>
                                </div>

                                <h5 class="text-success border-bottom pb-2 mt-4">{{ __('messages.seo_settings_for_each_language') ?? 'إعدادات محركات البحث (SEO)' }}</h5>
                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label>{{ __('messages.seo') ?? 'SEO' }} {{ __('messages.title') ?? 'العنوان' }} ({{ $lang }})</label>
                                        <input type="text" name="seo_title_{{ $key }}" class="form-control" value="{{ old('seo_title_' . $key, $blog->{'seo_title_' . $key} ?? '') }}">
                                    </div>
                                    <div class="col-md-6 form-group mb-3">
                                        <label>{{ __('messages.seo') ?? 'SEO' }} {{ __('messages.keywords') ?? 'الكلمات المفتاحية' }} ({{ $lang }})</label>
                                        <input type="text" name="seo_keywords_{{ $key }}" class="form-control" value="{{ old('seo_keywords_' . $key, $blog->{'seo_keywords_' . $key} ?? '') }}">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>{{ __('messages.seo') ?? 'SEO' }} {{ __('messages.description') ?? 'الوصف' }} ({{ $lang }})</label>
                                    <textarea name="seo_description_{{ $key }}" class="form-control" rows="3">{{ old('seo_description_' . $key, $blog->{'seo_description_' . $key} ?? '') }}</textarea>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-success mt-3">
                <i class="fas fa-save"></i> {{ __('messages.update_blog') }}
            </button>

            <a href="{{ route('blogs.index') }}" class="btn btn-secondary mt-3">{{ __('messages.back') }}</a>
        </form>
    </div>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
    <script>
        const blogEditors = {};

        document.querySelectorAll('.editor').forEach(el => {
            ClassicEditor.create(el)
                .then(editor => {
                    blogEditors[el.name.replace('description_', '')] = editor;
                })
                .catch(err => console.error(err));
        });

        document.querySelector('form[action="{{ route('blogs.update', $blog->id) }}"]').addEventListener('submit', function(event) {
            Object.values(blogEditors).forEach(editor => editor.updateSourceElement());

            const alertTitle = @json(__('messages.required_fields'));
            const okButton = @json(__('messages.ok'));
            const atLeastOneLanguageMessage = @json(__('messages.blog_language_requirement'));
            const titleRequiredMessage = @json(__('messages.blog_title_required'));
            const contentRequiredMessage = @json(__('messages.blog_content_required'));
            const languages = ['ar', 'en', 'fr', 'es'];
            let targetLanguage = null;
            let message = null;

            const hasRichTextContent = (html) => {
                const container = document.createElement('div');
                container.innerHTML = (html || '').replace(/&nbsp;/g, ' ');
                return container.textContent.trim().length > 0 ||
                    Boolean(container.querySelector('img, video, iframe'));
            };

            const completeLanguage = languages.find((locale) => {
                const title = this.querySelector(`[name="name_${locale}"]`).value.trim();
                const editor = blogEditors[locale];
                const content = editor ? editor.getData() : this.querySelector(`[name="description_${locale}"]`).value;
                const hasContent = hasRichTextContent(content);

                if (title && !hasContent && !targetLanguage) {
                    targetLanguage = locale;
                    message = contentRequiredMessage;
                }

                if (!title && hasContent && !targetLanguage) {
                    targetLanguage = locale;
                    message = titleRequiredMessage;
                }

                return title && hasContent;
            });

            if (!targetLanguage && !completeLanguage) {
                targetLanguage = languages[0];
                message = atLeastOneLanguageMessage;
            }

            if (targetLanguage) {
                event.preventDefault();
                $(`#custom-tabs-${targetLanguage}-tab`).tab('show');
                Swal.fire({
                    icon: 'warning',
                    title: alertTitle,
                    text: message,
                    confirmButtonText: okButton
                });
            }
        });

        // حذف صورة
        document.querySelectorAll('.delete-image').forEach(btn => {
            btn.onclick = function() {
                let box = this.closest('[data-index]');
                Swal.fire({
                    title: @json(__('messages.confirm_delete_title')),
                    text: @json(__('messages.delete_image_confirm')),
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: @json(__('messages.yes_delete')),
                    cancelButtonText: @json(__('messages.cancel')),
                    reverseButtons: {{ app()->getLocale() == 'ar' ? 'true' : 'false' }}
                }).then((result) => {
                    if (!result.isConfirmed) return;
                    fetch(`/blogs/{{ $blog->id }}/image/${box.dataset.index}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    }).then(() => box.remove());
                });
            };
        });

        // حذف فيديو
        document.querySelectorAll('.delete-video').forEach(btn => {
            btn.onclick = function() {
                let box = this.closest('[data-index]');
                Swal.fire({
                    title: @json(__('messages.confirm_delete_title')),
                    text: @json(__('messages.delete_video_confirm')),
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: @json(__('messages.yes_delete')),
                    cancelButtonText: @json(__('messages.cancel')),
                    reverseButtons: {{ app()->getLocale() == 'ar' ? 'true' : 'false' }}
                }).then((result) => {
                    if (!result.isConfirmed) return;
                    fetch(`/blogs/{{ $blog->id }}/video/${box.dataset.index}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    }).then(() => box.remove());
                });
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
