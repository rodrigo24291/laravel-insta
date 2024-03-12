@extends('layouts.app')

@section('content')





<div class="container">

<div class="row justify-content-center">
    
    
    <div class="col-md-8">
        
        <div class="float-left">
            @if($us->image)
            <img src="{{route('Devolver.Imagen',['fo'=>$us->image])}} " class="imagen_perfil rounded-circle"  />
            @endif
    </div>
        <div class="float-left ml-5 mt-5">
        
                <h3 >{{'@'.$us->nick}}<br>
                    {{$us->name }}{{$us->nick }}<br>
                </h3>  



                <span > Se unio  {{ \FormatTime::LongTimeFilter($us->created_at) }}</span>
</div>
            </div>
            </div>

        
@foreach($us->images as $usera)

    <div class="row justify-content-center py-3">
        
        
        
        <div class="col-md-8">
            
            
            
            <div class="card tarjeta-ini">



                <div class="card-header">
                    


                    <img src="{{route('Devolver.Imagen',['fo'=>$us->image])}} " class="perfil" />
                    {{$us->name }} {{$us->surname  }} 
                    <a href="{{route('dar.per',['fo'=>$usera->id])}}">
                        {{'@'.$us->nick  }}</a> </div>
                <div class="card-body mancha">


                    <img src="{{route('image',['fo'=>$usera->image_path])}}" class="ie" />



                    <span>{{$usera->description}} </span> {{ \FormatTime::LongTimeFilter($usera->created_at) }}
                    <br>

                    <img src="{{asset('image/cora.ico')}}">

                    <a hrf="#" class="btn btn-warning ">Comentar ({{ count($usera->comments) }})</a>
                    <br>
                    @foreach($usera->comments as $comentario)
                    <span>{{$comentario->content}}</span><br>
                    @endforeach
                </div>



            </div>
                
        </div>

    </div>
    @endforeach


</div>
@endsection

