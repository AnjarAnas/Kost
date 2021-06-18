<?php

namespace App\Http\Livewire;

use App\Mail\ReminderMail;
use App\Models\Bulan;
use App\Models\Pelanggan;
use App\Models\Pendapatan;
use App\Models\Tahun;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class DataAdmin extends Component
{
    public $tahun;
    public $kondisi='tahun';
    public $bulan;
    public $nama;
    public $bayar;
   
    public function render()
    {
        $this->tahun=Tahun::all();
        return view('livewire.data-admin')->extends('layouts.app')->section('content');
    }
    public function index($id_tahun){
        $this->kondisi='bulan';
        $this->bulan=Bulan::where('id_tahun','=',$id_tahun)->get();
        return view('dashboard');
    }
    
    public function detail($id){
        $this->kondisi='detail';
        $this->bayar=DB::table('pembayaran')
        ->join('bulan','pembayaran.id_bulan','=','bulan.id_bulan')
        ->join('pelanggan','pembayaran.id_user','=','pelanggan.id_user')
        ->where('pembayaran.id_bulan','=',$id)
        ->get();
        
        $this->nama=Pelanggan::all();
        
    }
    public function reminder($id){
        $condition=false;
        $data=DB::table('pembayaran')
        ->where('pembayaran.id_bayar','=',$id)->get();
        $user=User::where('id_user','=',$data[0]->id_user)->get();
        $bulan=Bulan::where('id_bulan','=',$data[0]->id_bulan)->get();
        $message="Nama              : ".$user[0]->name."%0aID Bayar          : ".$data[0]->id_bayar."%0aJumlah Bayar : ".$data[0]->jlh_bayar."%0aStatus             : ".$data[0]->status."%0aDeadline         : ".date('d M Y',strtotime($data[0]->deadline))."%0aDibuat             : ".date('d M Y');
        
        
        $send="https://api.whatsapp.com/send?phone=62".$user[0]->no_hp."&text=$message";
        // Nexmo::message()->send([
        //     'to'=>'62'.$user[0]->no_hp,
        //     'from'=>'@leggetter',
        //     'text'=>"Nama                 : ".$user[0]->name."\nStatus Bayar    : ".$data[0]->status."\nID Bayar             : ".$data[0]->id_bayar."\nJumlah Bayar    : ".$data[0]->jlh_bayar."\nDeadline        : ".$data[0]->deadline."\nDibuat Pada     : ".date('d M Y')
        // ]);
        // dd("Success");
        // $basic  = new \Vonage\Client\Credentials\Basic("86b9132e", "Gi3ZafDzRizbIj4r");
        // $client = new \Vonage\Client($basic);
        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS('087778881849', '085228141227', 'A text message sent using the Nexmo SMS API')
        // );
        
        // $message = $response->current();
        
        // if ($message->getStatus() == 0) {
        //     echo "The message was sent successfully\n";
        // } else {
        //     echo "The message failed with status: " . $message->getStatus() . "\n";
        // }
        // $json=[
        //     'token'=> 'f7f85925320bea5c18e0002bc279aa41',
        //     'source'=> 6287778881849,
        //     'destination'=> 6285228141227,
        //     'type'=> 'text',
        //     'body'=> [
        //       'text'=> 'Hello wordl!'
        //     ]
        // ];
        
        // $client=new GuzzleHttp\Client();
        // $res=$client->request('POST','http://waping.es/api/send',[
        //     'headers'=>['Content-Type'=>'application/json'],
        //     'json'=>$json

        // ]);
        
        
        Mail::to($user[0]->email)->send(new ReminderMail($data,$user,$bulan,$condition));
        return redirect()->to($send);
    }
    public function konfirmasi($id){
        $bayar=Bayar::where('id_bayar','=',$id)->get();
        $bulan=Bulan::where('id_bulan','=',$bayar[0]->id_bulan)->get();
        $user=User::where('id_user','=',$bayar[0]->id_user)->get();
        $condition=true;
        $insertpendapatan=Pendapatan::create([
            'jumlah'=>$bayar[0]->jlh_bayar,
            'id_tahun'=>$bayar[0]->id_tahun,
            'id_bulan'=>$bayar[0]->id_bulan
        ]);
        $updatebayar=Bayar::where('id_bayar','=',$id)
        ->update([
            'tanggal_bayar'=>date('Y-m-d'),
            'status'=>'Lunas'
        ]);
        $data=Bayar::where('id_bayar','=',$id)->get();
        
        Mail::to($user[0]->email)->send(new ReminderMail($data,$user,$bulan,$condition));
        if($insertpendapatan){
            if($updatebayar){
                session()->flash('sukses','Konfirmasi Sudah Sukses');
            }
        }
    }
}