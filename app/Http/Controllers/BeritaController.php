<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function show()
    {
        // $news = DB::table('news')->get();

        $news = DB::table('news')->orderBy('id', 'desc')->get();
        return view('beritamidi', ['news' => $news]);
    }    

    public function add(){
        return view('add');
    }

    public function add_process(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $gambarPath = $request->file('gambar')->store('public/icon');
        $gambarNama = basename($gambarPath);

        DB::table('news')->insert([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $gambarNama,
        ]);
        return redirect()->action([BeritaController::class, 'show']);
    }

    public function detail($id)
    {
        $news = DB::table('news')->where('id', $id)->first();
        // return view('detail', ['news'=>$news]);
        return view('detail', ['news' => $news]);
        // dd($news);
    }

    public function show_by_admin()
    {
        $news = DB::table('news')->orderBy('id', 'desc')->get();
        return view('adminshow', ['news' => $news]);
    }

    public function edit($id)
    {
        $news = DB::table('news')->where('id', $id)->first();
        return view('edit', ['news' => $news]);
    }

    public function edit_process(Request $request)
{
    $id = $request->id;
    $judul = $request->judul;
    $deskripsi = $request->deskripsi;

    // Mengambil gambar lama
    $news = DB::table('news')->where('id', $id)->first();
    $gambarLama = $news->gambar;

    // Jika ada file gambar yang diunggah
    if ($request->hasFile('gambar')) {
        // Menyimpan gambar baru
        $gambarPath = $request->file('gambar')->store('public/icon');
        $gambarNama = basename($gambarPath);
    } else {
        // Jika tidak ada gambar baru, gunakan gambar lama
        $gambarNama = $gambarLama;
    }        

    // Update data berita
    DB::table('news')->where('id', $id)
                     ->update(['judul' => $judul, 'deskripsi' => $deskripsi, 'gambar' => $gambarNama]);

    // Jika gambar baru diunggah, hapus gambar lama
    if ($request->hasFile('gambar')) {
        Storage::delete('public/icon/' . $gambarLama);
    }

    // Set pesan sukses dan redirect
    Session::flash('success', 'Berita Berhasil diedit');
    return redirect()->route('berita.show');       
}

    public function delete($id)
    {
        // Menghapus berita berdasarkan ID
        DB::table('news')->where('id', $id)->delete();

        // Set pesan sukses dan redirect ke halaman yang sesuai
        Session::flash('success', 'Berita berhasil dihapus.');
        return redirect()->action([BeritaController::class, 'show_by_admin']);
    }


}

