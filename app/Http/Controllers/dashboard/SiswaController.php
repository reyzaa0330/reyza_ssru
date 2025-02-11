<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Siswa $siswas)
    {
        $q = $request->input('q');

        $active = 'Siswas';

        $siswas = $siswas->when($q, function ($query) use ($q){
                    return $query->where('name', 'like', '%' .$q. '%')
                                 ->orwhere('email', 'like', '%' .$q. '%');
        })

        ->paginate(10);
        return view('dashboard/siswa/list', [
            'siswas' => $siswas,
            'request' => $request,
            'active' => $active
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'Siswas';
        return view('dashboard/siswa/form', [
            'active' => $active,
            'button' =>'Create',
            'url'    =>'dashboard.siswa.store'
            ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_daftar'              => 'required|unique:App\Models\siswa,no_daftar',
            'nama'                   => 'required',
            'nisn'                   => 'required|unique:App\Models\siswa,nisn',
            'nik'                    => 'required|unique:App\Models\siswa,nik',
            'jenis_kelamin'          => 'required',
            'agama'                  => 'required',
            'no_kk'                  => 'required|unique:App\Models\siswa,no_kk',
            'tempat_tanggal_lahir'   => 'required',
            'alamat'                 => 'required',
            'pas_photo'              => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('dashboard.siswa.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $siswa = new siswa(); 
            $image = $request->file('pas_photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('public/siswa', $image, $filename);

            $siswa->no_daftar = $request->input('no_daftar');
            $siswa->nama = $request->input('nama');
            $siswa->nisn = $request->input('nisn');
            $siswa->nik  = $request->input('nik');
            $siswa->jenis_kelamin = $request->input('jenis_kelamin');
            $siswa->agama = $request->input('agama');
            $siswa->no_kk = $request->input('no_kk');
            $siswa->tempat_tanggal_lahir = $request->input('tempat_tanggal_lahir');
            $siswa->alamat = $request->input('alamat');
            $siswa->pas_photo = $filename; 
            $siswa->save();
            
            return redirect()->route('dashboard.siswa');
        }
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
        $active = 'Siswa';
        return view('dashboard/Siswa/show', [
            'active' => $active,
            'siswa'  =>$siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
        $active = 'Siswa';
        return view('dashboard/Siswa/form', [
            'active' => $active,
            'siswa'  =>$siswa,
            'button' =>'Update',
            'url'    =>'dashboard.siswa.update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
            $validator = Validator::make($request->all(), [
                'no_daftar'              => 'required|unique:App\Models\siswa,no_daftar'.$siswa->id,
                'nama'                   => 'required',
                'nisn'                   => 'required|unique:App\Models\siswa,nisn'.$siswa->id,
                'nik'                    => 'required|unique:App\Models\siswa,nik'.$siswa->id,
                'jenis_kelamin'          => 'required',
                'agama'                  => 'required',
                'no_kk'                  => 'required|unique:App\Models\siswa,no_kk'.$siswa->id,
                'tempat_tanggal_lahir'   => 'required',
                'alamat'                 => 'required',
                'pas_photo'              => 'required|image'
            ]);
    
            if ($validator->fails()) {
                return redirect()
                    ->route('dashboard.siswa.update', $siswa->id)
                    ->withErrors($validator)
                    ->withInput();
            } else {
                if($request->hasFile('pas_photo')){
                $image = $request->file('pas_photo');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                    Storage::disk('local')->putFileAs('public/siswa', $image, $filename);
                $siswa->pas_photo = $filename;

                }
                $siswa->no_daftar = $request->input('no_daftar');
                $siswa->nama = $request->input('nama');
                $siswa->nisn = $request->input('nisn');
                $siswa->nik  = $request->input('nik');
                $siswa->jenis_kelamin = $request->input('jenis_kelamin');
                $siswa->agama = $request->input('agama');
                $siswa->no_kk = $request->input('no_kk');
                $siswa->tempat_tanggal_lahir = $request->input('tempat_tanggal_lahir');
                $siswa->alamat = $request->input('alamat');
                $siswa->pas_photo = $filename; 
                $siswa->save();

                return redirect()->route('dashboard.siswa');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
