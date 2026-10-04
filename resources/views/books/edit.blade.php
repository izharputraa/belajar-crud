<!doctype html>
<html>
<head>
    <title>Edit Buku</title>
</head>
<body>
    <h1>Edit Buku</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Judul</label>
            <input type="text" name="title" value="{{ old('title', $book->title) }}" required>
        </div>
        <div>
            <label>Penulis</label>
            <input type="text" name="author" value="{{ old('author', $book->author) }}" required>
        </div>
        <div>
            <label>ISBN</label>
            <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}" required>
        </div>
        <div>
            <label>Tahun Terbit</label>
            <input type="number" name="published_year" value="{{ old('published_year', $book->published_year) }}" required>
        </div>
        <button type="submit">Update</button>
        <a href="{{ route('books.index') }}">Kembali</a>
    </form>
</body>
</html>
