<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class FotoController extends Controller
{
    public function index()
    {
        $fotos = DB::table('fotos')->orderBy('id','DESC')->get();
        return view('fotos.index',compact('fotos'));
    }
    public function store(Request $request)
    {
        $path = $request->file('url')->store('imagens','public');
        $foto = new Foto();
        $foto->vistoria_id = $request->vistoria_id;
        $foto->imagem = $path; 
        $foto->save();
        return redirect('fotos.store');
    }
    public function destroy($id) {
        $foto = Foto::find($id);
        if (isset($foto)) {
            Storage::disk('public')->delete($foto->imagem); 
            $foto->delete();
        }
        return redirect('/');
    }
    public function download($id) {
        $foto = Foto::find($id);
        if (isset($foto)) {
            $path =  Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($foto->imagem);
            return response()->download($path);
        }
        return redirect('/');
    }
}