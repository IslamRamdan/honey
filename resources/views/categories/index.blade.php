@extends('adminlte::page')

@section('title', __('messages.categories'))

@section('content_header')
    <h1>{{ __('messages.categories') }}</h1>
@stop

@section('plugins.Datatables', true)

@section('content')
    <div class="container-fluid">

        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> {{ __('messages.add_new_category') ?? 'إضافة تصنيف جديد' }}
        </a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">{{ __('messages.categories') ?? 'التصنيفات' }}</h3>
            </div>
            <div class="card-body">
                <table id="categoriesTable" class="table table-bordered table-striped table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>{{ __('messages.name') }}</th>
                            <th>{{ __('messages.products_count') }}</th>
                            <th>{{ __('messages.image') }}</th>
                            <th>{{ __('messages.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $cat)
                            <tr>
                                <td>{{ $cat->{'name_' . app()->getLocale()} ?? $cat->name_en ?? $cat->name_ar }}</td>
                                <td>
                                    @if ($cat->products->count() > 0)
                                        <a href="{{ route('categories.products', $cat->id) }}">
                                            {{ $cat->products->count() }}
                                        </a>
                                    @else
                                        0
                                    @endif
                                </td>
                                <td>
                                    @if ($cat->image)
                                        <img src="{{ asset('images/categories/' . $cat->image) }}" width="80"
                                            class="rounded">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> {{ __('messages.edit') }}
                                    </a>
                                    <form action="{{ route('categories.destroy', $cat->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('{{ __('messages.delete_category_confirm') }}')">
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

@section('css')
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
        .table img {
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
@endsection

@section('js')
<script>
    $(function () {
        $('#categoriesTable').DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "language": {
                "url": "{{ app()->getLocale() == 'ar' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json' : (app()->getLocale() == 'fr' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json' : (app()->getLocale() == 'es' ? '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json' : '')) }}"
            }
        });
    });
</script>
@endsection
