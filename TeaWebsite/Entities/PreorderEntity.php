<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PreorderEntity
 *
 * @author Cristoi
 */
class PreorderEntity {

    public $id;
    public $name;
    public $type;
    public $email;
    public $telephone;
    public $country;
    public $city;
    public $street;
    
    function __construct($id, $name, $type, $email, $telephone, $country, $city, $street) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->country = $country;
        $this->city = $city;
        $this->street = $street;
    }

}
