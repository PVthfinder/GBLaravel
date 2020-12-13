<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="/">Главная</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/about">О нас</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/categories">Новости</a>
    </li>

    @auth
        @if(Auth::user()->hasRole(1))
            <li class="nav-item">
                <a class="nav-link" href="/admin">Админка</a>
            </li>
        @endif
    @endauth
</ul>