@extends('adminlte::page')
@section('title', __('admin.edit_page'))
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header"><h3 class="card-title">{{ __('admin.edit_page') }}: {{ $page->slug }}</h3></div>
        <div class="card-body">
            <form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>{{ __('admin.slug') }} *</label>
                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $page->slug) }}" required>
                        @error('slug') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label>{{ __('admin.icon') }} (CSS Class)</label>
                        <input type="text" name="icon" class="form-control" value="{{ old('icon', $page->icon) }}" placeholder="{{ __('admin.icon_placeholder') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>{{ __('admin.image') }} ({{ __('admin.main_image') ?? 'الصورة الرئيسية' }})</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                        @error('image') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        @if($page->image)
                            <img src="{{ asset('storage/' . $page->image) }}" height="60" class="mt-2 rounded" alt="current">
                        @endif
                    </div>
                </div>

                {{-- صور إضافية --}}
                <div class="form-group mt-3">
                    <label><i class="fas fa-images"></i> {{ __('messages.additional_images') ?? 'صور إضافية' }}</label>
                    @if(!empty($page->images))
                        <div class="d-flex flex-wrap gap-2 mb-2" id="additionalImages">
                            @foreach ($page->images as $index => $img)
                                <div class="position-relative" style="width:150px;height:150px" data-index="{{ $index }}">
                                    <img src="{{ asset('storage/' . $img) }}" class="w-100 h-100 rounded border" style="object-fit:cover">
                                    <button type="button" class="btn btn-danger btn-sm delete-image"
                                        style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%)">
                                        ×
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <input type="file" name="images[]" class="form-control @error('images.*') is-invalid @enderror" multiple accept="image/*">
                    @error('images.*') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                    <small class="text-muted">{{ __('messages.add_new_images_note') ?? 'يمكنك إضافة صور جديدة بدون حذف القديمة' }}</small>
                </div>

                @php
                    $langs = [
                        'ar' => __('messages.arabic') ?? 'العربية',
                        'en' => __('messages.english') ?? 'English',
                        'fr' => __('messages.french') ?? 'Français',
                        'es' => __('messages.spanish') ?? 'Español',
                    ];
                @endphp
                <div class="card card-outline card-primary mb-4 mt-3">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            @foreach ($langs as $key => $lang)
                                <li class="nav-item">
                                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="custom-tabs-{{ $key }}-tab" data-toggle="pill" href="#custom-tabs-{{ $key }}" role="tab">
                                        @if($key == 'ar') 🇸🇦 @elseif($key == 'en') 🇬🇧 @elseif($key == 'fr') 🇫🇷 @elseif($key == 'es') 🇪🇸 @endif
                                        {{ $lang }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            @foreach ($langs as $key => $lang)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="custom-tabs-{{ $key }}" role="tabpanel">
                                    <div class="form-group mb-3">
                                        <label>{{ __('admin.title') }} ({{ $lang }})</label>
                                        <input type="text" name="title_{{ $key }}" class="form-control" value="{{ old('title_' . $key, $page->{'title_' . $key}) }}">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>{{ __('admin.content') }} ({{ $lang }})</label>
                                        <textarea name="content_{{ $key }}" class="form-control" rows="6">{{ old('content_' . $key, $page->{'content_' . $key}) }}</textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{ __('admin.order') }}</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $page->sort_order) }}">
                    </div>
                    <div class="form-group col-md-6 d-flex align-items-end">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" {{ $page->is_active ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">{{ __('admin.enabled') }}</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ __('admin.update') }}</button>
                <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">{{ __('admin.back') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    // حذف صورة إضافية
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
                fetch(`/admin/pages/{{ $page->id }}/image/${box.dataset.index}`, {
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
@endsection
