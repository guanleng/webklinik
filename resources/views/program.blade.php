@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Program Terkini</h1>
        <hr>
   
      
            @foreach($berita as $item)
            
                <div class="card mb-3">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <img src="https://picsum.photos/200/300" alt="">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h2 class="card-title">{{$item->judul}}</h2>
                        <p class="card-text">
                            <small class="text-muted">{{$item->kategori->nama_kategori}}</small> {{$item->created_at}}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
         
            @endforeach
        
    </div>
@endsection    
   