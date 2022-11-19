@extends('layouts.main')


@section('content')<div class="container">
    <div id="success" style="display:none" class="col-md-8 text-center h3 p-4 bg-success text-light rounded">تمت عملية الشراء بنجاح</div>
    @if(session('message'))
        <div class="col-md-8 text-center h3 p-4 bg-success text-light rounded">تمت عملية الشراء بنجاح </div>
    @endif
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">عربه التسوق</div>
            <div class="card-body">
                @if ($items->count())
                <table class="table">

                    <thead class="thead-light">
                        <th scope='col'>العـــنوان</th>
                        <th scope='col'>الــسعر</th>
                        <th scope='col'>الكمـــية</th>
                        <th scope='col'>الســعر الكلى</th>
                        <th scope='col'>خيارات</th>
                    </thead>
                    @php($totalprice = 0)
                    @foreach ($items as $item)
                    @php($totalprice += $item->price * $item->pivot->number_of_copies)
                    <tbody>
                        <tr>
                            <td scope='row'>{{ $item->title }}</td>
                            <td>{{ $item->price }} $</td>
                            <td>{{ $item->pivot->number_of_copies }} </td>
                            <td>{{ $item->price * $item->pivot->number_of_copies }} $</td>
                            <td>
                                <form action="{{ route('cart.remove_all' , $item->id) }}" style="float:left; margin: auto 5px" method="post">
                                    @csrf
                                    <button class="btn btn-outline-danger btn-sm" type="submit">أزل الكل</button>
                                </form>

                                <form action="{{ route('cart.remove_one' , $item->id) }}" s style="float:left; margin: auto 5px" method="post">
                                    @csrf
                                    <button class="btn btn-outline-warning btn-sm" type="submit">أزاله كتاب واحد</button>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                    @endforeach
                </table>
                <h4 class="mb-5">المجموع النهائى : {{ $totalprice }} $</h4>
                <div class="d-inline-block" id="paypal-button-container"></div>
                <a href="{{ route('credit.checkout') }}" class="d-inline-block mb-4 float-start btn bg-cart" style="text_decoration:none">
                <span>بطاقة ائتمانية</span>
                <i class="fas fa-credit-card"></i>
                </a>
                @else
                <div class="text-center alert-info">
                    لا يوجد كتب في العربه
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>



@endsection

@section('script')

    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AQRWbMAWt343SepNyor-YpDs4my0osewxk53gEf13osU9YwHSJk7Pqxd_Wy1vH-zICZtOrYS3Dz6jF4R&currency=USD"></script>

    <script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            return fetch('/api/paypal/create-payment', {
                method: 'POST',
                body:JSON.stringify({
                    'userId' : "{{auth()->user()->id}}",
                })
            }).then(function(res) {
                return res.json();
            }).then(function(orderData) {
                return orderData.id;
            });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return fetch('/api/paypal/execute-payment' , {
                method: 'POST',
                body :JSON.stringify({
                    orderId : data.orderID,
                    userId: "{{ auth()->user()->id }}",
                })
            }).then(function(res) {
                return res.json();
            }).then(function(orderData) {
                $('#success').slideDown(200);
                $('.card-body').slideUp(0);
            });
        }
      }).render('#paypal-button-container');
    </script>

@endsection
