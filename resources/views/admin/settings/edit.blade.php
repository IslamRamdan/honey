@extends('adminlte::page')
@section('title', __('admin.general_settings'))
@section('content')
<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-header"><h3 class="card-title">{{ __('admin.general_settings') }}</h3></div>
        <div class="card-body">
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h5 class="text-primary mb-3"><i class="fas fa-cog"></i> {{ __('admin.general_info') }}</h5>
                @php
                    $general = ($settings['general'] ?? collect())->keyBy('key');
                    $contact = ($settings['contact'] ?? collect())->keyBy('key');
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
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>{{ __('admin.address') }} ({{ $lang }})</label>
                                            <input type="text" name="address_{{ $key }}" class="form-control" value="{{ $contact['address_' . $key]->value ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <hr>
                <h5 class="text-primary mb-3"><i class="fas fa-book"></i> {{ __('admin.catalog_file') }}</h5>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label><i class="fas fa-file-pdf text-danger"></i> {{ __('admin.catalog_file') }}</label>
                        @if(!empty($general['catalog_link']->value ?? ''))
                            <div class="mb-2 p-2 bg-light rounded d-flex align-items-center">
                                <i class="fas fa-file-pdf fa-2x text-danger mr-2"></i>
                                <div>
                                    <a href="{{ asset('storage/' . $general['catalog_link']->value) }}" target="_blank" class="text-info font-weight-bold">
                                        {{ basename($general['catalog_link']->value) }}
                                    </a>
                                    <br><small class="text-muted">{{ __('admin.current_file') }}</small>
                                </div>
                            </div>
                        @endif
                        <div class="custom-file">
                            <input type="file" name="catalog_link" class="custom-file-input" id="catalogFile" accept=".pdf,.doc,.docx">
                            <label class="custom-file-label" for="catalogFile">Choose file...</label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label><i class="fas fa-image text-success"></i> {{ __('admin.catalog_image') }}</label>
                        @if(!empty($general['catalog_image']->value ?? ''))
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $general['catalog_image']->value) }}" alt="Catalog Image" class="img-thumbnail" style="max-height:140px;">
                            </div>
                        @endif
                        <div class="custom-file">
                            <input type="file" name="catalog_image" class="custom-file-input" id="catalogImage" accept="image/*">
                            <label class="custom-file-label" for="catalogImage">Choose file...</label>
                        </div>
                        <small class="text-muted mt-1 d-block">{{ __('admin.catalog_image_hint') }}</small>
                    </div>
                </div>

                <hr>
                <h5 class="text-primary mb-3"><i class="fas fa-video"></i> {{ __('admin.hero_video') }}</h5>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label><i class="fas fa-film text-warning"></i> {{ __('admin.hero_video') }}</label>
                        @if(!empty($general['hero_video']->value ?? ''))
                            <div class="mb-2 p-2 bg-light rounded d-flex align-items-center">
                                <i class="fas fa-video fa-2x text-warning mr-2"></i>
                                <div>
                                    <span class="font-weight-bold">{{ basename($general['hero_video']->value) }}</span>
                                    <br><small class="text-muted">{{ __('admin.current_file') }}</small>
                                </div>
                            </div>
                        @endif
                        <div class="custom-file">
                            <input type="file" name="hero_video" class="custom-file-input" id="heroVideo" accept="video/*">
                            <label class="custom-file-label" for="heroVideo">Choose file...</label>
                        </div>
                    </div>
                </div>

                <hr>
                <h5 class="text-primary mb-3"><i class="fas fa-phone"></i> {{ __('admin.contact_info') }}</h5>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>{{ __('admin.phone') }}</label>
                        <input type="text" name="phone" class="form-control" value="{{ $contact['phone']->value ?? '' }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>{{ __('admin.email') }}</label>
                        <input type="email" name="email" class="form-control" value="{{ $contact['email']->value ?? '' }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>{{ __('admin.whatsapp') }}</label>
                        <input type="text" name="whatsapp" class="form-control" value="{{ $contact['whatsapp']->value ?? '' }}">
                    </div>
                </div>

                <hr>
                <h5 class="text-primary mb-3"><i class="fas fa-share-alt"></i> {{ __('admin.social_media') }}</h5>
                @php $social = ($settings['social'] ?? collect())->keyBy('key'); @endphp
                <div class="row">
                    <div class="form-group col-md-4">
                        <label><i class="fab fa-instagram"></i> Instagram</label>
                        <input type="url" name="instagram" class="form-control" value="{{ $social['instagram']->value ?? '' }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label><i class="fab fa-facebook"></i> Facebook</label>
                        <input type="url" name="facebook" class="form-control" value="{{ $social['facebook']->value ?? '' }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label><i class="fab fa-linkedin"></i> LinkedIn</label>
                        <input type="url" name="linkedin" class="form-control" value="{{ $social['linkedin']->value ?? '' }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-save"></i> {{ __('admin.save_settings') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
document.querySelectorAll('.custom-file-input').forEach(function(input) {
    input.addEventListener('change', function(e) {
        var fileName = e.target.files[0] ? e.target.files[0].name : 'Choose file...';
        var label = e.target.nextElementSibling;
        if (label) label.textContent = fileName;
    });
});
</script>
@endsection
