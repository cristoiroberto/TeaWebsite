<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AboutPageEntity
 *
 * @author Cristoi
 */
class AboutPageEntity {
    public $id;
    public $name;
    
    function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

}
