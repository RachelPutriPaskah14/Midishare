<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{
    public function showvideomod()
    {
        $videomod = DB::table('videomod')->orderBy('id', 'desc')->get();
        return view('modkm', ['videomod' => $videomod]);
    }

    public function addvidmod()
    {
        return view('addvidmod');
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

    public function addvidmod_process(Request $request)
    {
        $request->validate([
            'judulvidmod' => 'required',
            'dokumenvideo' => 'required|mimes:mp4,mkv,avi,mpg,webm',
        ]);

        try {
            $dokumenPath = $request->file('dokumenvideo')->store('public/dokumen');
            $dokumenNama = basename($dokumenPath);

            DB::table('videomod')->insert([
                'judulvidmod' => $request->input('judulvidmod'),
                'dokumenvideo' => $dokumenNama,
            ]);

            return redirect()->route('video.showvideomod')->with('success', 'Video berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan. Silakan coba lagi.']);
        }
    }

    public function detailvid($id)
    {
        $videomod = DB::table('videomod')->where('id', $id)->first();
        return view('detailvid', ['videomod' => $videomod]);
    }

    public function show_by_adminvidshow()
    {
        $videomod = DB::table('videomod')->orderBy('id', 'desc')->get();
        return view('showvidmod', ['videomod' => $videomod]);
    }

    public function editvidmod($id)
    {
        $videomod = DB::table('videomod')->where('id', $id)->first();
        return view('editvid', ['videomod' => $videomod]);
    }

    public function editvid_process(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'judulvidmod' => 'required',
            'dokumenvideo' => 'nullable|mimes:mp4,mkv,avi,mpg,webm',
        ]);

        $id = $request->id;
        $judulvidmod = $request->judulvidmod;

        $videomod = DB::table('videomod')->where('id', $id)->first();
        $dokumenLama = $videomod->dokumenvideo;

        try {
            $dokumenNama = $dokumenLama;

            if ($request->hasFile('dokumenvideo')):
                Storage::delete('public/dokumen/' . $dokumenLama);
                $dokumenPath = $request->file('dokumenvideo')->store('public/dokumen');
                $dokumenNama = basename($dokumenPath);
            endif;

            DB::table('videomod')->where('id', $id)->update([
                'judulvidmod' => $judulvidmod,
                'dokumenvideo' => $dokumenNama,
            ]);

            Session::flash('success', 'Video berhasil diupdate.');
            return redirect()->route('video.showvideomod');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan. Silakan coba lagi.']);
        }
    }

    public function deletevidmod($id)
    {
        $videomod = DB::table('videomod')->where('id', $id)->first();
        $dokumenPath = $videomod->dokumenvideo;

        try {
            Storage::delete('public/dokumen/' . $dokumenPath);
            DB::table('videomod')->where('id', $id)->delete();
            Session::flash('success', 'Video berhasil dihapus.');
            return redirect()->route('video.show_by_adminvidshow');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan. Silakan coba lagi.']);
        }
    }
}
