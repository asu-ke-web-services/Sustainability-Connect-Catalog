{!! Form::label("addresses[$address->id][count]", "Location $count:") !!}
{!! Form::text("addresses[$address->id][city]", $address->city, ['class' => 'form-control', 'placeholder' => 'City']) !!}
{!! Form::text("addresses[$address->id][state]", $address->state, ['class' => 'form-control', 'placeholder' => 'State/Prov']) !!}
{!! Form::text("addresses[$address->id][country]", $address->country, ['class' => 'form-control', 'placeholder' => 'Country']) !!}
{!! Form::textarea("addresses[$address->id][note]", $address->note, ['class' => 'form-control', 'placeholder' => 'Note']) !!}
