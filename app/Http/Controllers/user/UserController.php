<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use File;

class UserController extends Controller
{
    //
    public function index()
    {
        $data['user'] = User::all();
        return view('user.index', $data);
    }

    public function index_tambah()
    {

        return view('user.index_tambah');
    }

    public function index_edit(Request $request, $id)
    {
        $data['user'] = User::where('id', $id)->get();
        return view('user.index_edit', $data);
    }

    // public function store(Request $request)
    // {
    //        $will_insert = $request->except(['foto','tanggal','_token']);
    //        $tanggal = strtotime($request->input('tanggal'));
    //        $will_insert['tanggal']=date('Y-m-d',$tanggal);
    //        if ($request->hasFile('foto')) {
    //         $this->validate($request, [
    //             'foto' => 'max:2000',
    //         ],
    //         [
    //             'foto.max' => 'Maksimal 2 Mb',
    //         ]

    //     );
    //         $path_file = $request->file('foto')->store(
    //             'foto','public'
    //         );

    //         $will_insert['foto']=$path_file;
    //         }

    //          $user = User::create($will_insert);

    //          return redirect('user')->with('message','Berhasil menyimpan data');
    // }

    public function update(Request $request)
    {
        $will_insert = $request->except(['password', '_token', '_method']);
        $will_insert['password'] = bcrypt($request->input('password'));

        $user = User::where('id', $request->input('id'))->update($will_insert);
        // return response()->json(true);
        return redirect('user')->with('message', 'Berhasil mengubah password');
    }

    public function hapus(Request $request, $id)
    {
        // hapus file
        $user = User::where('id', $id)->first();
        File::delete('storage/' . $user->foto);

        // hapus data
        User::where('id', $id)->delete();

        return redirect()->back()->with('message', 'Berhasil menghapus data');
    }
}
