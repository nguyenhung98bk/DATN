@if(Auth::check())
    @if(Auth::user()->phanloai==2)
        @include("layouts/hocsinh")
    @elseif(Auth::user()->phanloai==1)
        @include("layouts/giaovien")
    @else
        @include("layouts/admin")
    @endif
@endif
