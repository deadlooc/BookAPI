<?php

 require_once 'lib/Library.php';
 require_once 'lib/Book.php';
 require_once 'lib/Author.php';
 require_once 'lib/BookRequest.php';

/**
 * Description of LibraryTest
 *
 */
 class LibraryTest extends PHPUnit_Framework_TestCase {

         protected function setUp() {
                 $book = new Book('Евгений Онегин', 3, array('Пушкин'));
                 $book->incrementCount(0);
                 Library::getInstance()->registerBook($book);
                 $book = new Book('Капитанская Дочка', 2, array('Пушкин'));
                 $book->incrementCount(9);
                 Library::getInstance()->registerBook($book);
                 $book = new Book('Герой нашего времени', 4, array('Лермонтов'));
                 $book->incrementCount(5);
                 Library::getInstance()->registerBook($book);
                 $book = new Book('Мцыри', 4, array('Лермонтов'));
                 $book->incrementCount(3);
                 Library::getInstance()->registerBook($book);
                 $book = new Book('Анна Каренина', 1, array('Толстой'));
                 $book->incrementCount(9);
                 Library::getInstance()->registerBook($book);
                 $book = new Book('Война и мир', 2, array('Толстой'));
                 $book->incrementCount(3);
                 Library::getInstance()->registerBook($book);
                 $book = new Book('Вечера на хуторе близ Диканьки', 2, array('Гоголь'));
                 $book->incrementCount(6);
                 Library::getInstance()->registerBook($book);
                 $book = new Book('Мертвые души', 1, array('Гоголь'));
                 $book->incrementCount(5);
                 Library::getInstance()->registerBook($book);
                 $book = new Book('Муму', 1, array('Тургенев'));
                 $book->incrementCount(3);
                 Library::getInstance()->registerBook($book);
                 $book = new Book('Отцы и дети', 1, array('Тургенев'));
                 $book->incrementCount(4);
                 Library::getInstance()->registerBook($book);
         }

         protected function tearDown() {
                 
         }
         
         public function test_pushkin_all_present() {
                 $author = Library::getInstance()->getAuthor('Пушкин');
                 $books = Library::getInstance()->findBooksByAuthor(new BookRequest('', 'Пушкин', true));
                 foreach ($books as $book) {
                         $this->assertContains($author, $book->getAuthors());
                 }
         }

         public function test_max_tomes_count() {
                 $books = Library::getInstance()->findBooksByMaxTomes();
                 foreach ($books as $book) {
                         $this->assertEquals(4, $book->getTomes());
                 }
         }

 }
 ?>
