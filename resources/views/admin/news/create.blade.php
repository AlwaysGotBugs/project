@extends('layouts.admin')

@section('title', 'إضافة خبر جديد')

@section('admin_content')
<h3 class="mb-4">إضافة خبر جديد</h3>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">العنوان</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">المحتوى</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">النوع</label>
                <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                    <option value="">اختر النوع</option>
                    {{-- Define your news types here, e.g., 'news', 'article', 'interview' --}}
                    @php
                        $types = [
                            'news' => 'آخر الأخبار',
                            'article' => 'مقالات',
                            'interview' => 'مقابلات وتقارير',
                            // Add more types as needed
                        ];
                    @endphp
                    @foreach ($types as $value => $label)
                        <option value="{{ $value }}" {{ old('type') == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="image" class="form-label">صورة رئيسية (اختياري)</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">
                    نشر الخبر الآن
                </label>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">حفظ الخبر</button>
                <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">إلغاء</a>
            </div>
        </form>
    </div>
</div>
@endsection