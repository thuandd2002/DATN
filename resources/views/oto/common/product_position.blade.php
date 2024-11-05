<style>
    @media screen and (max-width: 991px){
        .gia-xe-menu{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        .content-bv-h2{
            height: 20px;
        }
    }
    @media screen and (max-width: 767px){
        .gia-xe-menu{
            display: block;
           
        }
    }
    @media screen and (max-width: 527px){
        .content-bv-h2{
            height: 35px;
        }
        .content-text{
            font-size: 10px;
        }
    }
    @media screen and (max-width: 375px){
        /* .content-bv-h2{
            height: 35px;
        } */
        .content-text{
            font-size: 12px !important;
        }
    }

</style>


<div class="widget-sub">
<span style="font-size: 16px;padding-bottom: 10px;text-transform: uppercase;font-weight: bold;padding-left: 25px;">Ô tô nổi bật</span>
    <div class="gia-xe-menu">

        @if (isset($products))
           
            @foreach($products as $product)
                
                @php
                    $image = 'images/placeholder.png';

                    if (isset($product->images))
                    { 
     
                        $list_image_product = $product->images->toArray();
                        $image =  $product->pro_avatar ? pare_url_file($product->pro_avatar) : asset('images/placeholder.png'); 

                    }
                       $product_slug_po = $product->pro_slug ? $product->pro_slug : str_slug_fix($product->pro_name);
                @endphp

                <div class="text-center product-possion-item" style="box-shadow: 0 5px 20px rgba(0,0,0,.05);margin-bottom: 20px;padding: 10px 0">
                    <a href="{{ route('get.product.detail',[$product_slug_po,$product->id]) }}" style="display: flex;justify-content: center" class="clearfix" title="{{ $product->pro_name }}">
                        <img src="{{ asset('images/preloader.gif') }}" data-src="{{ $image }}" alt="{{ $product->pro_name }}" class="img lazy" style="width: 80%;height: 180px;display: block">
                    </a>
                    <h2 class="content-bv-h2" ><a href="{{ route('get.product.detail',[$product_slug_po,$product->id]) }}" title="{{ $product->pro_name }}"  style="font-size: 14px;text-transform: capitalize;color: #333;font-weight: 500" class="content-text">{{ $product->pro_name }}</a> -    @if ($product->numbers_of_cars_left === 0)
                        <span class="badge badge-danger" style="background: red;">Hết hàng</span>
                        @else
                        <span class="badge badge-success" style="background: green;">Còn hàng</span>
                        @endif</h2>
                    <p style="font-size: 14px;color: #FF0000">{{ number_format($product->pro_price,0,',','.') }} VNĐ</p>
                </div>
            @endforeach
        @endif
    </div>
</div>