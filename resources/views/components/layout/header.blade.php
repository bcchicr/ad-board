<header class="navbar navbar-expand-lg bg-primary-subtle shadow-sm">
  <div class="container-xl">
    <a class="navbar-brand"
      href="{{ route('ads.index') }}">
      <h1 class="mb-0 text-primary-emphasis">AdBoard</h1>
    </a>
    <button class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse fs-5"
      id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @auth
          @if (Auth::user()->isAdmin())
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false">
                Админ-панель
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item"
                    href="{{ route('ads.waiting') }}">Предложенные</a></li>
                <li><a class="dropdown-item"
                    href="{{ route('users.index') }}">Список пользователей</a></li>
              </ul>
            </li>
          @endif
          <li class="nav-item">
            <a class="nav-link"
              href="{{ route('users.show', Auth::user()->id) }}">
              <i class="fa-solid fa-user"></i>
              Профиль
            </a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link"
              href="{{ route('users.login') }}">
              <i class="fa-solid fa-right-to-bracket"></i>
              Войти
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"
              href="{{ route('users.create') }}">
              <i class="fa-solid fa-user-plus"></i>
              Зарегистрироваться
            </a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</header>
