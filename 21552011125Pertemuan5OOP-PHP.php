<?php

// Definisikan kelas Book
class Book {
    // Atribut
    private $title; // Judul buku
    private $author; // Penulis buku
    private $publicationYear; // Tahun terbit buku
    protected $isBorrowed; // Status pinjam buku
    public static $totalBooks = 0; // Total buku

    // Konstruktor
    public function __construct($title, $author, $publicationYear) {
        $this->title = $title;
        $this->author = $author;
        $this->publicationYear = $publicationYear;
        $this->isBorrowed = false; // Set status pinjam awalnya false
        self::$totalBooks++;
    }

    // Getter
    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPublicationYear() {
        return $this->publicationYear;
    }

    public function isBorrowed() {
        return $this->isBorrowed;
    }

    // Meminjam buku
    public function borrowBook() {
        $this->isBorrowed = true; // Ubah status pinjam menjadi true
    }

    // Mengembalikan buku
    public function returnBook() {
        $this->isBorrowed = false; // Ubah status pinjam menjadi false
    }

    // Polymorphism: Metode untuk menampilkan informasi buku
    public function displayInfo() {
        return "- {$this->getTitle()} oleh {$this->getAuthor()} (Tahun Terbit: {$this->getPublicationYear()})";
    }
}

// Definisikan kelas Ebook yang mewarisi sifat kelas Book
class Ebook extends Book {
    // Overriding: Mengubah metode printAvailableBooks()
    public function printAvailableBooks() {
        echo "Daftar Ebook Tersedia:\n";
        foreach ($this->books as $book) {
            if (!$book->isBorrowed()) {
                echo "- {$book->getTitle()} oleh {$book->getAuthor()} (Tahun Terbit: {$book->getPublicationYear()})\n";
            }
        }
    }

    // Konstruktor untuk Ebook
    public function __construct($title, $author, $publicationYear) {
        parent::__construct($title, $author, $publicationYear);
    }
}

// Definisikan kelas Library
class Library {
    // Atribut
    private $books = []; // Koleksi buku dalam perpustakaan

    // Menambahkan buku baru
    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    // Meminjam buku
    public function borrowBook($title) {
        foreach ($this->books as $book) {
            if ($book->getTitle() == $title && !$book->isBorrowed()) {
                $book->borrowBook(); // Panggil method borrowBook() dari objek Book
                return "Buku berhasil dipinjam: {$title}";
            }
        }
        return "Buku tidak tersedia atau sudah dipinjam.";
    }

    // Mengembalikan buku
    public function returnBook($title) {
        foreach ($this->books as $book) {
            if ($book->getTitle() == $title && $book->isBorrowed()) {
                $book->returnBook(); // Panggil method returnBook() dari objek Book
                return "Buku berhasil dikembalikan: {$title}";
            }
        }
        return "Buku tidak ditemukan atau tidak sedang dipinjam.";
    }

    // Mencetak daftar buku yang tersedia
    public function printAvailableBooks() {
        echo "Daftar Buku Tersedia:\n";
        foreach ($this->books as $book) {
            if (!$book->isBorrowed()) {
                echo $book->displayInfo() . "\n";
            }
        }
    }
}

// Contoh penggunaan:
$book1 = new Book("Pemrograman PHP", "John Doe", 2020);
$book2 = new Ebook("Dasar OOP", "Jane Smith", 2019); // Menggunakan kelas Ebook

$library = new Library();
$library->addBook($book1);
$library->addBook($book2);

echo $library->borrowBook("Pemrograman PHP") . "\n";
echo $library->borrowBook("Dasar OOP") . "\n";

$library->printAvailableBooks();

echo $library->returnBook("Pemrograman PHP") . "\n";

$library->printAvailableBooks();

?>
