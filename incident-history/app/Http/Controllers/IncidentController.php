<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tbl_incident;
use App\Models\Tbl_status;
use App\Models\Tbl_type;

class IncidentController extends Controller
{
    public function index()
    {
        $incident = Tbl_incident::with('tipe', 'kondisi')->get();
        return view('report.index', compact('incident'));
    }

    public function create()
    {
        $tipes = Tbl_type::all();
        $statuses = Tbl_status::all();
        return view('report.form', compact('tipes', 'statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subdomain' => 'required|unique:tbl_incident,subdomain',
            'webowner' => 'required',
            'type' => 'required|unique:tbl_type',
            'date' => 'required|date',
            'status' => 'required',
        ]);

        $data = $request->except('_token');

        Tbl_incident::create($data);

        return redirect()->route('report.index')->with('success', 'Laporan Insiden berhasil ditambahkan');
    }

    public function edit($id)
    {
        $incident = Tbl_incident::findOrFail($id);
        $tipes = Tbl_type::all();
        $statuses = Tbl_status::all();
        return view('report.form', compact('incident', 'tipes', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subdomain' => 'required|unique:tbl_incident,subdomain,'.$id,
            'webowner' => 'required',
            'type' => 'required',
            'date' => 'required|date',
            'status' => 'required',
        ]);
        $incident = Tbl_incident::findOrFail($id);
        $data = $request->all();
        $incident->update($data);
        return redirect()->route('report.index')->with('success', 'Laporan Insiden berhasil diupdate');
    }

    public function destroy($id)
    {
        $incident = Tbl_incident::findOrFail($id);
        $incident->delete();
        return redirect()->route('report.index')->with('success', 'Laporan Insiden berhasil dihapus');
    }
}
