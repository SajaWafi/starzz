@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">إضافة مؤلف جديد</div>
            <div class="card-body">
                <form action="{{ route('authors.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">اسم المؤلف</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">السيرة الذاتية (اختياري)</label>
                        <textarea name="bio" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100">حفظ المؤلف</button>
                    <a href="{{ route('authors.index') }}" class="btn btn-link w-100 mt-2">رجوع</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection