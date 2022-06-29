<?php

namespace App\Http\Controllers;

use App\Models\Musteriler;
use Illuminate\Http\Request;
use App\Models\Mailyonetim;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function index()
    {
        return view('include.mail-olustur');
    }

    public function MailOlusturPost(Request $request)
    {
            $request->validate([
                'baslik'=>'required',
                'metin'=>'required',
                'tema'=>'required',
            ]);
            Mailyonetim::create([
                'baslik'=>$request->baslik,
                'metin'=>$request->metin,
                'tema'=> $request->tema,
            ]);
            return redirect()->route('toplu-mail-olusturma')->with('success','Mail Tanımlama Başarılı');
    }
    public function index2()
    {
        return view('include.mail-gonder');
    }

    public function MailGonderPost(Request $request)
    {
          $baslik = $request->baslik;
          $metin = $request->metin;
          $tema = $request->tema;
          $customer = new Musteriler();
          $customer->mail = $request->mail;
          Mail::send('include.mail-gonder',['metin'=>$metin], function ($message) use ($customer,$baslik){
              $message->to($customer->mail)->subject($baslik);
              $customer->save();
          });
          return redirect()->back()->with('success','Mail Gönderildi');

    }

}
