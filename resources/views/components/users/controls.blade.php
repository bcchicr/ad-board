@if ($user->id === Auth::user()->id)
  <x-control-button class="btn btn-outline-danger" :action="route('users.logout')">
    Выйти
  </x-control-button>
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
  <x-control-button class="btn {{ $style }}" :action="route($route, $user->id)"
    method="PATCH">
    {{ $text }}
  </x-control-button>
@endif
