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
                    <input type="file" name="full_images[]" class="form-control" accept="image/*" multiple>
                    @if($certificate->full_images)
                        <div class="mt-2 d-flex flex-wrap gap-2">
                            @foreach($certificate->full_images as $img)
                                <img src="{{ asset('storage/' . $img) }}" height="80" class="border rounded" alt="cert">
                            @endforeach
                        </div>
                    @endif
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
