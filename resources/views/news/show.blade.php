@extends('layouts.app')

@section('title', $news->title)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <article class="news-detail card shadow-sm p-4 mb-5">
                @if ($news->image)
                    <img src="{{ Storage::url($news->image) }}" class="img-fluid rounded mb-4" alt="{{ $news->title }}" style="max-height: 400px; width: 100%; object-fit: cover;">
                @endif

                <span class="badge bg-secondary mb-3 align-self-start">
                    @if ($news->type == 'news') آخر الأخبار
                    @elseif ($news->type == 'interview') مقابلات وتقارير
                    @elseif ($news->type == 'article') مقالات
                    @endif
                </span>
                <h1 class="mb-3 display-5 fw-bold">{{ $news->title }}</h1>
                <p class="text-muted small mb-4">
                    <i class="bi bi-calendar"></i> تاريخ النشر: {{ $news->published_at ? $news->published_at->format('Y-m-d H:i') : 'غير منشور' }}
                    @if ($news->user)
                        <span class="mx-2">|</span> <i class="bi bi-person"></i> بواسطة: {{ $news->user->name }}
                    @endif
                </p>

                <div class="lead">
                    {!! nl2br(e($news->content)) !!} {{-- nl2br to convert newlines to <br>, e for escaping HTML --}}
                </div>

                <hr class="my-4">
                <div class="text-end">
                    <a href="{{ route('news') }}" class="btn btn-outline-primary">العودة إلى الأخبار</a>
                </div>
            </article>
        </div>
    </div>
</div>
@endsection