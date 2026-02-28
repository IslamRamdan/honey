@extends('adminlte::page')

@section('title', __('messages.create_user'))

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>{{ __('messages.create_user') }}</h1>

        <a href="{{ route('users.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            {{ __('messages.back') }}
        </a>
    </div>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('messages.user_information') }}</h3>
        </div>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="card-body">

                {{-- الاسم --}}
                <div class="form-group">
                    <label>{{ __('messages.name') }}</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" required>

                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- البريد --}}
                <div class="form-group">
                    <label>{{ __('messages.email') }}</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" required>

                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- كلمة المرور --}}
                <div class="form-group">
                    <label>{{ __('messages.password') }}</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        required>

                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- تأكيد كلمة المرور --}}
                <div class="form-group">
                    <label>{{ __('messages.password_confirmation') }}</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-success">
                    <i class="fas fa-save"></i>
                    {{ __('messages.save') }}
                </button>
            </div>
        </form>
    </div>

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
