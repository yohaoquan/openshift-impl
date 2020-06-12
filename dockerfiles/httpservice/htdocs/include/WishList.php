<?php 

    class WishList {
        public $paintings = array();
    }
    class painting {
        public $paintingID = "";
        public $Title = "";
        public $imageFileName = "";

        public function __construct($id, $title, $imageName){
            $this->paintingID = $id;
            $this->Title = $title;
            $this->imageFileName = $imageName;
        }
    }
?>