@extends('adminlte::page')

@section('title', __('messages.products'))

@section('content_header')
    <h1>{{ __('messages.products') }}</h1>
@stop

@section('content')
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> {{ __('messages.add_product') }}
    </a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>{{ __('messages.id') }}</th>
                        <th>{{ __('messages.title') }}</th>
                        <th>{{ __('messages.image') }}</th>
                        <th>{{ __('messages.category') }}</th>
                        <th>{{ __('messages.actions') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $product->{'title_' . app()->getLocale()} }}</td>

                            {{-- صورة المنتج (أول صورة فقط) --}}
                            <td>
                                @if (!empty($product->images) && count($product->images) > 0)
                                    <img src="{{ asset('storage/' . $product->images[0]) }}" width="80"
                                        class="img-thumbnail rounded" alt="{{ $product->title_ar }}">
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

                                <form action="{{ route('products.destroy', $product) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('{{ __('messages.delete_product_confirm') }}')">
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
