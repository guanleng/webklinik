<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    public function tampilkegiatan(){
        
        #$kegiatanlist= \DB::table("tblkegiatan")->get();
        
        $kegiatanlist = Kegiatan::all();
        return view ("kegiatan")
            ->with("kegiatanList",$kegiatanlist);
    }
    
    public function create(Request $request)
    { 
           Kegiatan::create([ 
               "tanggal" => $request->tanggal,
               "waktu" => $request->waktu,
               "kegiatan" => $request->kegiatan,
               "status" => "pending",
               ]);
        return redirect('/kegiatan')->with('info', 'Data berhasil ditambahkan!');
    }
    
    public function delete($id){
        Kegiatan::where("id",$id)->delete();
        return redirect('/kegiatan')->with('info', 'Data berhasil dihapus!');
    }
    
    public function edit($id){
       $kegiatan = \App\Models\Kegiatan::find($id);
       return view("/edit",["kegiatan"=>$kegiatan]);
    }
    
    public function update(Request $request, $id){
        $kegiatan = \App\Models\Kegiatan::find($id);
        $kegiatan->update($request->all());
        return redirect('/kegiatan')->with('info', 'Data berhasil diubah!');
    }
    
    public function action($id){
        Kegiatan::where("id",$id)->update([
            "status" => "selesai"
            ]);
        return redirect('kegiatan')->with('info', 'Data berhasil diupdate!');
    }

}
