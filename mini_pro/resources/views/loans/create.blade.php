<h2>استعارة كتاب</h2>

<form action="{{ route('loans.store') }}" method="POST">
    @csrf

    المستخدم:
    <select name="user_id">
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    <br>

    الكتاب:
    <select name="book_id">
        @foreach($books as $book)
            <option value="{{ $book->id }}">{{ $book->title }}</option>
        @endforeach
    </select>
    <br>

    تاريخ الاستعارة:
    <input type="date" name="borrowed_at"><br>

    تاريخ الإرجاع:
    <input type="date" name="due_date"><br>

    <button type="submit">حفظ</button>
</form>