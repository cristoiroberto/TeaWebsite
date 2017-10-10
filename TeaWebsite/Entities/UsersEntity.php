<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersEntity
 *
 * @author Cristoi
 */
class UsersEntity {
    public $id;
     public $username;
    public $email;
    public $password;
    public $rank;
    
    function __construct($id, $username, $email, $password, $rank) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->rank = $rank;
    }


}
