<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Animal;
use App\Reptile;
use App\Mammifere;
use App\Oiseau;

class AnimalRepository
{

    protected $animal;
    protected $reptile;

    public function __construct(Animal $animal)
	{
        $this->animal = $animal;
	   $this->reptile = new Reptile("Null",'Null');
	   $this->mammifere = new Mammifere("Null",'Null');
	   $this->oiseau = new Oiseau("Null",'Null');
	}

	private function save(Animal $animal, Array $inputs)
	{
        
		$animal->name = $inputs['name'];
        $animal->type = $inputs['type'];	
        $animal->descr = $inputs['descr'];	
     

        $animal->save();
    
  
    
    }
    
    private function saveReptile(Reptile $reptile, Array $inputs)
	{
        $id_animal =DB::table('animals')->where('name',$inputs['name'])->value('id');
		$reptile->name = $inputs['name'];	
        $reptile->scale =$inputs['descr'];	
        $reptile->animal_id = $id_animal;

        $reptile->save();
       
    
	}

    public function isReptile($type) {
        
        return $type == 'reptile';
	}
	public function isMammifere($type) {
        
        return $type == 'mammifere';
	}
	public function isOiseau($type) {
        
        return $type == 'oiseau';
    }
	public function getPaginate($n)
	{
		return $this->animal->paginate($n);
	}

	public function store(Array $inputs)
	{
		$animal = new $this->animal;		
		$this->save($animal, $inputs);

		//On récupère l'id_animal 
		$id_animal =DB::table('animals')->where('name',$inputs['name'])->value('id');

		//Création de l'animal
		$this->storeType($inputs,$id_animal);
           
        
	

		return $animal;
	}


	//Création en fonction du type
	public function storeType(Array $inputs,$id_animal) {
		if ($this->isReptile($inputs['type']))  {
			
		$reptile = new Reptile($inputs['name'],$inputs['descr']);
		$reptile->addReptile($inputs['name'],$inputs['descr'],$id_animal);
		}
		else if ($this->isMammifere($inputs['type'])) {
			$mammifere = new Mammifere($inputs['name'],$inputs['descr']);
		$mammifere->addMammifere($inputs['name'],$inputs['descr'],$id_animal);
		}
		
		else if ($this->isOiseau($inputs['type'])) {
			$oiseau = new Oiseau($inputs['name'],$inputs['descr']);
			$oiseau->addOiseau($inputs['name'],$inputs['descr'],$id_animal);
		}
           
		
	}
	

	public function getById($id)
	{
		return $this->animal->findOrFail($id);
	}

	public function update($id, Array $inputs)
	{
		//On supprime occurence 
		$this->reptile->deleteReptile($id);
		$this->mammifere->deleteMammifere($id);
		$this->oiseau->deleteOiseau($id);

		//récupération de l'animal
		//$occ_animal = $this->getById($id);
		$this->save($this->getById($id), $inputs);
		
		$this->storeType($inputs,$id);
		
       
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}