<?php

namespace App\Http\Livewire;

use App\Models\Bayar as ModelsBayar;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Veritrans_Transaction;
use Midtrans\Config;
use Midtrans\Transaction;
use Midtrans\Notification;

class Bayar extends Component
{
    public $token;
    public $bayar;
    public $va;
    public $bank;
    public $waktu;
    public $order_id;
    public $trx_id;
    public $dl;
    public $status;
    public $id_bayar;
    public $waktu_bayar;
    public function mount($id){
            
            $this->bayar=ModelsBayar::where('id_bayar','=',$id)->get();
            
            
            if(isset($_GET['result'])){
                $order_id1=Str::random(20);
                $status=json_decode($_GET['result'],true);
                $order_id=$status['order_id'];
                $time=$status['transaction_time'];
                ModelsBayar::where('id_bayar','=',$order_id)->update([
                    'status'=>"Dalam Proses",
                    'id_bayar'=>$status['transaction_id'],
                    'tanggal_bayar'=>date('Y-m-d'),
                    'method'=>$status['payment_type'],
                    'dl_bayar'=>date('Y-m-d H:i:s',strtotime('+1 day',strtotime($time))),
                    'bank'=>$status['va_numbers'][0]['bank'],
                    'va'=>$status['va_numbers'][0]['va_number'],
                    'pdf'=>$status['pdf_url']
                ]);
                
                
                session()->flash('sudah', 'Task was successful!');
            }
            else{
                $this->bayar=ModelsBayar::where('id_bayar','=',$id)->get();
            }
            if(!$this->bayar->isEmpty()){
                if ($this->bayar[0]->status=="Belum Bayar"){
                    
                
                    \Midtrans\Config::$serverKey = 'SB-Mid-server-ZEJZWgdliopUKuEZFZvsYs8F';
                    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                    \Midtrans\Config::$isProduction = false;
                    // Set sanitization on (default)
                    \Midtrans\Config::$isSanitized = true;
                    // Set 3DS transaction for credit card to true
                    \Midtrans\Config::$is3ds = true;
                    
                    $params = array(
                        'transaction_details' => array(
                            'order_id' => $id,
                            'gross_amount' => $this->bayar[0]->jlh_bayar,
                        ),
                        'customer_details' => array(
                            'first_name' => 'Kepada',
                            'last_name' => Auth::user()->name,
                            'email' => Auth::user()->email,
                            'phone' => '08111222333',
                        ),
                    );
                    
                    $this->token = \Midtrans\Snap::getSnapToken($params); 
                }else if($this->bayar[0]->status=="Dalam Proses" || $this->bayar[0]->status=="settlement"){
                    // $status=Transaction::status($id);
                    // dd($status);
                    \Midtrans\Config::$serverKey = 'SB-Mid-server-ZEJZWgdliopUKuEZFZvsYs8F';
                    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                    \Midtrans\Config::$isProduction = false;
                    // Set sanitization on (default)
                    \Midtrans\Config::$isSanitized = true;
                    // Set 3DS transaction for credit card to true
                    \Midtrans\Config::$is3ds = true;
                    $notif = Transaction::status($id);
                    $notif=json_decode(json_encode($notif),true);
                    
                    $this->va=$notif['va_numbers'][0]['va_number'];
                    $this->bank=$notif['va_numbers'][0]['bank'];
                    $this->waktu=$notif['transaction_time'];
                    $this->order_id=$notif['order_id'];
                    $this->trx_id=$notif['transaction_id'];
                    $this->dl=date('d M Y h:i:s',strtotime('+1 day',strtotime($notif['transaction_time'])));
                    
                    if($notif['transaction_status']=="settlement"){
                        $this->waktu_bayar=$notif['settlement_time'];
                    }
                    $this->status=$notif['transaction_status'];
                    if($this->status=="settlement"){
                        ModelsBayar::where('id_bayar','=',$id)->update([
                            'status'=>$notif['transaction_status']
                        ]);
                    }
                    
                    return view('livewire.bayar')->extends('layouts.app')->section('content');
                }
                
            }
        
    }
    public function render()
    {
        return view('livewire.bayar')->extends('layouts.app')->section('content');
    }
}
