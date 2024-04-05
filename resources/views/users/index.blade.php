<x-layout>
  <h2 class="text-center mb-0">Все пользователи</h2>
  <x-simple-link :href="route('ads.index')" text="На главную" />
  @include('partials._search')
  <div class="mt-3">

    @foreach ($users as $user)
      @continue($user->id === Auth::user()->id)
      <x-card class="mb-3 p-4">
        <div class="w-50 mx-auto mb-2">
          <x-profiles.avatar :profile="$user->profile" />
        </div>
        <div class="d-flex flex-column align-items-center">
          <h3>
            <a href="{{ route('users.show', $user->id) }}"
              class="{{ $user->is_banned ? 'text-secondary text-decoration-line-through' : '' }}">
              {{ $user->name }}
            </a>
          </h3>
          <x-users.controls :$user />
        </div>
        @error('controls')
          <p class="text-danger text-center mb-0">{{ $message }}</p>
        @enderror
      </x-card>
    @endforeach
  </div>
  {{ $users->withQueryString()->links() }}
</x-layout>
