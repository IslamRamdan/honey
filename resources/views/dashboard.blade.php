@extends('adminlte::page')

@section('title', __('messages.dashboard'))

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

{{-- إضافة زرار اللغة في الـ Navbar --}}
@section('adminlte_css_pre')
    @parent
    <style>
        .navbar-nav .language-dropdown {
            display: inline-block;
        }
    </style>
@endsection

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@if ($layoutHelper->isLayoutTopnavEnabled())
    @php($def_container_class = 'container')
@else
    @php($def_container_class = 'container-fluid')
@endif

{{-- @section('content_header')
    <div class="{{ $def_container_class }}">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ __('messages.dashboard') }}</h1>
            </div>
            <div class="col-sm-6">
                <div class="float-right">
                    <div class="btn-group">
                        <a href="{{ route('locale.switch', 'ar') }}"
                            class="btn btn-sm {{ app()->getLocale() == 'ar' ? 'btn-primary' : 'btn-default' }}">
                            <i class="flag-icon flag-icon-sa"></i> العربية
                        </a>
                        <a href="{{ route('locale.switch', 'en') }}"
                            class="btn btn-sm {{ app()->getLocale() == 'en' ? 'btn-primary' : 'btn-default' }}">
                            <i class="flag-icon flag-icon-us"></i> English
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop --}}

@section('content')
    <div class="{{ $def_container_class }}">
        <div class="row">
            <div class="col-lg-4 col-12">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>✔</h3>
                        <p>{{ __('messages.logged_in') }}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
