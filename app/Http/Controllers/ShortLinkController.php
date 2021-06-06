<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortLink;
use App\LinkHistory;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
  public function index() {
        return view('shortenLink',['shortLink' => ShortLink::latest()->first()]);
  }

  public function store(Request $request) {
    $request->validate([
      'originUrl' => 'required|url'
    ]);

    ShortLink::create([
      'originUrl' => $request->originUrl,
      'shortUrl' => str_random(7)
    ]);

    return redirect()->route('generate')
        ->with('success','Short link was created!');
  }

  public function shortenLink($shortUrl, Request $request) {
    $link = ShortLink::where('shortUrl',$shortUrl)->first();

    LinkHistory::create([
      'shortUrl' => $shortUrl,
      'ip' => $request->ip(),
      'userAgent' => $request->userAgent(),
    ]);

    return redirect($link->originUrl);
  }
}
