@component('mail::message')
# Email Pemberitahuan

Kepada yang bersangkutan, @if($con) Selamat Pembayaran Sudah Selesai @else silahkan untuk melakukan pembayaran kost untuk bulan {{$bulan[0]->bulan}} @endif 

@component('mail::table')
|       |         | 
| ------------- |:-------------:| 
| Nama    | {{$user[0]->name}}     | 
| ID Bayar      | {{$data[0]->id_bayar}} | 
| Jumlah Bayar      | @currency($data[0]->jlh_bayar) |
| Status    |   {{$data[0]->status}}|
| Deadline     | <?php $date=date('d M Y',strtotime($data[0]->deadline));echo $date?> |
| Dibuat      | {{date('d M Y')}} |
@endcomponent

Thanks,<br>
@endcomponent

