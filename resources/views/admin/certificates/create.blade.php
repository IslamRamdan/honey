@extends('adminlte::page')
@section('title', __('admin.add_certificate_title'))
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header"><h3 class="card-title">{{ __('admin.add_certificate_title') }}</h3></div>
        <div class="card-body">
            <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>{{ __('admin.icon_image') }} *</label>
                    <input type="file" name="icon_image" class="form-control @error('icon_image') is-invalid @enderror" accept="image/*" required>
                    @error('icon_image') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>{{ __('admin.full_images') }}</label>
                    <input type="file" name="full_images[]" class="form-control" accept="image/*" multiple>
                    <small class="text-muted">{{ __('messages.upload_multiple_note') ?? 'لاختيار أكثر من صورة، قم بتحديدهم جميعاً معاً (سحب الماوس أو استخدام زر Ctrl / Command)' }}</small>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>{{ __('admin.order') }}</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                    </div>
                    <div class="form-group col-md-6 d-flex align-items-end">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" checked>
                            <label class="custom-control-label" for="is_active">{{ __('admin.enabled') }}</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ __('admin.save') }}</button>
                <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">{{ __('admin.back') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection
