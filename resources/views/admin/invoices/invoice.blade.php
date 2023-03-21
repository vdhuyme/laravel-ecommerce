<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Order Invoice</title>

    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 13px;
        }

        .container {
            max-width: 680px;
            margin: 0 auto;
        }

        .column-title {
            background: #eee;
            text-transform: uppercase;
            padding: 15px 5px 15px 15px;
            font-size: 11px
        }

        .column-detail {
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .column-header {
            background: #eee;
            text-transform: uppercase;
            padding: 15px;
            font-size: 11px;
            border-right: 1px solid #eee;
        }

        .row {
            padding: 7px 14px;
            border-left: 1px solid #eee;
            border-right: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .alert {
            background: #f8d7da;
            padding: 20px;
            margin: 20px 0;
            line-height: 22px;
            color: #333
        }

        .socialmedia {
            background: #ffff;
            padding: 20px;
            display: inline-block
        }
    </style>
</head>

<body>
    <div class="container">

        <table width="100%">
            <tr>
                <td width="300px">
                    <div
                        style="background: #ffffff;border-left: 15px solid #fff;font-size: 26px;font-weight: bold;letter-spacing: -1px;height: 73px;line-height: 75px;">
                        <p>VFRUITS</p>
                    </div>
                </td>
                <td>
                    <p>Email: huyb1909921@student.ctu.edu.vn</p>
                    <p>Phone: 0962 785 101</p>
                </td>
            </tr>
        </table>
        <table width="100%" style="border-collapse: collapse;">
            <tr>
                <td widdth="50%" style="background:#eee;padding:20px;">
                    <strong>Date:</strong> {{$order->created_at->format('d')}}-{{$order->created_at->format('m')}},
                    {{$order->created_at->format('Y')}} {{$order->created_at->format('g:i A')}}<br>
                    <strong>Payment:</strong>
                    @if ($order->paymentMode === "cod")
                    COD
                    @else
                    Paypal
                    @endif<br>
                    <strong>Status: </strong>@if ($order->status === "pending")
                    Pending
                    @elseif($order->status === "accepted")
                    Accepted
                    @elseif($order->status === "inDelivery")
                    In Delivery
                    @elseif($order->status === "success")
                    Success
                    @elseif($order->status === "cancel")
                    Cancel
                    @elseif($order->status === "refund")
                    Refund
                    @endif<br>
                </td>
                <td style="background:#eee;padding:20px;">
                    <strong>Tracking No:</strong> #{{$order->trackingNumber}}<br>
                    <strong>Receiver:</strong> {{$order->userEmail}}<br>
                    <strong>Phone:</strong> {{$order->phoneNumber}}<br>
                </td>
            </tr>
        </table><br>
        <table width="100%">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td style="vertical-align: text-top;">
                                <div
                                    style="background: url(https://cdn0.iconfinder.com/data/icons/commerce-line-1/512/comerce_delivery_shop_business-07-128.png);width: 50px;height: 50px;margin-right: 10px;background-position: center;background-size: 42px;">
                                </div>
                            </td>
                            <td>
                                <strong>From</strong><br>
                                VFruits<br>
                                Quan Ninh Kieu, TP Can Tho<br>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td style="vertical-align: text-top;">
                                <div
                                    style="background: url(https://cdn4.iconfinder.com/data/icons/app-custom-ui-1/48/Check_circle-128.png) no-repeat;width: 50px;height: 50px;margin-right: 10px;background-position: center;background-size: 25px;">
                                </div>
                            </td>
                            <td>
                                <strong>To</strong><br>
                                {{$order->userName}}<br>
                                {{$order->shippingAddress}}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table><br>
        <h3>Details</h3>

        <table width="100%" style="border-collapse: collapse;border-bottom:1px solid #eee;">
            <tr>
                <td width="10%" class="column-header">#</td>
                <td width="40%" class="column-header">Product Name</td>
                <td width="20%" class="column-header">Perchase Price</td>
                <td width="10%" class="column-header">Quantity</td>
                <td width="20%" class="column-header">Total</td>
            </tr>
            @foreach ($orderProducts as $key => $product)
            <tr>
                <td class="row">{{$key+1}}</td>
                <td class="row">{{$product->products->productName}}</td>
                <td class="row">{{number_format($product->purchasePrice, 0, '.',
                    '.')}} VNĐ </td>
                <td class="row">{{$product->quantity}}</td>
                <td class="row">{{number_format($product->purchasePrice*$product->quantity, 0,
                    '.',
                    '.')}} VNĐ</td>
            </tr>
            @endforeach
        </table><br>
        <table width="100%" style="background:#eee;padding:100px;padding-top:10px">
            <tr>
                <td>
                    <table width="300px" style="float:right">
                        <tr>
                            <td><strong>Sub-total:</strong></td>
                            <td style="text-align:right">{{number_format($order->total-35000, 0, '.',
                                '.')}} VNĐ</td>
                        </tr>
                        <tr>
                            <td><strong>Shipping fee:</strong></td>
                            <td style="text-align:right">35.000 VNĐ</td>
                        </tr>
                        <tr>
                            <td><strong>Grand total:</strong></td>
                            <td style="text-align:right">{{number_format($order->total, 0, '.',
                                '.')}} VNĐ</td>
                        </tr>
                        @if ($order->paymentMode === "paypal")
                        <tr>
                            <td><strong>Payment With Paypal:</strong></td>
                            <td style="text-align:right">${{number_format(($order->total)/23000, 2, '.',
                                '')}}</td>
                        </tr>
                        @endif
                    </table>
                </td>
            </tr>
        </table>
        <div>
            @if ($order->note !== null)
            <div class="alert">Notes: {{$order->note}}</div>
            @else
            <div class="alert">Notes: No notes from customers</div>
            @endif
            <div class="socialmedia">Follow us online <small>www.vfruits.com</small></div>
        </div>
    </div><!-- container -->
</body>

</html>