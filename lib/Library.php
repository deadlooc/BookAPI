<?php

/**
 * Библиотека Library в единственном экземпляре, хранит аторов и книги
 *
 */
class Library {

        private static $instance = null;

        private function __construct() {
                ;
        }

        public static function getInstance() {
                if ( self::$instance == null )
                        self::$instance = new Library();
                return self::$instance;
        }

        private $authors = array();
        private $books = array();

        /**
         * Метод регистрации книги в библиотеки
         * @param Book $book
         */
        public function registerBook( Book $book ) {
                $this->books[] = $book;
        }

        /**
         * Метод списания книги из библиотеки
         * @param Book $book
         */
        public function unregisterBook( Book $book ) {
                unset( $this->books[ array_search( $book, $this->books ) ] );
        }

        /**
         * Метод поиска книги по автору
         * @param BookRequest $request
         * @return Book[] возвращает массив книг
         */
        public function findBooksByAuthor( BookRequest $request ) {
                return $this->getAuthor( $request->author )->getBooks( $request->onlyPresent );
        }

        /**
         * метод поиска книги по названию
         * @param BookRequest $request
         * @return Book[] возвращает массив книг
         */
        public function findBooksByTitle( BookRequest $request ) {
                $result = array();
                foreach ( $this->books as $book ) {
                        if ( strtolower( $book->getTitle() ) == strtolower( $request->title ) )
                                $result[] = $book;
                }
                return $result;
        }

        /**
         * Метод поиска всех многотомников
         * @return Book[] возвращает массив книг
         */
        public function findBooksByMaxTomes() {
                $result = array();
                $max = 0;
                foreach ( $this->books as $book ) {
                        if ( $book->getTomes() > $max ) {
                                $result = array();
                                $max = $book->getTomes();
                        }
                        if ( $book->getTomes() == $max )
                                $result[] = $book;
                }
                return $result;
        }

        /**
         * Метод получения атора
         * @param string $author атоматически приводится к нижнему регистру
         * @return Author возвращает автора
         */
        public function getAuthor( $author ) {
                $author = strtolower( $author );
                if ( !isset( $this->authors[ $author ] ) )
                        $this->authors[ $author ] = new Author( $author );
                return $this->authors[ $author ];
        }

}
?>
