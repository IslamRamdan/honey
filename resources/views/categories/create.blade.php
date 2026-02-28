@extends('adminlte::page')

@section('title', __('messages.add_new_category'))

@section('content_header')
    <h1>{{ __('messages.add_new_category') }}</h1>
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

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- الأسماء والوصف لكل لغة --}}
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
                            <label>{{ __('messages.name') }}</label>
                            <input type="text" name="name_{{ $key }}" class="form-control"
                                value="{{ old('name_' . $key) }}" required>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- الصورة --}}
            <div class="form-group mb-3">
                <label>{{ __('messages.image') }}</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-success mt-3">
                <i class="fas fa-save"></i> {{ __('messages.save_category') }}
            </button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">
                {{ __('messages.back') }}
            </a>
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
