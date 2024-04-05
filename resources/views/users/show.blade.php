<x-layout>
  <x-simple-link :href="route('ads.index')"
    text="На главную" />
  <x-card class="mt-1 p-4">
    <div class="d-flex justify-content-between align-items-center">
      <h2 class="{{ $user->is_banned ? 'text-secondary text-decoration-line-through' : '' }}">{{ $user->name }}</h2>
      @auth
        @if ($user->id === Auth::user()->id)
          <x-control-button class="btn btn-outline-danger"
            :action="route('users.logout')"
            text="Выйти" />
        @elseif (Auth::user()->isAdmin())
          @php
            if ($user->is_banned) {
                $text = 'Разбанить';
                $style = 'btn-outline-secondary';
                $route = 'users.un-ban';
            } else {
                $text = 'Забанить';
                $style = 'btn-outline-danger';
                $route = 'users.ban';
            }
          @endphp
          <x-control-button class="btn {{ $style }}"
            :action="route($route, $user->id)"
            method="PATCH"
            :$text />
        @endif
      @endauth
    </div>
  </x-card>
</x-layout>
