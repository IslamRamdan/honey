@extends('adminlte::page')
@section('title', __('admin.add_new') ?? 'إضافة موقع خريطة جديد')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<style>
    #map { height: 400px; width: 100%; border-radius: 5px; cursor: crosshair; }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">{{ __('admin.add_new') ?? 'إضافة موقع خريطة جديد' }}</h3></div>
        <form action="{{ route('admin.map_locations.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    @php
                        $langs = [
                            'ar' => __('messages.arabic') ?? 'العربية',
                            'en' => __('messages.english') ?? 'English',
                            'fr' => __('messages.french') ?? 'Français',
                            'es' => __('messages.spanish') ?? 'Español',
                        ];
                    @endphp
                    <div class="col-md-12">
                        <h5>{{ __('admin.title') ?? 'اسم الموقع (الدولة أو المدينة)' }}</h5>
                        <div class="row">
                            @foreach($langs as $key => $lang)
                                <div class="form-group col-md-3">
                                    <label>{{ $lang }}@if($key=='ar'||$key=='en')*@endif</label>
                                    <input type="text" name="title_{{ $key }}" class="form-control" value="{{ old('title_'.$key) }}" {{ ($key=='ar'||$key=='en')?'required':'' }}>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <h5>{{ __('admin.location') ?? 'تحديد الموقع على الخريطة' }}*</h5>
                        <p class="text-muted small">انقر على الخريطة لتحديد الموقع بدقة لتعبئة خط الطول وخط العرض تلقائياً.</p>
                        <div id="map" class="mb-3"></div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('admin.latitude') ?? 'خط العرض (Latitude)' }}*</label>
                                <input type="text" id="latitude" name="latitude" class="form-control" value="{{ old('latitude') }}" required readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('admin.longitude') ?? 'خط الطول (Longitude)' }}*</label>
                                <input type="text" id="longitude" name="longitude" class="form-control" value="{{ old('longitude') }}" required readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <h5>{{ __('admin.social_links') ?? 'روابط التواصل (تظهر عند النقر على الخريطة)' }}</h5>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Instagram</label>
                                <input type="url" name="instagram" class="form-control" value="{{ old('instagram') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Facebook</label>
                                <input type="url" name="facebook" class="form-control" value="{{ old('facebook') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Website</label>
                                <input type="url" name="website" class="form-control" value="{{ old('website') }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('admin.order') ?? 'الترتيب' }}</label>
                                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                            </div>
                            <div class="form-group col-md-6 d-flex align-items-end">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" checked>
                                    <label class="custom-control-label" for="is_active">{{ __('admin.enabled') ?? 'مفعل' }}</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ __('admin.save') ?? 'حفظ' }}</button>
                <a href="{{ route('admin.map_locations.index') }}" class="btn btn-default">{{ __('admin.cancel') ?? 'إلغاء' }}</a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Default center (e.g. Saudi Arabia/Middle East)
        var map = L.map('map').setView([23.8859, 45.0792], 4);
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        var marker = null;
        var latInput = document.getElementById('latitude');
        var lngInput = document.getElementById('longitude');

        // Check if there are already old values
        if(latInput.value && lngInput.value) {
            marker = L.marker([latInput.value, lngInput.value]).addTo(map);
            map.setView([latInput.value, lngInput.value], 6);
        }

        map.on('click', function(e) {
            var lat = e.latlng.lat.toFixed(8);
            var lng = e.latlng.lng.toFixed(8);

            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                marker = L.marker(e.latlng).addTo(map);
            }

            latInput.value = lat;
            lngInput.value = lng;
        });
    });
</script>
@endsection
