@extends('layouts.admin')

@section('title', 'إدارة الأخبار')

@section('admin_content')
<h3 class="mb-4">إدارة الأخبار</h3>

<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> إضافة خبر جديد
    </a>
</div>

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>العنوان</th>
                        <th>النوع</th>
                        <th>منشور</th>
                        <th>تاريخ الإنشاء</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($newsItems as $news)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $news->title }}</td>
                            <td>
                                @if ($news->type == 'news') آخر الأخبار
                                @elseif ($news->type == 'interview') مقابلات وتقارير
                                @elseif ($news->type == 'article') مقالات
                                @else {{ $news->type }}
                                @endif
                            </td>
                            <td>
                                @if ($news->is_published)
                                    <span class="badge bg-success">نعم</span>
                                @else
                                    <span class="badge bg-warning text-dark">لا</span>
                                @endif
                            </td>
                            <td>{{ $news->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.news.show', $news) }}" class="btn btn-info btn-sm" title="عرض"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-warning btn-sm" title="تعديل"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.news.destroy', $news) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="حذف" onclick="return confirm('هل أنت متأكد من حذف هذا الخبر؟')"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">لا توجد أخبار لإدارتها حالياً.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $newsItems->links() }} {{-- Add pagination links if you paginate in controller --}}
        </div>
    </div>
</div>
@endsection