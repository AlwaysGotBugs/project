{{-- resources/views/admin/news/show.blade.php --}}
@extends('layouts.admin') {{-- Assuming you have an admin layout --}}

@section('title', $news->title) {{-- Set page title --}}

@section('admin_content') {{-- Or whatever section your content goes into --}}
    <h3 class="mb-4">تفاصيل الخبر: {{ $news->title }}</h3>

    <div class="card shadow-sm p-4">
        <p><strong>العنوان:</strong> {{ $news->title }}</p>
        <p><strong>المحتوى:</strong> {!! nl2br(e($news->content)) !!}</p> {{-- nl2br to preserve line breaks, e for escaping --}}
        <p><strong>النوع:</strong> {{ $news->type }}</p>
        <p><strong>تاريخ النشر:</strong> {{ $news->published_at ? $news->published_at->format('Y-m-d H:i') : 'غير منشور' }}</p>
        @if ($news->user)
            <p><strong>بواسطة:</strong> {{ $news->user->name }}</p>
        @endif
        @if ($news->image)
            <p><strong>الصورة:</strong></p>
            <img src="{{ Storage::url($news->image) }}" alt="News Image" style="max-width: 300px; height: auto;">
        @endif
        <p><strong>منشور:</strong> {{ $news->is_published ? 'نعم' : 'لا' }}</p>

        <div class="mt-4">
            <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-warning me-2">تعديل</a>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">العودة إلى قائمة الأخبار</a>
        </div>
    </div>
@endsection