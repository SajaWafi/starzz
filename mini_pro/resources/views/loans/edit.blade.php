<h2>تعديل الاستعارة</h2>

<form action="{{ route('loans.update', $loan->id) }}" method="POST">
    @csrf
    @method('PUT')

    تاريخ التسليم:
    <input type="date" name="returned_at" value="{{ $loan->returned_at }}">

    <button type="submit">تحديث</button>
</form>