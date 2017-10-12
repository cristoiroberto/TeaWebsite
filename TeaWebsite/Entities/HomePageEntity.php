<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomePageEntity
 *
 * @author Cristoi
 */
class HomePageEntity {
   public $id;
    public $content;
    
    function __construct($id, $content) {
        $this->id = $id;
        $this->content = $content;
    }

}
