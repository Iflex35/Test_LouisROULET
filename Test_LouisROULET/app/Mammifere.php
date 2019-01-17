<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mammifere extends Animal
{
    protected $fillable = ['animal_id', 'name', 'fur'];
    protected $table = 'mammiferes';
    
    public function  __construct($name,$fur) {
    $this->name = $name;
    $this->fur = $fur;
    parent::boot();

    }
    
    public function growl() {
    return "Je suis un(e) ".$this->name; 
    }

    public static function addMammifere($name,$scale,$id_animal){

        $mammifere = new Mammifere($name,$scale);
         $mammifere->animal_id = $id_animal;
 
         $mammifere->save();
 
        
     }
 
     public static function deleteMammifere($id_animal) {
         DB::table('mammiferes')->where('animal_id', $id_animal)->delete();
     }
 
}
