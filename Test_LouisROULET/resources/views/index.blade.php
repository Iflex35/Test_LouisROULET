@extends('template')

@section('contenu')
    <br>
	
    <div class="col-sm-offset-2 col-sm-6">
    	@if(session()->has('ok'))
			<div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>
		@endif
		<div>
		{!! link_to_route('animal.create', 'Ajouter un animal', [], ['class' => 'btn btn-info pull-left']) !!}
		{!! $links !!} 
		</div>
		<br>
		<br>
		<br>
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Liste des animaux</h3>
			</div>
            <div class="table-responsive-lg">
			<table  class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th >Description</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<tr>
	
		</tr>
					@foreach ($animals as $animal)
					<?php 
					$bgcolor="blue" ;
						if ($animal->type == 'reptile') {
                         	$reptile = new App\Reptile($animal->name,$animal->descr); 
						 	$bgcolor = "lightgreen";
							$col_descr =  $reptile->hiss(). ' et mes écailles sont  '. $reptile->scale;
						}
						else if ($animal->type == 'mammifere') {  
                                $mammifere = new App\Mammifere($animal->name,$animal->descr); 
								$bgcolor="lightblue";
								$col_descr = $mammifere->growl(). ' et ma fourrure est '. $mammifere->fur;
						}
						else if ($animal->type == 'oiseau') {  
                                $oiseau = new App\Oiseau($animal->name,$animal->descr);
								$bgcolor="lightyellow";
								$col_descr = $oiseau->tweet(). ' et mes plumes sont '. $oiseau->feathers;
						}
						else {
							$bgcolor='crimson';
							$col_descr = 'Bad_type';  }
						 ?>
					

						

		<tr bgcolor="<?php echo $bgcolor ?>" >
			<td>{!! $animal->id !!}</td>
			<td class="text-primary"><strong>{!! $animal->name !!}</strong></td>
			<td class="text-primary"><strong> <?php echo $col_descr ?></strong></td>
			<td>{!! link_to_route('animal.edit', 'Modifier', [$animal->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
			<td>
				{!! Form::open(['method' => 'DELETE', 'route' => ['animal.destroy', $animal->id]]) !!}
				{!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet animal ?\')']) !!}
				{!! Form::close() !!}
			</td>
		</tr>
		
		@endforeach
						
		</tbody>
		</table>
		</div>
		</div>
		{!! link_to_route('animal.create', 'Ajouter un animal', [], ['class' => 'btn btn-info pull-right']) !!}
		{!! $links !!}
		</div>
		@endsection