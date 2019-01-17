<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnimalCreateRequest;
use App\Http\Requests\AnimalUpdateRequest;

use App\Repositories\AnimalRepository;

class AnimalController extends Controller
{
    protected $animalRepository;

    protected $nbrPerPage = 10;

    public function __construct(AnimalRepository $animalRepository)
    {
		$this->animalRepository = $animalRepository;
	}
    public function index()
    {
        $animals = $this->animalRepository->getPaginate($this->nbrPerPage);
        
		$links = $animals->render();

		return view('index', compact('animals', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalCreateRequest $request)
    {
        $animal = $this->animalRepository->store($request->all());

		return redirect('animal')->withOk("L'animal " . $animal->name . " a été créé.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $animal = $this->animalRepository->getById($id);

		return view('show',  compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = $this->animalRepository->getById($id);

		return view('edit',  compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnimalUpdateRequest $request, $id)
    {
        $this->animalRepository->update($id, $request->all());
		
		return redirect('animal')->withOk("L'animal " . $request->input('name') . " a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->animalRepository->destroy($id);

		return back();
    }
}
