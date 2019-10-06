<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategorigaleri;

class kategorigaleriController extends Controller
{
    public function index(){
        $listKategorigaleri=Kategorigaleri::all();

        return view ('kategori_galeri.index', compact ('listKategorigaleri'));  
}
    public function show($id){
            //$kategoriGaleri=KategoriGaleri::where('id',$id)->first();
            $kategorigaleri=Kategorigaleri::find($id);
    
            return view ('kategori_galeri.show',compact('kategorigaleri'));  
        }
    
    public function create(){
            return view('kategori_galeri.create');
        }
    
    public function store(Request $request){
            $input= $request->all();
    
            KategoriGaleri::create($input);
        
            return redirect(route('kategori_galeri.index'));
        }
}
