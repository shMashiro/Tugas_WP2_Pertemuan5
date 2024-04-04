<?php

// Nama: [Nama Anda]
// NIM: [NIM Anda]

class Book {
    protected $title;
    protected $author;
    protected $year;
    protected $status;

    public function __construct($title, $author, $year) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->status = 'available';
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getYear() {
        return $this->year;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}

class Library {
    protected $books = [];

    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    public function borrowBook($title) {
        foreach ($this->books as $book) {
            if ($book->getTitle() == $title && $book->getStatus() == 'available') {
                $book->setStatus('borrowed');
                return true;
            }
        }
        return false;
    }

    public function returnBook($title) {
        foreach ($this->books as $book) {
            if ($book->getTitle() == $title && $book->getStatus() == 'borrowed') {
                $book->setStatus('available');
                return true;
            }
        }
        return false;
    }

    public function printAvailableBooks() {
        echo "Available Books:\n";
        foreach ($this->books as $book) {
            if ($book->getStatus() == 'available') {
                echo "- {$book->getTitle()} by {$book->getAuthor()} ({$book->getYear()})\n";
            }
        }
        echo "\n";
    }
}

// Testing
$library = new Library();

$book1 = new Book('The Great Gatsby', 'F. Scott Fitzgerald', 1925);
$book2 = new Book('To Kill a Mockingbird', 'Harper Lee', 1960);
$book3 = new Book('1984', 'George Orwell', 1949);

$library->addBook($book1);
$library->addBook($book2);
$library->addBook($book3);

echo "Initial Available Books:\n";
$library->printAvailableBooks();

$library->borrowBook('To Kill a Mockingbird');
echo "After borrowing 'To Kill a Mockingbird':\n";
$library->printAvailableBooks();

$library->returnBook('To Kill a Mockingbird');
echo "After returning 'To Kill a Mockingbird':\n";
$library->printAvailableBooks();

?>