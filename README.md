# Tugas Pertemuan 5 Web Programming2
<ul>
  <li>Tugas: Tugas Pertemuan 5 Web Programming 2</li>
  <li>Nama: Reihan Aulia Darojat</li>
  <li>NIM: 21552011125</li>
  <li>Kelas: 221PA - Semester 6</li>
</ul>

# Perpustakaan PHP

## Deskripsi
Perpustakaan PHP adalah program sederhana yang mensimulasikan fungsi dasar dari sebuah perpustakaan, seperti menambahkan buku, meminjam buku, mengembalikan buku, dan mencetak daftar buku yang tersedia. Program ini ditulis menggunakan bahasa pemrograman PHP.

## Fitur
- Menambahkan buku baru ke dalam perpustakaan.
- Meminjam buku dari perpustakaan.
- Mengembalikan buku yang telah dipinjam.
- Menampilkan daftar buku yang tersedia di perpustakaan.

## Kelas
### 1. Kelas Book
   - **Atribut:**
     - `title`: Judul buku.
     - `author`: Penulis buku.
     - `publicationYear`: Tahun terbit buku.
     - `isBorrowed`: Status pinjam buku.
     - `totalBooks`: Jumlah total buku.

   - **Metode:**
     - `getTitle()`: Mengembalikan judul buku.
     - `getAuthor()`: Mengembalikan nama penulis buku.
     - `getPublicationYear()`: Mengembalikan tahun terbit buku.
     - `isBorrowed()`: Mengembalikan status peminjaman buku.
     - `borrowBook()`: Meminjam buku.
     - `returnBook()`: Mengembalikan buku.
     - `displayInfo()`: Menampilkan informasi buku.

### 2. Kelas Ebook
   - **Metode:**
     - `printAvailableBooks()`: Menampilkan daftar ebook yang tersedia.

### 3. Kelas Library
   - **Atribut:**
     - `books`: Koleksi buku dalam perpustakaan.

   - **Metode:**
     - `addBook(Book $book)`: Menambahkan buku ke dalam perpustakaan.
     - `borrowBook(string $title)`: Meminjam buku dari perpustakaan.
     - `returnBook(string $title)`: Mengembalikan buku yang dipinjam.
     - `printAvailableBooks()`: Menampilkan daftar buku yang tersedia di perpustakaan.

## Contoh Penggunaan
```php
<?php
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
