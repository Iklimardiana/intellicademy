@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row gap-4">
            <h1 class="mt-4">Checkout</h1>
                <div class="card col-12 col-md-5 col-lg-3 pt-2">
                    {{-- {{ dd($transaction->Course) }} --}}
                    @if($transaction->Course->thumbnail == null)
                        <img src="{{asset('/images/landingpage.png')}}" class="card-img-top" alt="course image">
                    @else
                        <img src="{{asset('/images/'. $transaction->Course->thumbnail)}}" class="card-img-top" alt="course image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$transaction->Course->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{$transaction->Course->price}}</h6>
                        <p class="card-text">{{$transaction->Course->description}}</p>
                        <button class="btn btn-primary" id="pay-button">Pay!</button>
                    </div>
                </div>
        </div>

    </div>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
          window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
              /* You may add your own implementation here */
              // alert("payment success!"); 
              window.location.href = '/student/transaction'
              console.log(result);
            },
            onPending: function(result){
              /* You may add your own implementation here */
              alert("wating your payment!"); console.log(result);
            },
            onError: function(result){
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
            },
            onClose: function(){
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          })
        });
      </script>
@endsection