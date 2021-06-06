<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortLink;
class AdminController extends Controller
{
    public function index() {
      return view('admin/index',['shortLinks' => ShortLink::all()]);
    }

    public function destroy($id) {
      ShortLink::where('id','=',$id)->delete();
      //return view('admin/index',['shortLinks' => ShortLink::all()]);
      return redirect()->route('admin.index');
    }
}
