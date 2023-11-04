@if($listUser->count() > 0)
@foreach($listUser as $user)

    @if($type == 'followings')
    @php
        $user = $user->artist
        @endphp
    @else
    @php
        $user = $user->user
        @endphp
    @endif

<div class="card item-follow">
    <div class="item-follow-avatar">
        <div class="avatar-radius">
            <img src="https://spruko.com/demo/zanex/dist/assets/images/faces/8.jpg" alt="">
        </div>
    </div>
    <div class="item-follow-info">
        <span class="text-dark">{{ $user->name }}</span>
        <span class="text-muted">{{ $user->username }}</span>
    </div>
    <div class="item-follow-action">
        <a href="#" class="wrapper-icon bg-success" target="_blank">
            <i class="fa-sharp fa-solid fa-eye"></i>
        </a>
        <a href="#" class="wrapper-icon bg-primary">
            <i class="fa-sharp fa-solid fa-pen-to-square"></i>
        </a>
    </div>
</div>
@endforeach
<div id="paginations">
    {{ $listUser->withQueryString()->links('partials.paginateAdminCustom') }}
</div>
@else
Không có
@endif