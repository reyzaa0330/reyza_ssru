<nav class="nav flex-column">
@foreach ($list as $row)
        <a class="nav-link {{ $isActive($row['label']) ? 'active' : '' }}" href="{{ route($row['route']) }}">
        <i class="{{ $row['icon'] }}"></i>
        {{$row['label']}}
        </a>
@endforeach
</nav>