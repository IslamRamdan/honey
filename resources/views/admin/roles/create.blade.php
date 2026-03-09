------ذ @extends('adminlte::page')

@section('title', __('admin.add_role'))

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>{{ __('admin.add_role') }}</h1>
        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            {{ __('admin.back') }}
        </a>
    </div>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('admin.add_role_title') }}</h3>
        </div>

        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf

            <div class="card-body">

                {{-- اسم الدور --}}
                <div class="form-group">
                    <label>{{ __('admin.role_name') }}</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" required>

                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- الصلاحيات --}}
                <div class="form-group">
                    <label>{{ __('admin.permissions') }}</label>
                    <div class="row">
                        @foreach($permissions as $permission)
                            <div class="col-md-4 col-sm-6 mb-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox"
                                        class="custom-control-input"
                                        id="perm_{{ $permission->id }}"
                                        name="permissions[]"
                                        value="{{ $permission->name }}"
                                        {{ in_array($permission->name, old('permissions', [])) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="perm_{{ $permission->id }}">
                                        {{ __('admin.perm_' . str_replace('-', '_', $permission->name)) }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-success">
                    <i class="fas fa-save"></i>
                    {{ __('admin.save') }}
                </button>
            </div>
        </form>
    </div>

@stop

@section('adminlte_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    @if (app()->getLocale() == 'ar')
        <style>
            [dir="rtl"] .main-sidebar { right: 0; left: auto; }
            [dir="rtl"] .content-wrapper,
            [dir="rtl"] .main-footer { margin-right: 250px; margin-left: 0; }
        </style>
    @endif
@endsection
