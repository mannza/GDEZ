<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class UsersController extends Controller
{
  public function index()
  {
    // $page_title = '<h1>Senarai Users</h1>';
    // $senarai_users = [
    //   ['id' => 1, 'nama' => 'Ali Bin Baba', 'email' => 'alibaba@gmail.com', 'phone' => '0123456789'],
    //   ['id' => 2, 'nama' => 'Abdul Wahab', 'email' => 'abdul@gmail.com', 'phone' => '0123656789'],
    //   ['id' => 3, 'nama' => 'Sidiq Sigaraga', 'email' => 'sidiq@gmail.com', 'phone' => '016576789'],
    //   ['id' => 4, 'nama' => 'Chong Wei', 'email' => 'chongwei@gmail.com', 'phone' => '019866789'],
    //   ['id' => 5, 'nama' => 'Siti', 'email' => 'siti@gmail.com', 'phone' => '0123456559']
    // ];
    $senarai_users = DB::table('users')
    ->orderBy('id', 'asc')
    // ->get();
    // ->where('id', '=',2)
    // ->select('id','nama','email','phone')
    # return view('users/template_index', ['page_title' => $page_title]);
    # return view('users/template_index')->with('page_title', $page_title);
    ->paginate(10);
    return view('users/template_index', compact('page_title', 'senarai_users'));
  }

  public function show()
  {

    $senarai_users = DB::table('users')
    ->orderBy('id', 'asc')

    ->paginate(10);
    return view('users/template_show', compact('page_title', 'senarai_users'));
  }


  public function create()
  {
    return view('users/template_add');
  }
  public function store(Request $request)
  {
    // $this->validate($request, [
    //     'nama' => 'required|min:3',
    //     'email' => 'required|email'
    // ]);
    $request->validate([
        'name' => 'required|min:3|string',
        'password' => 'required',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required'

    ]);
# Dapatkan data dari borang
$data = $request->only('email', 'phone', 'role');
# Jadikan semua huruf besar
$data['name'] = strtoupper( $request->input('name'));
# Dapatkan data password dan encrypt
$data['password'] = bcrypt ($request->input('password'));
# Simpan data ke dalam table users
DB::table('users')->insert($data);
# Setelah selesai simpan data, redirect ke senarai users
return redirect()->route('users.index')->with ('ayat-success', 'Rekod telah berjaya disimpan!');

    // $data=$request->only('nama');
    //   return $data;
    # return 'Rekod telah berjaya disimpan!';
  }
  public function edit($id)
  {
    $user = DB::table('users')->where('id', '=', $id)->first();
    return view('users/template_edit', compact('user'));
  }
  public function update(Request $request, $id)
  {
    $request->validate([
        'name' => 'required|min:3|string',
        'email' => 'required|email|unique:users,email,' . $id,
        'phone' => 'required'
        ]);
        # Dapatkan data dari borang
        $data = $request->only('email', 'phone', 'role');
        # Jadikan semua huruf besar
        $data['name'] = strtoupper( $request->input('name'));
        #dptkn data password jika tidak kosong dan encrypt
        if ( !empty( $request->input('password')))
        {
          $data['password'] = bcrypt($request->input('password'));

        }
        #simpan data ke dalam table Users
        DB::table('users')->where('id', '=', $id)->update($data);
        #setelah simpan data, redirect ke halaman sblm
        return redirect()->back()->with ('ayat-success', 'Rekod telah berjaya dikemaskini!');
    // $data=$request->only('nama');
    //   return $data;
    # return 'Rekod telah berjaya dikemaskini';
  }
  public function destroy($id)
  {
    #dapatkan rekod user yang ingin dihapuskan
  DB::table('users')->where('id', '=', $id)->delete();
  return redirect()->route('users.index')->with ('ayat-bahaya', 'Rekod telah berjaya dipadam!');
  }
}
