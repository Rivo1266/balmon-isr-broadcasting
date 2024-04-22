<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBroadcastingRequest;
use App\Imports\BroadcastingImport;
use App\Models\Broadcasting;
use Illuminate\Http\Request;

class BroadcastingController extends Controller
{
    public function index(Broadcasting $broadcasting)
    {
        $broadcastings = $broadcasting->latest()->take(1000)->get();
        // dd($broadcastings);
        return view('pages.broadcasting.index', compact('broadcastings'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => [
                'required',
                'file',
                'mimes:xlsx,xls,csv',
                'max:2048',
            ],
        ]);

        $file = $request->file('import_file');

        // validate if all rows have license_id fillied
        $import = new BroadcastingImport();
        if (!$import->allRowsHaveLicId($file)) {
            return redirect(route('broadcastings.index'))->with('warning', 'Semua baris harus memiliki nilai untuk license_id.');
        }

        $import->import($file);

        return redirect(route('broadcastings.index'))->with('success', 'Data broadcasting berhasil diimport.');
    }

    public function edit(Broadcasting $broadcasting)
    {
        return view('pages.broadcasting.edit', compact('broadcasting'));
    }

    public function update(Broadcasting $broadcasting, UpdateBroadcastingRequest $updateBroadcastingRequest)
    {
        $data = $updateBroadcastingRequest->validated();
        $broadcasting->update($data);
        return redirect(route('broadcastings.index'))->with('success', 'Data broadcasting berhasil diperbarui.');
    }

    public function destroy(Broadcasting $broadcasting)
    {
        $broadcasting->delete();
        return redirect(route('broadcastings.index'))->with('success', 'Data broadcasting berhasil dihapus.');
    }
}
