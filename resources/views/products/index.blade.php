@extends('adminlte::page')

@section('title', __('messages.products'))

@section('content_header')
    <h1>{{ __('messages.products') }}</h1>
@stop

@section('plugins.Datatables', true)

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card card-outline card-primary">
        <div class="card-header border-0 pb-0">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h3 class="card-title m-0">{{ __('messages.products') ?? 'المنتجات' }}</h3>
                <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> {{ __('messages.add_product') ?? 'إضافة منتج' }}
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <table id="productsTable" class="table table-bordered table-striped table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>{{ __('messages.id') ?? '#' }}</th>
                        <th>{{ __('messages.title') ?? 'العنوان' }} (عربي)</th>
                        <th>{{ __('messages.title') ?? 'العنوان' }} (En)</th>
                        <th>{{ __('messages.title') ?? 'العنوان' }} (Fr)</th>
                        <th>{{ __('messages.title') ?? 'العنوان' }} (Es)</th>
                        <th>{{ __('messages.image') ?? 'الصورة' }}</th>
                        <th>{{ __('messages.category') ?? 'التصنيف' }}</th>
                        <th>{{ __('messages.actions') ?? 'الإجراءات' }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $product->title_ar }}</td>
                            <td>{{ $product->title_en }}</td>
                            <td>{{ $product->title_fr }}</td>
                            <td>{{ $product->title_es }}</td>

                            {{-- صورة المنتج (أول صورة فقط) --}}
                            <td>
                                @if (!empty($product->images) && count($product->images) > 0)
                                    <img src="{{ asset('storage/' . $product->images[0]) }}" width="80"
                                        class="img-thumbnail rounded" alt="{{ $product->title_ar }}" onerror="this.onerror=null;this.src='{{ asset('assets/logo.png') }}';">
                                @else
                                    <span class="text-muted">{{ __('messages.no_image') }}</span>
                                @endif
                            </td>

                            {{-- التصنيف --}}
                            <td>
                                {{ $product->category?->{'name_' . app()->getLocale()} ?? __('messages.no_category') }}
                            </td>

                            {{-- الإجراءات --}}
                            <td>
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> {{ __('messages.edit') }}
                                </a>

                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="delete-form"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
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
@stop

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
        $('#productsTable').DataTable({
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
