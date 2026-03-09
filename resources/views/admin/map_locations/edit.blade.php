@extends('adminlte::page')
@section('title', __('admin.edit') ?? 'تعديل موقع خريطة')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<style>
    #map { height: 400px; width: 100%; border-radius: 5px; cursor: crosshair; }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header"><h3 class="card-title">{{ __('admin.edit') ?? 'تعديل موقع خريطة' }}</h3></div>
        <form action="{{ route('admin.map_locations.update', $mapLocation) }}" method="POST">
            @csrf @method('PUT')
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
                                    <input type="text" name="title_{{ $key }}" class="form-control" value="{{ old('title_'.$key, $mapLocation->{'title_'.$key}) }}" {{ ($key=='ar'||$key=='en')?'required':'' }}>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <h5>{{ __('admin.location') ?? 'تحديد الموقع على الخريطة' }}*</h5>
                        <p class="text-muted small">انقر على الخريطة لتغيير الموقع بدقة لتحديث خط الطول وخط العرض تلقائياً.</p>
                        <div id="map" class="mb-3"></div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('admin.latitude') ?? 'خط العرض (Latitude)' }}*</label>
                                <input type="text" id="latitude" name="latitude" class="form-control" value="{{ old('latitude', $mapLocation->latitude) }}" required readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('admin.longitude') ?? 'خط الطول (Longitude)' }}*</label>
                                <input type="text" id="longitude" name="longitude" class="form-control" value="{{ old('longitude', $mapLocation->longitude) }}" required readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <h5>{{ __('admin.social_links') ?? 'روابط التواصل (تظهر عند النقر على الخريطة)' }}</h5>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Instagram</label>
                                <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $mapLocation->instagram) }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Facebook</label>
                                <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $mapLocation->facebook) }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Website</label>
                                <input type="url" name="website" class="form-control" value="{{ old('website', $mapLocation->website) }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>{{ __('admin.order') ?? 'الترتيب' }}</label>
                                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $mapLocation->sort_order) }}">
                            </div>
                            <div class="form-group col-md-6 d-flex align-items-end">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" {{ $mapLocation->is_active ? 'checked' : '' }}>
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
        var latInput = document.getElementById('latitude');
        var lngInput = document.getElementById('longitude');
        var initialLat = latInput.value || 23.8859;
        var initialLng = lngInput.value || 45.0792;
        var initialZoom = latInput.value ? 6 : 4;

        var map = L.map('map').setView([initialLat, initialLng], initialZoom);
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        var marker = null;

        if(latInput.value && lngInput.value) {
            marker = L.marker([initialLat, initialLng]).addTo(map);
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
