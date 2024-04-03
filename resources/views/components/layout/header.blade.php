<header class="navbar navbar-expand-lg bg-primary-subtle shadow-sm">
  <div class="container-xl">
    <a class="navbar-brand" href="{{ route('ads.index') }}">
      <h1 class="mb-0 text-primary-emphasis">AdBoard</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse fs-5" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @auth
          <li class="nav-item">
            <x-control-button class="nav-link" :action="route('users.logout')" text="Выйти" />
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.login') }}">Войти</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.create') }}">Зарегистрироваться</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</header>
