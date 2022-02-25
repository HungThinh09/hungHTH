<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ShopHth Thân gửi</title>
</head>

<body>

    <p>Thân gửi quý khách hàng: {{ $data->name }}</p>
    <small>Mã đơn hàng: <i>{{ $data->codeId }}</i></small>
    <table class="table" border="2px">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
             
                <th>Đơn giá (VNĐ)</th>
                <th>Số lượng</th>
                <th>Thành tiền (VNĐ)</th>

            </tr>
        </thead>
        <tbody>
            @php
                $quantity = $price = 0;
            @endphp
            @foreach ($data->carts as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->product->productName }}</td>
                    <td>{{ number_format($item->price) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price * $item->quantity) }}</td>
                </tr>
                @php
                    $quantity += $item->quantity;
                    $price += $item->price * $item->quantity;
                @endphp
            @endforeach

            <tr>
                <th colspan="3">Tổng số sản phẩm</th>
                <th colspan="2">{{ $quantity }}</th>
            </tr>
            <tr>
                <th colspan="4">Thành tiền</th>
                <th colspan="1">{{ $price }}</th>
             
            </tr>
        </tbody>
    </table>
</body>

</html>
