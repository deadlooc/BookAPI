<?php

/**
 * BookRequest содержит данные для поиска в библиотеки
 *
 */
class BookRequest {
        public $title;
        public $author;
        public $onlyPresent;
        
        public function __construct( $title, $author, $onlyPresent ) {
                $this->title = $title;
                $this->author = $author;
                $this->onlyPresent = $onlyPresent;
        }
}
?>
