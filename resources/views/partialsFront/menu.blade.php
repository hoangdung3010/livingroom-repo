<!-- tạo Menu dạng cây với các menu chính và các mục con của chúng.  -->
<!-- Các mục con chỉ được hiển thị nếu chúng tồn tại và không vượt quá giới hạn được đặt bởi biến $limit -->

@php
   $i=1;
   if (!isset($limit)) {
     $limit=99;
   }

@endphp


  {{-- <ul class="nav-main"> --}}
    @foreach ($data as $value)

        <li class="nav-item @if ($loop->first&&$active) active @endif">
            <a href="{{ $value['slug_full'] }}"><span>{!!  $value['name']  !!}</span>
                @isset($value['childs'])
                @if (count($value['childs'])>0&&$limit>=$i+1)
                {!!  $icon_d??""  !!}
                @endif
                @endisset
            </a>
            @isset($value['childs'])
                @if (count($value['childs'])>0&&$limit>=$i+1)
                    <ul class="nav-sub">
                        @foreach ($value['childs'] as $childValue)
                            @include('partialsFront.menu-child', ['childs' => $childValue])
                        @endforeach
                    </ul>
                @endif
            @endisset
        </li>
    @endforeach
{{-- </ul> --}}




