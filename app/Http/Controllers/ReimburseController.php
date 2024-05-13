<?php

namespace App\Http\Controllers;

use App\Models\Reimburse;
use Illuminate\Http\Request;
use PDOException;

class ReimburseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexProcess()
    {
        $apps = Reimburse::where('status', 'Diproses')->orderBy('tanggal')->get();

        return view('direktur.reimbursement.process', compact('apps'));
    }
    public function finance()
    {
        $apps = Reimburse::where('status', 'Menunggu')->orderBy('tanggal')->get();

        return view('direktur.reimbursement.finance', compact('apps'));
    }

    public function indexAccept()
    {
        $apps = Reimburse::where('status', 'Disetujui')->orderBy('tanggal')->get();

        return view('direktur.reimbursement.accept', compact('apps'));
    }

    public function indexReject()
    {
        $apps = Reimburse::where('status', 'Ditolak')->orderBy('tanggal')->get();

        return view('direktur.reimbursement.reject', compact('apps'));
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('direktur.reimbursement.ajukan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date|before_or_equal:today',
            'nama' => 'required',
            'deskripsi' => 'required',
            'file' => 'required|file|mimes:jpeg,jpg,png,gif,pdf',
            'nip' => 'required'
        ]);
        
        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = $file->store('file');
                
                $reim = Reimburse::create([
                    'tanggal' => $request->tanggal,
                    'nama' => $request->nama,
                    'deskripsi' => $request->deskripsi,
                    'url_file' => $filename,
                    'user_nip' => $request->nip
                ]);
            }
            return redirect()->route('reimbursement.indexProcess', $reim->id);
        } catch (PDOException $e) {
            return response()->json([
                'status' => 'Failed',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function detail($id)
    {
        $app = Reimburse::find($id);
        $path = $app->url_file;

        return view('direktur.reimbursement.detail', compact('app', 'path'));
    }
    public function edit($id)
    {
        $app = Reimburse::find($id);
        $path = $app->url_file;

        return view('direktur.reimbursement.edit', compact('app', 'path'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request);
        $request->validate([
            'status' => 'required',
            'id' => 'required|numeric',
        ]);
        try {
            $app = Reimburse::find($request->id);
            $app->status = $request->status;
            $app->save();

            if ($app->status == "Diproses") {
                return redirect()->route('reimbursement.indexProcess');
            } elseif ($app->status == "Menunggu") {
                return redirect()->route('reimbursement.finance');
            } elseif ($app->status == "Disetujui") {
                return redirect()->route('reimbursement.indexAccept');
            } elseif ($app->status == "Ditolak") {
                return redirect()->route('reimbursement.indexReject');
            }
        } catch (PDOException $e) {
            return redirect()->back()->with('Failed', 'Terjadi kesalahan: ' + $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
