@extends('adminlte::page')

@section('title', __('admin.details'))

@section('content_header')
    <h1>{{ __('admin.details') }} #{{ $activityLog->id }}</h1>
@stop

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ __('admin.details') }}</h3>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>{{ __('admin.causer') }}:</strong> {{ $activityLog->causer ? $activityLog->causer->name : 'System' }}</li>
                        <li class="list-group-item"><strong>IP:</strong> <span class="badge badge-dark">{{ $activityLog->ip_address ?? 'N/A' }}</span></li>
                        <li class="list-group-item"><strong>{{ __('admin.date') }}:</strong> <span dir="ltr">{{ $activityLog->created_at->format('Y-m-d H:i:s') }}</span></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>{{ __('admin.description_log') }}:</strong>
                            @if($activityLog->description == 'created')
                                <span class="badge badge-success">{{ __('admin.add') }}</span>
                            @elseif($activityLog->description == 'updated')
                                <span class="badge badge-warning">{{ __('admin.edit') }}</span>
                            @elseif($activityLog->description == 'deleted')
                                <span class="badge badge-danger">{{ __('admin.delete') }}</span>
                            @else
                                <span class="badge badge-secondary">{{ $activityLog->description }}</span>
                            @endif
                        </li>
                        <li class="list-group-item"><strong>{{ __('admin.subject') }}:</strong> <code>{{ class_basename($activityLog->subject_type) }}</code></li>
                        <li class="list-group-item"><strong>ID:</strong> {{ $activityLog->subject_id }}</li>
                    </ul>
                </div>
            </div>

            @php
                $properties = $activityLog->properties;
            @endphp

            @if(isset($properties['attributes']))
                <h4 class="mt-4 mb-3">{{ __('admin.properties') }}</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-light">
                            <tr>
                                <th>Field</th>
                                @if(isset($properties['old']))
                                    <th>{{ __('admin.old_values') }}</th>
                                @endif
                                <th>{{ __('admin.new_values') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($properties['attributes'] as $key => $newValue)
                                <tr>
                                    <td><code>{{ $key }}</code></td>
                                    @if(isset($properties['old']))
                                        <td class="bg-danger text-white">{{ $properties['old'][$key] ?? '-' }}</td>
                                    @endif
                                    <td class="bg-success text-white">{{ is_array($newValue) ? json_encode($newValue) : $newValue }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.activity_logs.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> {{ __('admin.back') }}</a>
        </div>
    </div>
@stop
