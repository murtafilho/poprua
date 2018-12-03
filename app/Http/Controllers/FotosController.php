<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Foto;
use Illuminate\Support\Facades\Storage;
class FotosController extends Controller
{
    public function index()
    {
        $Fotos = Foto::all();
        return view('/fotos', compact(['Fotos']));
    }
    public function store(Request $request)
    {
        $path = $request->file('arquivo')->store('imagens','public');
        $Foto = new Foto();
        $Foto->email = $request->input('email'); 
        $Foto->mensagem = $request->input('mensagem'); 
        $Foto->arquivo = $path; 
        $Foto->save();
        return redirect('/fotos');
    }
    public function destroy($id) {
        $Foto = Foto::find($id);
        if (isset($Foto)) {
            Storage::disk('public')->delete($Foto->arquivo); 
            $Foto->delete();
        }
        return redirect('/fotos');
    }
    public function download($id) {
        $Foto = Foto::find($id);
        if (isset($Foto)) {
            $path =  Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($Foto->arquivo);
            return response()->download($path);
        }
        return redirect('/fotos');
    }
}