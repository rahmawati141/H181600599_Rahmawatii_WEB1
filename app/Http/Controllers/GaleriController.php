<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use App\Kategorigaleri;

class GaleriController extends Controller
{
    public function index(){
        $listGaleri=Galeri::all();

        return view ('galeri.index', compact ('listGaleri'));
    }
        
    public function show($id){
        $Galeri=Galeri::find($id);

        return view ('galeri.show',compact('Galeri'));  
    }
    public function create(){

        $kategorigaleri=Kategorigaleri::pluck('nama','id',);
        

        return view('galeri.create', compact('kategorigaleri'));
    }

    public function store(Request $request){
        $input= $request->except('path');

     $galeri=Galeri::create($input);
     if ($request->has('path')){
         $file=$request->file('path');
         $filename=$galeri->id.'.'.$file->getClientOriginalExtension();
         $path=$request->path->storeAs('public/galeri',$filename,'local');
         $galeri->path="storage". substr($path,strpos($path, '/'));
         $galeri->save();
     }
        return redirect(route('galeri.index'));
    }

    public function edit($id){
        $galeri=Galeri::find($id);

    if(empty($galeri)){
        return redirect(route('galeri.index'));
    }
        $listKategoriGaleri=KategoriGaleri::pluck('nama','id');
        return view('galeri.edit',compact('galeri','listKategoriGaleri'));
    }

}
