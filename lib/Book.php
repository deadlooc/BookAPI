<?php

 /**
  * Книги Book содержит название, авторов, колличество томов и наличие 
  *
  */
 class Book {

         private $title;
         private $tomes;
         private $count;
         private $authors;

         public function __construct($title, $tomes, array $authors) {
                 $this->title = $title;
                 $this->tomes = (int) $tomes;
                 $this->count = 0;
                 $this->authors = array();
                 if (count($authors) == 0)
                         throw new Exception('У книги нет авторов');
                 foreach ($authors as $author) {
                         $authorObj = Library::getInstance()->getAuthor($author);
                         $this->authors[] = $authorObj;
                         $authorObj->addBook($this);
                 }
         }

         /**
          * Метод проверки наличия книги
          * @return boolean наличие книги
          */
         public function isPresent() {
                 return $this->count > 0;
         }

         /**
          * Метод увеличения количества книг в наличии
          * $this->count++
          */
         public function incrementCount($count) {
                 $this->count +=$count;
         }

         /**
          * Метод уменьшения количества книг в наличии
          * $this->count--
          */
         public function decrementCount($count) {
                 if ($this->count < $count)
                         throw new Exception('Превышено допустимое колличество');
                 $this->count -=$count;
         }

         /**
          * Метод возвращающий количество книг в наличии
          * @return $this->count
          */
         public function getCount() {
                 return $this->count;
         }

         /**
          * Метод возвращающий название книги
          * @return $this->title
          */
         public function getTitle() {
                 return $this->title;
         }

         /**
          * Метод возвращающий количество томов книги
          * @return $this->tomes
          */
         public function getTomes() {
                 return $this->tomes;
         }

         /**
          * Метод возвращающий авторов книги
          * @return $this->authors
          */
         function getAuthors() {
                 return $this->authors;
         }

 }
 ?>
