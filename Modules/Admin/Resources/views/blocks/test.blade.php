<tr style="line-height: 0.3rem;background-color: #F2F2F2;border-left: 1px solid #c8ced3;border-right: 1px solid #c8ced3;"
    class="tr-append">
    <th style="line-height:50px;border: 1px solid #c8ced3;" rowspan="2">STT</th>
    <th style="line-height:50px;border: 1px solid #c8ced3;" rowspan="2" class="text-center">Ô tô / Danh mục</th>
    <th style="line-height:50px;border: 1px solid #c8ced3;" rowspan="2" class="text-center">Nội dung</th>
    <th style="line-height:50px;border: 1px solid #c8ced3;" rowspan="2" class="text-center">Trạng thái</th>
    <th style="border: 1px solid #c8ced3;" class="text-center"  rowspan="2">Thời gian xem xe</th>
    {{-- <th style="line-height:50px;border: 1px solid #c8ced3;position: relative" rowspan="2" class="text-center">Thao
        Tác <span
            style="z-index: 99999;position: absolute;top: -8px;width: 20px;height: 20px;border-radius: 50%;background: red;line-height: 20px;color: white;"
            class="close--tr">x</span></th> --}}

</tr>
<tr class="tr-append">
    <th style="line-height: 1px;background: #F2F2F2" class="text-center"> Ip Tạo </th>
</tr>

@if ($orders)
    @foreach ($orders as $order)
        <tr class="tr-append" style="border: 1px solid #dedede;">
            <td align="center" style="border-left: 1px solid #c8ced3;">{{ $order->id }}</td>
            <td align="center" style="border-left: 1px solid #c8ced3;">
                @php
                    $product = isset($order->product) ? $order->product->pro_name : 'N\A';
                    $menu = isset($order->menu) ? $order->menu->m_title : 'N\A';
                @endphp
                <a target="_blank"
                    href="{{ route('get.product.detail', [str_slug_fix($product), $order->o_product_id]) }}">{{ $product }}</a>
                <a target="_blank">{{ $menu }}</a>

            </td>
            <td align="center" style="border-left: 1px solid #c8ced3;">
                {{ $order->o_messages ? $order->o_messages : 'N\A' }}</td>
            <td align="center" style="border-left: 1px solid #c8ced3;">
                    {{$status[ $order->o_status]}}
            </td>

            <td align="center" style="border-left: 1px solid #c8ced3;">
                {{ $order->car_viewing_day }}<br>{{ $order->o_ip }}</td>
        
        </tr>
    @endforeach
@endif
