<!-- Trong đoạn mã này, một biến $i được tăng lên sau mỗi lần lặp, 
và sau đó kiểm tra xem biến $limit có lớn hơn hoặc bằng $i không. 
Nếu điều kiện này được đáp ứng, một mục menu con mới sẽ được hiển thị. -->
@php
    $i++;
@endphp
@if ($limit>=$i)
<li class="">
    <a href="{{ $childs['slug_full'] }}"><span>{{ $childs['name'] }}</span>
        @isset($childs['childs'])
            @if (count($childs['childs'])>0&&$limit>=$i+1)
            {!! $icon_r??"" !!}
            @endif
        @endisset
    </a>
    @isset($childs['childs'])
        @if (count($childs['childs'])&&$limit>=$i+1)
            <ul class="nav-sub-c{{ $i }}">
                @foreach ($childs['childs'] as $childValue2)
                    @include('partialsFront.menu-child', ['childs' => $childValue2])
                @endforeach
            </ul>
        @endif
    @endisset
</li>
@endif


