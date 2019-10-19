@extends('front-end.master')

@section('body')
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Add To Cart</span></h3>
        </div>
    </div>

    <!--content-->
    <div class="content">
        <div class="single-wl3">
            <div class="container">
                <div class="row">
                    <div class="col-md-11 col-md-offset-1">
                        <table class="table table-bordered">
                            <h3 class="text-center text-success">My Shopping Cart</h3>
                            <hr/>
                            <tr class="bg-primary text-center">
                                <th>SL No</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                            @php($i = 1)
                            @php($sum = 0)
                            @foreach($cartProducts as $cartProduct)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $cartProduct->name }}</td>
                                <td>
                                    <img src="{{ asset($cartProduct->options->image) }}" height="80" width="60">
                                </td>
                                <td>{{ $cartProduct->price }}</td>
                                <td>
                                    <form action="{{ route('update-cart') }}" method="post">
                                        @csrf
                                        <input type="number" name="qty" value="{{ $cartProduct->qty }}">
                                        <input type="hidden" name="rowId" value="{{ $cartProduct->rowId }}">
                                        <input type="submit" name="btn" value="Update">
                                    </form>
                                </td>
                                <td>TK.{{ $total = $cartProduct->qty* $cartProduct->price }}.00</td>
                                <td>
                                    <a href="{{ route('delete-cart', $cartProduct->rowId) }}" class="btn btn-danger
                                    btn-xs" title="delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                                <?php $sum = $sum + $total; ?>
                                @endforeach
                        </table>
                        <hr/>
                        <table class="table table-bordered">
                            <tr>
                                <th>Item Total (TK. ) </th>
                                <td>{{ $sum }}.00</td>
                            </tr>

                            <tr>
                                <th>Vat Total (TK. ) </th>
                                <td>{{ $vat = 0 }}.00</td>
                            </tr>
                            <tr>
                                <th>Grand Total (TK. ) </th>
                                <td>{{ $orderTotal= $sum + $vat }}.00</td>
                                <?php
                                    Session::put('orderTotal', $orderTotal)
                                ?>
                            </tr>
                        </table>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-11 col-md-offset-1">
                        @if(Session::get('customerId') && (Session::get('shippingID')))
                        <a href="{{ route('checkout-payment') }}" class="btn btn-success pull-right">Check Out</a>
                        @elseif(Session::get('customerId'))
                            <a href="{{ route('checkout-shipping') }}" class="btn btn-success pull-right">Check Out</a>
                        @else
                            <a href="{{ route('checkout') }}" class="btn btn-success pull-right">Check Out</a>
                          @endif
                        <a href="" class="btn btn-success">Continue Shopping</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
