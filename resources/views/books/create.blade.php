<!doctype html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>
    <h1>Tambah Buku Baru</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div>
            <label>Judul</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>
        <div>
            <label>Penulis</label>
            <input type="text" name="author" value="{{ old('author') }}" required>
        </div>
        <div>
            <label>ISBN</label>
            <input type="text" name="isbn" value="{{ old('isbn') }}" required>
        </div>
        <div>
            <label>Tahun Terbit</label>
            <input type="number" name="published_year" value="{{ old('published_year') }}" required>
        </div>
        <button type="submit">Simpan</button>
        <a href="{{ route('books.index') }}">Kembali</a>
    </form>
</body>
</html>
