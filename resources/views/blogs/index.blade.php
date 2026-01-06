@extends('adminlte::page')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-3">المدونات</h1>

        <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">
            إضافة مدونة جديدة
        </a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>الاسم (عربي)</th>
                            <th>الاسم (إنجليزي)</th>
                            <th>الوصف</th>
                            <th>الصورة</th>
                            <th>صور إضافية</th>
                            <th>فيديوهات</th>
                            <th>الحالة</th>
                            <th width="160">إجراءات</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->name_ar }}</td>
                                <td>{{ $blog->name_en }}</td>
                                <td>{{ Str::limit($blog->description_ar, 50) }}</td>

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
                                        {{ $blog->status }}
                                    </span>
                                </td>

                                {{-- الإجراءات --}}
                                <td>
                                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">
                                        تعديل
                                    </a>

                                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('هل تريد حذف هذه المدونة؟')">
                                            حذف
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
