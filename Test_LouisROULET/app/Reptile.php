<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reptile extends Animal
{
    protected $fillable = ['animal_id', 'name', 'scale'];
    protected $table = 'reptiles';
    
    public function  __construct($name,$scale) {
    $this->name = $name;
    $this->scale = $scale;
    parent::boot();

    }
    
    public function hiss() {
    return "Je suis un(e) ".$this->name; 
    }

    public static function addReptile($name,$scale,$id_animal){

       $reptile = new Reptile($name,$scale);
        $reptile->animal_id = $id_animal;

        $reptile->save();

       
    }

    public static function deleteReptile($id_animal) {
        DB::table('reptiles')->where('animal_id', $id_animal)->delete();
    }

}
