<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_books_page_returns_a_successful_response(): void
    {
        $response = $this->get('/books');

        $response->assertStatus(200)
            ->assertSee('Daftar Buku');
    }

    public function test_user_can_create_update_and_delete_a_book(): void
    {
        $this->post('/books', [
            'title' => 'Laravel Basics',
            'author' => 'John Doe',
            'isbn' => '978-0-123456-78-9',
            'published_year' => 2024,
        ])->assertRedirect('/books');

        $this->assertDatabaseHas('books', [
            'title' => 'Laravel Basics',
            'author' => 'John Doe',
            'isbn' => '978-0-123456-78-9',
            'published_year' => 2024,
        ]);

        $book = \App\Models\Book::first();

        $this->put('/books/' . $book->id, [
            'title' => 'Advanced Laravel',
            'author' => 'Jane Doe',
            'isbn' => '978-9-876543-21-0',
            'published_year' => 2025,
        ])->assertRedirect('/books');

        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'title' => 'Advanced Laravel',
            'author' => 'Jane Doe',
            'isbn' => '978-9-876543-21-0',
            'published_year' => 2025,
        ]);

        $this->delete('/books/' . $book->id)->assertRedirect('/books');

        $this->assertDatabaseMissing('books', [
            'id' => $book->id,
        ]);
    }
}
