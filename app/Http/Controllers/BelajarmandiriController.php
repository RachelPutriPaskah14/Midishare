<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BelajarmandiriController extends Controller
{
    public function showmandiri()
    {
        $mandiri = DB::table('mandiri')->orderBy('id', 'desc')->get();
        return view('belajarmandiri', ['mandiri' => $mandiri]);
    } 

    public function addmandiri(){
        return view('addmandiri');
    }

    public function addmandiri_process(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'link' => 'required',
            'gambarmandiri' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambarPath = $request->file('gambarmandiri')->store('public/icon');
        $gambarNama = basename($gambarPath);

        DB::table('mandiri')->insert([
            'judul' => $request->input('judul'),
            'link' => $request->input('link'),
            'gambarmandiri' => $gambarNama,
        ]);
        return redirect()->action([BelajarmandiriController::class, 'showmandiri']);
    }

    public function detailmandiri($id)
    {
        $mandiri = DB::table('mandiri')->where('id', $id)->first();
        return view('detailmandiri', ['mandiri' => $mandiri]);
        // dd($news);
    }

    public function show_by_adminmandirishow()
    {
        $mandiri = DB::table('mandiri')->orderBy('id', 'desc')->get();
        return view('adminmandirishow', ['mandiri' => $mandiri]);
    }

    public function editmandiri($id)
    {
        $mandiri = DB::table('mandiri')->where('id', $id)->first();
        return view('editmandiri', ['mandiri' => $mandiri]);
    }

    public function editmandiri_process(Request $request)
    {
    $id = $request->id;
    $judul = $request->judul;
    $link = $request->link;
    $mandiri = DB::table('mandiri')->where('id', $id)->first();
    $gambarLama = $mandiri->gambarmandiri;
    if ($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('public/icon');
        $gambarNama = basename($gambarPath);
    } else {
        $gambarNama = $gambarLama;
    }        
    DB::table('mandiri')->where('id', $id)
                     ->update(['judul' => $judul, 'link' => $link, 'gambarmandiri' => $gambarNama]);
    if ($request->hasFile('gambar')) {
        Storage::delete('public/icon/' . $gambarLama);
    }
    Session::flash('success', 'Berita Berhasil diedit');
    return redirect()->route('belajarmandiri.show');       
    }

    public function deletemandiri($id)
        {
            DB::table('mandiri')->where('id', $id)->delete();
            Session::flash('success', 'Berita berhasil dihapus.');
            return redirect()->action([BelajarmandiriController::class, 'show_by_adminmandirishow']);
        }

}
