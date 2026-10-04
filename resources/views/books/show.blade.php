<!doctype html>
<html>
<head>
    <title>{{ $book->title }}</title>
</head>
<body>
    <h1>{{ $book->title }}</h1>
    <p>Penulis: {{ $book->author }}</p>
    <p>ISBN: {{ $book->isbn }}</p>
    <p>Tahun Terbit: {{ $book->published_year }}</p>
    <a href="{{ route('books.index') }}">Kembali ke Daftar</a>
</body>
</html>
