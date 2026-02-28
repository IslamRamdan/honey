@extends('adminlte::page')

@section('title', __('messages.blogs'))

@section('content_header')
    <h1>
        @if (request('status') === 'blog')
            {{ __('messages.blogs') }}
        @elseif(request('status') === 'new')
            {{ __('messages.news') }}
        @else
            {{ __('messages.blogs') }} / {{ __('messages.news') }}
        @endif
    </h1>

@stop

@section('content')
    <div class="container-fluid">

        <div class="" style="    display: flex;
    justify-content: space-between;">
            <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> {{ __('messages.add_new_blog') }}
            </a>
            <div class="mb-4 d-flex gap-2">

                <a href="{{ route('blogs.index') }}"
                    class="btn {{ request('status') == null ? 'btn-dark' : 'btn-outline-dark' }}">
                    الكل
                </a>

                <a href="{{ route('blogs.index', ['status' => 'blog']) }}"
                    class="btn {{ request('status') == 'blog' ? 'btn-primary' : 'btn-outline-primary' }}">
                    المدونات
                </a>

                <a href="{{ route('blogs.index', ['status' => 'new']) }}"
                    class="btn {{ request('status') == 'new' ? 'btn-success' : 'btn-outline-success' }}">
                    الأخبار
                </a>

            </div>

        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('messages.name_arabic') }}</th>
                            <th>{{ __('messages.name_english') }}</th>
                            <th>{{ __('messages.description') }}</th>
                            <th>{{ __('messages.image') }}</th>
                            <th>{{ __('messages.additional_images') }}</th>
                            <th>{{ __('messages.videos') }}</th>
                            <th>{{ __('messages.status') }}</th>
                            <th width="160">{{ __('messages.actions') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->name_ar }}</td>
                                <td>{{ $blog->name_en }}</td>
                                <td>{{ Str::limit(strip_tags($blog->description_ar), 50) }}</td>

                                {{-- الصورة الرئيسية --}}
                                <td>
                                    @if ($blog->image)
                                        <img src="{{ asset('images/blogs/' . $blog->image) }}" width="70"
                                            class="rounded">
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    {{ is_array($blog->images) ? count($blog->images) : 0 }}
                                </td>

                                <td class="text-center">
                                    {{ is_array($blog->videos) ? count($blog->videos) : 0 }}
                                </td>

                                {{-- الحالة --}}
                                <td>
                                    <span class="badge badge-{{ $blog->status == 'blog' ? 'success' : 'secondary' }}">
                                        {{ __('messages.' . $blog->status) }}
                                    </span>
                                </td>

                                {{-- الإجراءات --}}
                                <td>
                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> {{ __('messages.edit') }}
                                    </a>

                                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('{{ __('messages.delete_blog_confirm') }}')">
                                            <i class="fas fa-trash"></i> {{ __('messages.delete') }}
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
