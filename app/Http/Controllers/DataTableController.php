<?php

namespace App\Http\Controllers;

use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Contracts\DataTable;

class DataTableController extends Controller
{


    public function clientside(Request $request)
    {
        $data = new User;
        if ($request->get('search')) {
            $data = $data->where('name', 'like', '%' . $request->get('search') . '%')
                ->orWhere('email', 'like', '%' . $request->get('search') . '%');
        }
        $data = $data->get();
        return view('datatable.clientside', compact('data', 'request'));
    }
    public function serverside(Request $request)
    {
        if ($request->ajax()) {
            $data = new User;
            $data = $data->latest();
            return DataTables::of($data)
                ->addColumn('no', function ($data) {
                    return 'ini nomor';
                })
                ->addColumn('photo', function ($data) {
                    return '<img src="' . asset('storage/photo-user/' . $data->image) . '" width="100">';
                })
                ->addColumn('nama', function ($data) {
                    return $data->name;
                })
                ->addColumn('email', function ($data) {
                    return $data->email;
                })
                ->addColumn('action', function ($data) {
                    return '<a href="' . route('admin.user.edit', ['id' => $data->id]) . '" class="btn btn-primary"><i class="fas fa-pen">Edit</i></i></a>
                                <a data-toggle="modal" data-target="#modal-delete' . $data->id . '"  class="btn btn-danger"><i class="fas fa-trash-alt">Hapus</i></i></a>';
                })
                ->rawColumns(['photo', 'action'])
                ->make(true);
        }
        return view('datatable.serverside', compact('request'));
    }
}
