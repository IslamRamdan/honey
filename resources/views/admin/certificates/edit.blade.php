@extends('adminlte::page')
@section('title', __('admin.edit_certificate'))
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header"><h3 class="card-title">{{ __('admin.edit_certificate') }}</h3></div>
        <div class="card-body">
            <form action="{{ route('admin.certificates.update', $certificate) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="form-group">
                    <label>{{ __('admin.icon_image') }}</label>
                    <input type="file" name="icon_image" class="form-control" accept="image/*">
                    <img src="{{ asset('storage/' . $certificate->icon_image) }}" height="60" class="mt-2" alt="current icon">
                </div>
                <div class="form-group">
                    <label>{{ __('admin.full_images') }}</label>
                    @if(!empty($certificate->full_images))
                        <div class="d-flex flex-wrap gap-2 mb-2">
                            @foreach($certificate->full_images as $index => $img)
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
                    <input type="file" name="full_images[]" class="form-control" accept="image/*" multiple>
                    <small class="text-muted">{{ __('messages.add_new_images_note') ?? 'يمكنك إضافة صور جديدة بدون حذف القديمة. (لاختيار أكثر من صورة، قم بتحديدهم جميعاً معاً)' }}</small>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{ __('admin.order') }}</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $certificate->sort_order) }}">
                    </div>
                    <div class="form-group col-md-6 d-flex align-items-end">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" {{ $certificate->is_active ? 'checked' : '' }}>
                            <label class="custom-control-label" for="is_active">{{ __('admin.enabled') }}</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ __('admin.update') }}</button>
                <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">{{ __('admin.back') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    // حذف صورة الشهادة
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
                fetch(`/admin/certificates/{{ $certificate->id }}/image/${box.dataset.index}`, {
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
