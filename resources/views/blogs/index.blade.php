@extends('adminlte::page')
@section('title', __('admin.blogs'))
@section('plugins.Datatables', true)
@section('content')
@php $locale = app()->getLocale(); @endphp
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('blogs.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> {{ __('messages.add_new_blog') ?? __('admin.add') }}
        </a>
        <div class="d-flex gap-2">
            <a href="{{ route('blogs.index') }}" class="btn {{ request('status') == null ? 'btn-dark' : 'btn-outline-dark' }}">{{ __('admin.all') ?? 'All' }}</a>
            <a href="{{ route('blogs.index', ['status' => 'blog']) }}" class="btn {{ request('status') == 'blog' ? 'btn-primary' : 'btn-outline-primary' }}">{{ __('messages.blogs') ?? 'Blogs' }}</a>
            <a href="{{ route('blogs.index', ['status' => 'new']) }}" class="btn {{ request('status') == 'new' ? 'btn-success' : 'btn-outline-success' }}">{{ __('messages.news') ?? 'News' }}</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                @if(request('status') === 'blog') {{ __('messages.blogs') ?? 'Blogs' }}
                @elseif(request('status') === 'new') {{ __('messages.news') ?? 'News' }}
                @else {{ __('admin.blogs') }}
                @endif
            </h3>
        </div>
        <div class="card-body">
            <table id="blogsTable" class="table table-bordered table-striped table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>{{ __('admin.title') }}</th>
                        <th>{{ __('admin.description') }}</th>
                        <th>{{ __('admin.image') }}</th>
                        <th>{{ __('messages.status') ?? __('admin.status') }}</th>
                        <th width="160">{{ __('admin.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $blog->{'name_' . $locale} ?? $blog->name_en ?? $blog->name_ar }}</td>
                        <td>{{ Str::limit(strip_tags($blog->{'description_' . $locale} ?? $blog->description_en ?? $blog->description_ar), 60) }}</td>
                        <td>
                            @if($blog->image)
                                <img src="{{ asset('images/blogs/' . $blog->image) }}" width="70" class="rounded">
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge badge-{{ $blog->status == 'blog' ? 'success' : 'secondary' }}">
                                {{ __('messages.' . $blog->status) ?? $blog->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> {{ __('admin.edit') }}
                            </a>
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="delete-form" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> {{ __('admin.delete') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>.table img { object-fit: cover; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }</style>
@endsection

@section('js')
<script>
$(function () {
    $('#blogsTable').DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "language": { "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json' : (app()->getLocale() == 'fr' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json' : (app()->getLocale() == 'es' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json' : '')) }}" }
    });
});
</script>
@endsection
