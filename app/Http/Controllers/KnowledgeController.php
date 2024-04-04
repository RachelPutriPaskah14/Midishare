<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class KnowledgeController extends Controller
{
    // public function showkm()
    // {
    //     $repositorykm = DB::table('repositorykm')->orderBy('id', 'desc')->get();
    //     return view('repositorykm', ['repositorykm' => $repositorykm]);
    // } 

    //  public function showkm()
    // {
    //     $repositorykm = DB::table('repositorykm')->orderBy('id', 'desc')->get();
    //     return view('repositoryall', ['repositorykm' => $repositorykm]);
    // } 
    public function showkm()
    {
        $repositorykm = DB::table('repositorykm')->orderBy('id', 'desc')->get();
        return view('repositorykm', ['repositorykm' => $repositorykm]);
    }

    public function addkm(){
        return view('addkm');
    }

    public function addkm_process(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'dokumenfile' => 'required|mimes:pdf,doc,docx,ppt,pptx',
        ]);

        try {
            // Simpan file
            $dokumenPath = $request->file('dokumenfile')->store('public/dokumen');
            $dokumenNama = basename($dokumenPath);

            DB::table('repositorykm')->insert([
                'judul' => $request->input('judul'),
                'dokumenfile' => $dokumenNama,
            ]);

            return redirect()->action([KnowledgeController::class, 'showkm']);
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kembalikan ke halaman sebelumnya dengan pesan kesalahan
            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan. Silakan coba lagi.']);
        }
    }

    public function detailkm($id)
    {
        $repositorykm = DB::table('repositorykm')->where('id', $id)->first();
        return view('detailkm', ['repositorykm' => $repositorykm]);
    }

    public function show_by_adminkmshow()
    {
        $repositorykm = DB::table('repositorykm')->orderBy('id', 'desc')->get();
        return view('showkm', ['repositorykm' => $repositorykm]);
    }

    public function editkm($id)
    {
        $repositorykm = DB::table('repositorykm')->where('id', $id)->first();
        return view('editkm', ['repositorykm' => $repositorykm]);
    }

    public function editkm_process(Request $request)
    {
    $id = $request->id;
    $judul = $request->judul;
    $dokumenfile = $request->dokumenfile;
    $repositorykm = DB::table('repositorykm')->where('id', $id)->first();
    $gambarLama = $repositorykm->gambarmandiri;
    if ($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('public/icon');
        $gambarNama = basename($gambarPath);
    } else {
        $gambarNama = $gambarLama;
    }        
    DB::table('repositorykm')->where('id', $id)
                     ->update(['judul' => $judul, 'link' => $link, 'gambarmandiri' => $gambarNama]);
    if ($request->hasFile('gambar')) {
        Storage::delete('public/icon/' . $gambarLama);
    }
    Session::flash('success', 'Repository Berhasil diedit');
    return redirect()->route('knowledge.showkm');       
    }

    public function deletekm($id)
        {
            DB::table('repositorykm')->where('id', $id)->delete();
            Session::flash('success', 'Berita berhasil dihapus.');
            return redirect()->action([KnowledgeController::class, 'show_by_adminkmshow']);
        }
}
