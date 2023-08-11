<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    function getConnection(){
        $user = 'root';
        $pass = '';
        $db = new PDO('mysql:host=localhost;dbname=levex', $user, $pass);
        
        return $db;
    }
}
