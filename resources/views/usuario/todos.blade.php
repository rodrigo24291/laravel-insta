@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-group row">

                <form method="get" action="{{route('gentes.de')}}">
                    <label for="buscador" class="col-md-4 col-form-label text-md-right">Buscar Usuario</label>

                    
                        <input  type="text" class="form-control" name="name" >
                   



                    <button type="submit" class="btn btn-primary">
                        Buscar
                    </button>
                </form>
            </div>

        </div>
                       
            @foreach($gente as $gentes)
            <div class="col-md-8">
            <div class="float-left">
            @if($gentes->image)
            <img src="{{route('Devolver.Imagen',['fo'=>$gentes->image])}} " class="imagen_perfil rounded-circle"  />
            @endif
            </div>
        <div class="float-left ml-5 mt-5">

            <h3 >{{'@'.$gentes->nick}}<br>
                {{$gentes->name }}{{$gentes->nick }}<br>
            </h3>  



            <span > Se unio  {{ \FormatTime::LongTimeFilter($gentes->created_at) }}</span>
        </div>
                <hr>
</div>
            
        @endforeach




    </div>

</div>


@endsection




