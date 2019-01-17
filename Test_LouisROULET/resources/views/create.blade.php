@extends('template')

@section('contenu')
	<div class="col-sm-offset-4 col-sm-4">
		<br>
		<div class="panel panel-primary">	
			<div class="panel-heading">Création d'un animal</div>
			<div class="panel-body"> 
				<div class="col-sm-12">
					{!! Form::open(['route' => 'animal.store', 'class' => 'form-horizontal panel']) !!}	
					<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
						{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
						{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group">
          <div class="form-check form-check-inline">
					
							<label>
              {!! Form::radio('type', 'reptile',true);     !!}Reptile
              {!! Form::radio('type', 'mammifere');     !!}Mammifere
              {!! Form::radio('type', 'oiseau');     !!}Oiseau
							</label>
						
            </div>
					</div>
          <div class="form-group">
						{!! Form::text('descr', null, ['class' => 'form-control', 'placeholder' => 'Description écailles/plumes/fourrure']) !!}
						{!! $errors->first('descr', '<small class="help-block">:message</small>') !!}
					</div>
          
					{!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@endsection