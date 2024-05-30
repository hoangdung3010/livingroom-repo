
@php
    $unit="đ";
@endphp
<div class="cart-wrapper">
    <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th class="hinhanh_img">Hình ảnh sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá bán</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
            @foreach($data as $cartItem)
            <tr class="cart-item">
                <td class="cart-image" data-title="Hình ảnh:">
                   <div class="image">
                    <img src="{{ asset($cartItem['product_img']) }}" alt="{{ $cartItem['name'] }}" >
                    @if ($cartItem['sale'])
                    <span class="badge badge-pill badge-danger position-absolute sale-cart">{{ $cartItem['sale']}}%</span>
                    @endif
                   </div>
                </td>
                <td class="cart-name" data-title="Tên sản phẩm:"><span>{{ $cartItem['name'] }} {{ isset($cartItem['size'])?'('.$cartItem['size'].')':'' }}</span></td>
                <td class="cart-quantity" data-title="Số lượng:">
                    <div class="quantity-cart">
                        <div class="box-quantity text-center">
                            <span class="prev-cart">-</span>
                            <input class="number-cart" data-url="{{ route('cart.update',[
                                'id'=> $cartItem['id'],
                                'option'=>$cartItem['option_id'],
                                ]) }}" value="{{ $cartItem['quantity']}}" type="number" id="" name="quantity" disabled="disabled">
                            <span class="next-cart">+</span>
                        </div>
                    </div>
                </td>
                <td class="cart-price" data-title="Giá bán:">
                    <div class="box-price">
                        <span class="new-price-cart">{{ number_format($cartItem['totalPriceOneItem']) }} {{ $unit }}</span>
                        @if ($cartItem['sale'])
                        <span class="old-price-cart">{{ number_format($cartItem['totalOldPriceOneItem']) }}  {{ $unit }}</span>
                        @endif
                    </div>
                </td>
                <td class="cart-action" data-title="Xóa:">
                    <a data-url="{{ route('cart.remove',[
                        'id'=> $cartItem['id'],
                        'option'=>$cartItem['option_id'],
                        ]) }}" class="remove-cart"><i class="fas fa-times-circle"></i></a>
                </td>
            </tr>
            @endforeach
            <tr>
              <td colspan="5">
                <div class="d-flex justify-content-end align-item-center pt-1 pb-1">
                    <a data-url="{{ route('cart.clear') }}" class="clear-cart btn btn-danger">Xóa tất cả</a>
                </div>
              </td>
            </tr>
        </tbody>
        <tfoot>
            <tr style="border: unset;">
                <td colspan="5" style="border: unset;">
                    <div class="wrap-area">
                        <a href="{{ route('home.index') }}" class="buy-more btn btn-light">Tiếp tục mua hàng</a>
                        <div class="area-total">
                            <div class="total d-flex align-items-center justify-content-between">
                                <span class="name">Tổng tiền:</span>
                                <span class="total-price">{{ number_format($totalPrice) }} {{ $unit }}</span>
                            </div>
                            @isset($totalOldPrice)
                            @if ($totalPrice!=$totalOldPrice)
                            <div class="total-provisional d-flex align-item-center justify-content-end">
                                <span class="total-provisional-price">{{ number_format($totalOldPrice )}} {{ $unit }}</span>
                            </div>
                            @endif
                            @endisset
                            <div class="total-provisional d-flex align-item-center justify-content-end">
                                <span class="name">Tổng <strong>{{ $totalQuantity }}</strong> sản phẩm</span>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>


</div>
