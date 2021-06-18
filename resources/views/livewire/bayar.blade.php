<div class="main-panel" id="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <div class="navbar-toggle">
            <button type="button" class="navbar-toggler">
              <span class="navbar-toggler-bar bar1"></span>
              <span class="navbar-toggler-bar bar2"></span>
              <span class="navbar-toggler-bar bar3"></span>
            </button>
          </div>
          <a class="navbar-brand" href="#pablo">Table List</a>
        </div>
        
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Bayar</h4>
            </div>
            <div class="card-body">
                @foreach ($bayar as $bayars)
                @if($bayars->status=="Belum Bayar")
                <button  class="col-md-12 btn btn-md btn-primary" id="pay-button">Bayar</button>
                @else

                <div class="table-responsive">
                    <table class="table">
                      <tr><td>VA</td><td>{{$va}}</td></tr>
                      <tr><td>Order ID</td><td>{{$order_id}}</td></tr>
                      <tr><td>Transaksi ID</td><td>{{$trx_id}}</td></tr>
                      <tr><td>BANK</td><td>{{$bank}}</td></tr>
                      @if ($status=="settlement")
                        
                      @else
                        <tr><td>Deadline Bayar</td><td><span id="demo"></span></td></tr>
                      @endif
                      
                      <tr><td>Waktu Transaksi</td><td>{{date('d M Y h:i:s',strtotime($waktu))}}</td></tr>
                      <tr><td>Waktu Bayar</td><td>@if($status=="settlement"){{date('d M Y h:i:s',strtotime($waktu_bayar))}}@else --- @endif</td></tr>
                      <tr><td> Status</td><td> @if($status=="settlement")<span class="badge badge-success">Pesanan Sudah Dibayar</span>@else<span class="badge badge-danger">Pesanan Belum Dibayar</span>@endif</td></tr>
                     </table>
                  </div>
                  
                @endif
                @endforeach
              <form id="payment-form" action="Payment" method="get">
                <input type="hidden" name="result" value="" id="resultdata">
                
              </form>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <script type="text/javascript"
  src="https://app.sandbox.midtrans.com/snap/snap.js"
  data-client-key="SB-Mid-client-wpQR9-_zpDmYdMrM"></script>
<script type="text/javascript">
  var payButton = document.getElementById('pay-button');
  // For example trigger on button clicked, or any time you need
  payButton.addEventListener('click', function () {
    var resultData=document.getElementById("resultdata");
    function changeResult(type,data){
      $("#resultdata").val(JSON.stringify(data));
    }
    snap.pay('{{$token}}',{
      onSuccess:function(result){
        changeResult('success',result);
        $("#payment-form").submit();
      },
      onPending:function(result){
        changeResult('pending',result);
        $("#payment-form").submit();
      }
    }); // Replace it with your transaction token
  });
  
</script>
<script>
  var countDownDate = new Date("{{$dl}}").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
    
  }
}, 1000);
</script>
