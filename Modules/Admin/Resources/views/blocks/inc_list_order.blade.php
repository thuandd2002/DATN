<tr style="line-height: 0.3rem;background-color: #F2F2F2;border-left: 1px solid #c8ced3;border-right: 1px solid #c8ced3;"
    class="tr-append">
    <th style="line-height:50px;border: 1px solid #c8ced3; text-align: center;" rowspan="2">STT</th>
    <th style="line-height:50px;border: 1px solid #c8ced3; min-width: 200px;" rowspan="2" class="text-center">Tên xe / Danh mục</th>
    <th style="line-height:50px;border: 1px solid #c8ced3; min-width: 200px;" rowspan="2" class="text-center">Nội dung</th>
    <th style="line-height:50px;border: 1px solid #c8ced3;" rowspan="2" class="text-center">Trạng thái</th>
    <th style="line-height:50px;border: 1px solid #c8ced3; min-width: 200px;" rowspan="2" class="text-center">Thời gian xem xe</th>

</tr>
<tr class="tr-append">
    <th style="line-height: 1px;background: #F2F2F2" class="text-center"> </th>
</tr>

@if ($orders)
    @foreach ($orders as $order)
        <tr class="tr-append" style="border: 1px solid #dedede;">
            <td align="center" style="border-left: 1px solid #c8ced3;">{{ $order->id }}</td>
            <td align="center" style="border-left: 1px solid #c8ced3; min-width: 200px;">
                @php
                    $product = isset($order->product) ? $order->product->pro_name : 'N\A';
                    $menu = isset($order->menu) ? $order->menu->m_title : 'N\A';
                @endphp
                <a target="_blank"
                    href="{{ route('get.product.detail', [str_slug_fix($product), $order->o_product_id]) }} ">{{ $product }}</a>
                <a target="_blank">{{ $menu }}</a>

            </td>
            <td align="center" style="border-left: 1px solid #c8ced3;min-width: 200px; ">
                {{ $order->o_messages ? $order->o_messages : 'N\A' }}</td>
            <td align="center" style="border-left: 1px solid #c8ced3; color:red; min-width: 200px;">
                    {{$status[ $order->o_status]}}
            </td>

            <td align="center" style="border-left: 1px solid #c8ced3; color: green min-width: 200px;" >
                {{ $order->car_viewing_day }}
        
        </tr>
    @endforeach
@endif


