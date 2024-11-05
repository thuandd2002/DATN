<div class="modal fade" id="myModal--preview">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="card-header pb-0">
                    <h6 class="text-center p-3">Xe ô tô khách hàng  đã từng đặt lịch xem xe</h6>
                    </div>
                <div class="table-responsive p-0">
                    <table class=" table table-striped table table align-items-center justify-content-center mb-0">
                        <thead>
                          <tr class="text-center">
                            <th scope="col" class="">Ô tô / Danh mục</th>
                            <th scope="col" class="">Nội dung</th>
                            <th scope="col" class="">Trạng thái</th>
                            <th scope="col" class="">Thời gian xem xe</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if ($orders)
                                @foreach ($orders as $order)   
                                @php
                                $product = isset($order->product) ? $order->product->pro_name : 'N\A';
                                $menu = isset($order->menu) ? ' - '.$order->menu->m_title : '';
                                @endphp
                                    <tr class="text-center">
                                        <th>   <a target="_blank"
                                            href="{{ route('get.product.detail', [str_slug_fix($product), $order->o_product_id]) }}">{{ $product }}</a>
                                        <a target="_blank">{{ $menu }}</a></th>
                                        <td>   {{ $order->o_messages ? $order->o_messages : 'N\A' }}</td></td>
                                        <td>{{$status[ $order->o_status]}}</td>
                                        <td>     {{ $order->car_viewing_day }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        
        
                        </tbody>
                      </table>
                </div>

            </div>
          

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>