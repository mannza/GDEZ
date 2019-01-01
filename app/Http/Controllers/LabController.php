<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Lab;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $senarai_lab = [
        //   ['id' => 1, 'nama' => 'Makmal Komputer 1', 'status' => 'available'],
        //   ['id' => 2, 'nama' => 'Makmal Komputer 2', 'status' => 'not_available'],
        //   ['id' => 3, 'nama' => 'Makmal Komputer 3', 'status' => 'available']
        // ];

        $senarai_lab = Lab::paginate(5);
        return view('labs/template_index', compact('senarai_lab'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('labs/template_add');
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
          'nama' => 'required',
          'status' => 'in:available, not_available',
            ]);


        #dapatkan semua dari borang
          $data=$request->all();
          #simpan data ke table labs
          Lab::create($data);
          #redirect ke halaman senarai Labs
          return redirect()->route('lab.index')->with('ayat-success', 'Rekod telah disimpan');
      // $data=$request->only('nama');
      //   return $data;

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

      public function show()
      {

          $senarai_lab = Lab::paginate(5);
          return view('labs/template_show', compact('senarai_lab'));
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      #dptkan Data berdasarkan idea
      #$Lab=Lab::where('id','=')->first();
      $lab = Lab::find($id);

        return view('labs/template_edit', compact('lab'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
          'nama' => 'required',
          'status' => 'in:available,not_available'
          ]);
          #dapatkan semua data
      $data=$request->all();
      #simpan data ke dalam database berdasarkan ID yang dikemaskini
      $lab=Lab::find($id);
      $lab->update($data);
        return redirect()->route('lab.index')->with('ayat-success', 'Rekod telah dikemaskini');
        # return 'Rekod berjaya dikemaskini';
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      #dptkan rekod user yang ingin dihapuskan merujuk ID lab
      $lab = Lab::find($id);
      $lab->delete();

      return redirect ()
      ->route('lab.index')
      ->with('ayat-success','Rekod telah dihapuskan!');

    }
}
