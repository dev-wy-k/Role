<li class="menu-item">
    <a href="{{ $link }}" class="menu-item-link {{ Request::url() === $link ? 'active' : '' }}">
        <span>
            <i class="{{ $class }}"></i>
            {{ $name }}
        </span>
        @if($count >= 0 )
        <span class="badge badge-pill bg-white shadow-sm text-primary">{{ $count }}</span>
        @endif
    </a>
</li>