<!doctype html>
<html>
<head>
    <title>Katalog Buku</title>
</head>
<body>
    <h1>Daftar Buku</h1>

    <a href="{{ route('books.create') }}">Tambah Buku</a>

    @if ($books->isEmpty())
        <p>Belum ada buku.</p>
    @else
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>ISBN</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->published_year }}</td>
                        <td>
                            <a href="{{ route('books.show', $book) }}">Lihat</a>
                            <a href="{{ route('books.edit', $book) }}">Edit</a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus buku ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>