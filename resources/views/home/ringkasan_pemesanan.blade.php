@extends('home.layout')

@section('title')
<title>Wedding Planner | Login</title>
@endsection

@section('content')

    
        <div class="container">
            <ul class="breadcrumb">
            </ul>
            <h1 class="page-title text-center">Detail Pemesanan</h1>
            <div class="shopping-cart">
            <div class="table-responsive">
                <table class="table cart-table">
                    <thead>
                        <tr>
                            <th class="h-product-name">Product name</th>
                            <th class="h-product-price">Price</th>
                            <th class="h-quantity">Quantity</th>
                            <th class="h-product-subtotal">Total</th>
                            <th class="h-product-delete">Del</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="item_cart">
                            <td class="produc-name">
                                <div class="product-img">
                                    <img src="/asset/img/products/pd_3.jpg" alt="Futurelife">
                                </div>
                                <div class="product-info">
                                    <a href="#" title="">Beaded Flower Headband</a>
                                    <p class="cart-product-desc">
                                        sunt in culpa qui officia deserunt mollit anim id est laborum..
                                    </p>
                                </div>
                            </td>
                            <td class="total-price">
                                <p class="price">$145.00</p>
                            </td>
                            <td class="bcart-quantity">
                                <div class="vow-quantity">
                                    <button class="dropdown-toggle v-show" type="button" data-toggle="dropdown" aria-expanded="true">01
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>01</li>
                                        <li>02</li>
                                        <li>03</li>
                                        <li>04</li>
                                        <li>05</li>
                                    </ul>
                                </div>
                            </td>
                            <td class="total-price v2">
                                <p class="price">$145.00</p>
                            </td>
                            <td class="bcart-remove">
                                <a href="#" class="btn-remove"><i class="ion-ios-close-outline f-24"></i></a>
                            </td>
                        </tr>
                        <tr class="item_cart">
                            <td class="produc-name">
                                <div class="product-img">
                                    <img src="/asset/img/products/pd_1.jpg" alt="Futurelife">
                                </div>
                                <div class="product-info">
                                    <a href="#" title="">Brid in the Cage 299pln</a>
                                    <p class="cart-product-desc">
                                        sunt in culpa qui officia deserunt mollit anim id est laborum..
                                    </p>
                                </div>
                            </td>
                            <td class="total-price">
                                <p class="price">$85.00</p>
                            </td>
                            <td class="bcart-quantity">
                                <div class="vow-quantity">
                                    <button class="dropdown-toggle v-show" type="button" data-toggle="dropdown" aria-expanded="true">02
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>01</li>
                                        <li>02</li>
                                        <li>03</li>
                                        <li>04</li>
                                        <li>05</li>
                                    </ul>
                                </div>
                            </td>
                            <td class="total-price v2">
                                <p class="price">$170.00</p>
                            </td>
                            <td class="bcart-remove">
                                <a href="#" class="btn-remove"><i class="ion-ios-close-outline f-24"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-cart-bottom">
                <div class="text-right">
                    <div class="text">
                        <span class="text-total">Total products:</span><span class="text-price">35.90 USD</span>
                    </div>
                    <div class="text">
                        <span class="text-total">Estimated shipping costs:</span><span class="text-price shipping">0.00 USD</span>
                    </div>
                    <div class="text v2">
                        <span class="text-total v2">Total:</span><span class="text-price v2">315.00 USD </span>
                    </div>
                    <span class="taxes">* Before taxes </span>
                </div>
            </div>
            <div class="cart-button-group">
                <a href="/pembayaran" class="cart-btn v2">Pembayaran</a>
                <div class="clearfix"></div>
            </div>
            </div>
        </div>

@endsection