@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-warning">تعديل بيانات: {{ $author->name }}</div>
            <div class="card-body">
                <form action="{{ route('authors.update', $author->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">اسم المؤلف</label>
                        <input type="text" name="name" class="form-control" value="{{ $author->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">السيرة الذاتية</label>
                        <textarea name="bio" class="form-control" rows="3">{{ $author->bio }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">تحديث البيانات</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection