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

    <style>
        .stats-box {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .stats-box:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
        }
        .small-box .inner h3 {
            font-size: 2.2rem;
            font-weight: 700;
        }
        .welcome-card {
            background: linear-gradient(135deg, #ffc107, #ff9800);
            color: #212529;
            border-radius: 10px;
            padding: 25px 30px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(255, 193, 7, 0.3);
        }
        .welcome-card h2 {
            margin: 0 0 5px 0;
            font-weight: 700;
        }
        .welcome-card p {
            margin: 0;
            opacity: 0.85;
        }
    </style>
@endsection

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@if ($layoutHelper->isLayoutTopnavEnabled())
    @php($def_container_class = 'container')
@else
    @php($def_container_class = 'container-fluid')
@endif

@section('content')
    <div class="{{ $def_container_class }}">

        {{-- Welcome Card --}}
        <div class="welcome-card">
            <h2><i class="fas fa-hand-sparkles"></i> {{ __('messages.welcome') }}، {{ Auth::user()->name }}!</h2>
            <p>{{ __('messages.dashboard_subtitle') }}</p>
        </div>

        {{-- Statistics Row 1 --}}
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="small-box bg-info stats-box">
                    <div class="inner">
                        <h3>{{ $stats['categories'] ?? 0 }}</h3>
                        <p>{{ __('messages.categories') }}</p>
                    </div>
                    <div class="icon"><i class="fas fa-tags"></i></div>
                    <a href="{{ route('categories.index') }}" class="small-box-footer">
                        {{ __('messages.more_info') }} <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="small-box bg-success stats-box">
                    <div class="inner">
                        <h3>{{ $stats['products'] ?? 0 }}</h3>
                        <p>{{ __('messages.products') }}</p>
                    </div>
                    <div class="icon"><i class="fas fa-box-open"></i></div>
                    <a href="{{ route('products.index') }}" class="small-box-footer">
                        {{ __('messages.more_info') }} <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="small-box bg-warning stats-box">
                    <div class="inner">
                        <h3>{{ $stats['blogs'] ?? 0 }}</h3>
                        <p>{{ __('messages.blogs') }}</p>
                    </div>
                    <div class="icon"><i class="fas fa-newspaper"></i></div>
                    <a href="{{ route('blogs.index') }}" class="small-box-footer">
                        {{ __('messages.more_info') }} <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="small-box bg-danger stats-box">
                    <div class="inner">
                        <h3>{{ $stats['users'] ?? 0 }}</h3>
                        <p>{{ __('messages.users') }}</p>
                    </div>
                    <div class="icon"><i class="fas fa-users-cog"></i></div>
                    <a href="{{ route('users.index') }}" class="small-box-footer">
                        {{ __('messages.more_info') }} <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- Statistics Row 2 --}}
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="small-box bg-primary stats-box">
                    <div class="inner">
                        <h3>{{ $stats['sliders'] ?? 0 }}</h3>
                        <p>{{ __('messages.sliders') }}</p>
                    </div>
                    <div class="icon"><i class="fas fa-images"></i></div>
                    <a href="{{ route('admin.sliders.index') }}" class="small-box-footer">
                        {{ __('messages.more_info') }} <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="small-box bg-secondary stats-box">
                    <div class="inner">
                        <h3>{{ $stats['pages'] ?? 0 }}</h3>
                        <p>{{ __('messages.pages') }}</p>
                    </div>
                    <div class="icon"><i class="fas fa-file-alt"></i></div>
                    <a href="{{ route('admin.pages.index') }}" class="small-box-footer">
                        {{ __('messages.more_info') }} <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="small-box bg-olive stats-box">
                    <div class="inner">
                        <h3>{{ $stats['branches'] ?? 0 }}</h3>
                        <p>{{ __('messages.branches') }}</p>
                    </div>
                    <div class="icon"><i class="fas fa-map-marked-alt"></i></div>
                    <a href="{{ route('admin.branches.index') }}" class="small-box-footer">
                        {{ __('messages.more_info') }} <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="small-box bg-teal stats-box">
                    <div class="inner">
                        <h3>{{ $stats['certificates'] ?? 0 }}</h3>
                        <p>{{ __('messages.certificates') }}</p>
                    </div>
                    <div class="icon"><i class="fas fa-award"></i></div>
                    <a href="{{ route('admin.certificates.index') }}" class="small-box-footer">
                        {{ __('messages.more_info') }} <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- Statistics Row 3 --}}
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="small-box bg-indigo stats-box">
                    <div class="inner">
                        <h3>{{ $stats['counters'] ?? 0 }}</h3>
                        <p>{{ __('messages.counters') }}</p>
                    </div>
                    <div class="icon"><i class="fas fa-sort-numeric-up"></i></div>
                    <a href="{{ route('admin.counters.index') }}" class="small-box-footer">
                        {{ __('messages.more_info') }} <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="small-box bg-purple stats-box">
                    <div class="inner">
                        <h3>{{ $stats['faqs'] ?? 0 }}</h3>
                        <p>{{ __('messages.faqs') }}</p>
                    </div>
                    <div class="icon"><i class="fas fa-question-circle"></i></div>
                    <a href="{{ route('admin.faqs.index') }}" class="small-box-footer">
                        {{ __('messages.more_info') }} <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
