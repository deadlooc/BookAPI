<?php

 /**
  * Автор Author содержит название автора и книги им написанные
  *
  */
 class Author {

         private $name;
         private $books = array();

         public function __construct($name) {
                 $this->name = $name;
         }

         /**
          * Метод добавления книги данному автору
          * 
          */
         public function addBook(Book $book) {
                 $this->books[] = $book;
         }

         /**
          * Метод получения книг написанных этим автором
          * @return Book[] по умолчанию получаем все книги им написанные
          */
         public function getBooks($onlyPresent = false) {
                 $result = $onlyPresent ? array() : $this->books;
                 if ($onlyPresent) {
                         foreach ($this->books as $book) {
                                 if ($book->isPresent())
                                         $result[] = $book;
                         }
                 }
                 return $result;
         }

         /**
          * Метод получения названия атора
          * @return $this->name 
          */
         function getName() {
                 return $this->name;
         }

 }
 ?>
