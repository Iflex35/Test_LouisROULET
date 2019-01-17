<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Oiseau extends Animal
{
    protected $fillable = ['animal_id', 'name', 'feathers'];
    protected $table = 'oiseaux';
    
    public function  __construct($name,$feathers) {
    $this->name = $name;
    $this->feathers = $feathers;
    parent::boot();

    }
    
    public function tweet() {
    return "Je suis un(e) ".$this->name; 
    }

    public static function addOiseau($name,$scale,$id_animal){

        $oiseau = new Oiseau($name,$scale);
         $oiseau->animal_id = $id_animal;
 
         $oiseau->save();
 
        
     }
 
     public static function deleteOiseau($id_animal) {
         DB::table('oiseaux')->where('animal_id', $id_animal)->delete();
     }
 
}
