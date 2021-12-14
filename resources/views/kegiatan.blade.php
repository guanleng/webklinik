@extends('layouts.app')

@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kegiatan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="jumbotron jumbotron-fluid mt-3">
        <div class="container ">
            <h1 class="display-4">Pusat Informasi Kegiatan</h1>
            <p class="lead">Pada halaman ini anda dapat melihat seluruh kegiatan yang akan dilaksanakan oleh Praktek Bidan Mandiri Rismawati</p>
            <a class="btn btn-primary" href="/welcome" role="button">Home</a>
        </div>
    </div>
    <div class="container">
    @if(session("info"))
    <div class="alert alert-success">
        {{session("info")}}
    </div>
    @endif()
        <div class="row">
            <div class="col md-6">
                <button type="button" class="btn btn-primary float-right mb-2" data-toggle="modal" data-target="#exampleModal"
                >Tambah Kegiatan
                </button>
                
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
                <th width="5%" >Nomor </th>
                <th>Tanggal </th>
                <th>Waktu </th>
                <th>Kegiatan </th>
                <th colspan=3 class="w-25 text-center">Action</th>
            </tr>
          </thead>
            <tbody>
        @foreach($kegiatanList as $item)
                <tr @if ($item->status=="selesai")
                  class="bg-success text-white"
                @endif>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$item->tanggal}} </td>
                    <td>{{$item->waktu}} </td>
                    <td>{{$item->kegiatan}} </td>
                    <td>
                        <a href="/edit/{{$item->id}}"class="btn btn-block btn-warning 
                        @if ($item->status=="selesai")
                            disabled
                        @endif">Edit</a>
                    </td>
                    <td>
                        <a href="/delete/{{$item->id}}" class="btn btn-block btn-danger 
                        @if ($item->status=="selesai")
                            disabled
                        @endif">Hapus</a>
                    </td>
                     <td>
                        <a href="/action/{{$item->id}}" class="btn btn-block btn-success
                        @if ($item->status=="selesai")
                            disabled
                        @endif">Selesai</a>
                    </td>
                </tr>
        @endforeach            
            </tbody>
        </table>
    </div>
    
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-body">
                  <form action="/create" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="">Tanggal format </label>
                        <input name="tanggal" type="date" class="form-control" id="" aria-describedby="emailHelp" placeholder="Masukkan Tanggal">
                      </div>
                      
                      <div class="form-group">
                        <label for="">Waktu </label>
                        <input name="waktu" type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="(Pagi/Siang/Sore/Malam)">
                      </div>
                      
                      <div class="form-group">
                        <label for="">Kegiatan</label>
                        <input name="kegiatan" type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Input Kegiatan">
                      </div>
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            
            </div>
          </div>
        </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>
@endsection