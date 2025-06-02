@extends('layouts.app')

@section('title', $displayTitle . ' - الأخبار والتحديثات')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5" style="color: #129866; font-weight: 700;">
        {{ $displayTitle }}
    </h2>

    {{-- News Categories/Filters --}}
    <div class="d-flex justify-content-center mb-4">
        <a href="{{ route('news') }}" class="btn btn-outline-primary mx-2 {{ !request()->route('type') ? 'active' : '' }}">الكل</a>
        <a href="{{ route('news.type', 'news') }}" class="btn btn-outline-primary mx-2 {{ request()->route('type') == 'news' ? 'active' : '' }}">آخر الأخبار</a>
        <a href="{{ route('news.type', 'interview') }}" class="btn btn-outline-primary mx-2 {{ request()->route('type') == 'interview' ? 'active' : '' }}">مقابلات وتقارير</a>
        <a href="{{ route('news.type', 'article') }}" class="btn btn-outline-primary mx-2 {{ request()->route('type') == 'article' ? 'active' : '' }}">مقالات</a>
    </div>

    <div class="row">
        @forelse ($news as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    @if ($item->image)
                        <img src="{{ Storage::url($item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/400x200?text=News+Image" class="card-img-top" alt="Placeholder" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <span class="badge bg-secondary mb-2 align-self-start">
                            @if ($item->type == 'news') آخر الأخبار
                            @elseif ($item->type == 'interview') مقابلات وتقارير
                            @elseif ($item->type == 'article') مقالات
                            @endif
                        </span>
                        <h5 class="card-title fw-bold">{{ $item->title }}</h5>
                        <p class="card-text text-muted small">
                            <i class="bi bi-calendar"></i> {{ $item->published_at ? $item->published_at->format('Y-m-d') : 'غير منشور' }}
                        </p>
                        <p class="card-text">{{ Str::limit(strip_tags($item->content), 100) }}</p>
                        <a href="{{ route('news.show', $item->slug) }}" class="btn btn-primary mt-auto align-self-start">اقرأ المزيد</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>لا توجد أخبار أو تحديثات حالياً.</p>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $news->links() }}
    </div>
</div>
@endsection