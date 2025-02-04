<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->get();

        return view("pegawai.index", compact("employees"));
    }

    public function create()
    {
        if (!Auth::check() || Auth::user()->role !== "admin") {
            abort(403, 'Anda tidak memiliki akses.');
        }

        return view("pegawai.create");
    }

    public function edit(Employee $employee)
    {
        return view("pegawai.edit", compact("employee"));
    }

    public function update(Employee $employee, Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "nip" => "required|unique:employees,nip," . $employee->id,
            "jabatan" => "required",
            "departemen" => "required",
            "gaji" => "required|integer",
            "tgl_gabung" => "required|date"
        ]);

        $employee->update($request->all());
        return redirect()->route("pegawai.index")->with("success", "Data pegawai berhasil diubah");
    }

    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== "admin") {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $request->validate([
            "name" => "required|string|max:255",
            "nip" => "required|unique:employees,nip",
            "jabatan" => "required",
            "departemen" => "required",
            "gaji" => "required|integer",
            "tgl_gabung" => "required|date"
        ]);

        Employee::create($request->all());

        return redirect()->route("pegawai.index")->with("success", "Data pegawai berhasil ditambah");
    }

    public function destroy(Employee $employee)
    {
        if (!Auth::check() || Auth::user()->role !== "admin") {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $employee->delete();

        return redirect()->back()->with("success", "Data pegawai berhasil dihapus");
    }
}
