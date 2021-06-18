<?php

namespace App\Http\Livewire;

use App\Models\Bayar;
use App\Models\Bulan;
use App\Models\Tahun;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;

class InputTagihanAdmin extends Component
{
    public function input(){
        
        $tahun=Tahun::where('tahun','=',date('Y'))->get();
        $bulan1=Bulan::where('bulan','=',date('M'))->get();
        $id_tahun=Str::random(12);
        if ($tahun->isEmpty()){
            
            $intahun=Tahun::create([
                'id_tahun'=>$id_tahun,
                'tahun'=>date('Y')
            ]);
            
            if($intahun){
                $id_bulan=Str::random(9);
                $bulan=Bulan::create([
                    'id_bulan'=> $id_bulan,
                    'id_tahun'=>$id_tahun,
                    'bulan'=>date('M')
                ]);
                if($bulan){
                    $user=User::all();
                    foreach($user as $users){
                        $id_bayar=Str::random(8);
                        if($users['role']==2){
                            $create=$users->created_at;
                            $tanggal=new Carbon($create);
                            $deadline=$tanggal->addDays(30);
                            $bayar=Bayar::create([
                                'id_user'=> $users->id_user,
                                'id_bulan'=>$id_bulan,
                                'id_tahun'=>$id_tahun,
                                'id_bayar'=>$id_bayar,
                                'deadline'=>$deadline,
                                'awal'=>date('Y-m-d'),
                                'jlh_bayar'=> 450000,
                                'status'=> 'Belum Lunas'
                            ]);
                            $user=User::where('id_user','=',$users->id_user)->update([
                                'created_at'=>$deadline
                            ]);
                        }
                    }
                    if($bayar){
                        if($user){
                            return redirect('/input');
                        }
                    }
                }
            }
        }else{
            $id_bulan=Str::random(9);
            
            if(!$bulan1->isEmpty()){
                return redirect('/input')->with('ada','Bulan Sudah Ada');
            }else{
                $bulan=Bulan::create([
                    'id_bulan'=> $id_bulan,
                    'id_tahun'=>$tahun[0]->id_tahun,
                    'bulan'=>date('M')
                ]);
                if($bulan){
                    $user=User::all();
                    foreach($user as $users){
                        $id_bayar=Str::random(8);
                        if($users['role']==2){
                            $create=$users->created_at;
                            $tanggal=new Carbon($create);
                            $deadline=$tanggal->addDays(30);
                            
                            $bayar=Bayar::create([
                                'id_user'=> $users->id_user,
                                'id_bulan'=>$id_bulan,
                                'id_tahun'=>$tahun[0]->id_tahun,
                                'id_bayar'=>$id_bayar,
                                'deadline'=>$deadline,
                                'awal'=>date('Y-m-d'),
                                'jlh_bayar'=> 450000,
                                'status'=> 'Belum Bayar'
                            ]);
                            $user=User::where('id_user','=',$users->id_user)->update([
                                'created_at'=>$deadline
                            ]);
                        }
                    }
                    if($bayar){
                        if($user){
                            return redirect('/input');
                        }
                    }
                }
            }
        }
    }
    public function render()
    {
        return view('livewire.input-tagihan-admin')->extends('layouts.app')->section('content');;
    }
}
