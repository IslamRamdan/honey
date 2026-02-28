@extends('adminlte::page')

@section('title', __('messages.products_in_category') . ': ' . $category->name_ar)

@section('content_header')
    <h1>{{ __('messages.products_in_category') }}: {{ $category->{'name_' . app()->getLocale()} }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('messages.product_list') }}</h3>
            <a href="{{ route('categories.index') }}" class="btn btn-sm btn-secondary float-right">
                <i class="fas fa-arrow-left"></i> {{ __('messages.back_to_categories') }}
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>{{ __('messages.name_arabic') }}</th>
                        <th>{{ __('messages.name_english') }}</th>
                        <th>{{ __('messages.description_arabic') }}</th>
                        <th>{{ __('messages.description_english') }}</th>
                        <th>{{ __('messages.image') }}</th>
                        <th>{{ __('messages.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->title_ar }}</td>
                            <td>{{ $product->title_en }}</td>
                            <td>{{ Str::limit($product->description_ar, 50) }}</td>
                            <td>{{ Str::limit($product->description_en, 50) }}</td>
                            <td>
                                @if (!empty($product->images) && count($product->images) > 0)
                                    <img src="{{ asset('storage/' . $product->images[0]) }}" width="80" class="rounded"
                                        alt="{{ $product->title_ar }}">
                                @else
                                    <span class="text-muted">{{ __('messages.no_image') }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> {{ __('messages.edit') }}
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('{{ __('messages.delete_product_confirm') }}')">
                                        <i class="fas fa-trash"></i> {{ __('messages.delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@stop
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
