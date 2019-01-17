<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
 protected $table = 'animals';
 public $timestamps = false;
 protected $fillable = ['id', 'name', 'type', 'decr'];
 
    public function noise() {
        if($this->type =='reptile') {
            
        }
    }
   
    public function hiss() {
        return null;
        }
    
    public function growl() {
            return null;
            }
    public function tweet() {
        return null;
    }
 }
  

