<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tempahan;
use App\User;
use App\Lab;

class TempahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $senarai_tempahan = Tempahan::paginate(10);
        return view('tempahan/template_index',compact('senarai_tempahan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $senarai_users = User::select('name', 'id')->get();
      $senarai_labs = Lab::select('nama', 'id')->get();

     return view('tempahan/template_add', compact('senarai_users', 'senarai_labs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
      'user_id' => 'required|integer',
      'lab_id' => 'required|integer',
      'tarikh_mula' => 'required'
      ]);

      $data = $request->all();

      # yang standard
      // $request->input('lab_id');
      # yang shortcut
      // $request->pasteppastebinpas

      $booked = Tempahan::where('lab_id', '=', $request->lab_id)
      ->where('tarikh_mula', '=', $request->tarikh_mula)
      ->first();

      if(count($booked))
      {
        return redirect()->back()->with('ayat-bahaya', 'Tempahan tidak dapat diteruskan kerana ia telah dibooking. Sila pilih tarikh atau lab lain');
      }

      Tempahan::create($data);
      return redirect()->route('tempahan.index')->with('ayat-success', 'Rekod berjaya ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tempahan  $tempahan
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //

        $senarai_tempahan = Tempahan::paginate(10);
        return view('tempahan/template_show',compact('senarai_tempahan'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tempahan  $tempahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tempahan $tempahan)
    {
      # Dapatkan senarai user untuk dropdown
      $senarai_users = User::select('name', 'id')->get();
      # Dapatkan senarai lab untuk dropdown
      $senarai_labs = Lab::select('nama', 'id')->get();
      // $tempahan = Tempahan::find($id);
      return view('tempahan/template_edit', compact('senarai_users', 'senarai_labs', 'tempahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tempahan  $tempahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tempahan $tempahan)
    {
      {
   $request->validate([
     'user_id' => 'required|integer',
     'lab_id' => 'required|integer',
     'tarikh_mula' => 'required'
   ]);
   $data = $request->all();
   // $tempahan = Tempahan::find($id);
   $tempahan->update($data);
   return redirect()->route('tempahan.index')->with('ayat-success', 'Rekod berjaya dikemaskini!');
 }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tempahan  $tempahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tempahan $tempahan)
    {
      // $tempahan = Tempahan::find($id);
      $tempahan->delete();
      return redirect()->route('tempahan.index')->with('ayat-success', 'Rekod berjaya dihapuskan!');
    }
}
