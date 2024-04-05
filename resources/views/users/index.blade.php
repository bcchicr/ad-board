<x-layout>
  <h2 class="text-center mb-1">Все пользователи</h2>
  @include('partials._search')
  @foreach ($users as $user)
    @continue($user->id === Auth::user()->id)
    <x-card class="mb-3 p-4">
      <div class="position-relative">
        <div class="d-flex gap-3">
          <div class="w-25">
            <img src="{{ asset('images/blank_avatar.jpg') }}"
              class="img-fluid img-thumbnail object-fit-cover">
          </div>
          <h3>
            <a href="{{ route('users.show', $user->id) }}"
              class="{{ $user->is_banned ? 'text-secondary text-decoration-line-through' : '' }}">
              {{ $user->name }}
            </a>
          </h3>
        </div>
        <div class="position-absolute top-0 end-0">
          <x-users.controls :$user />
        </div>
        @error('controls')
          <p class="text-danger text-center mb-0">{{ $message }}</p>
        @enderror
      </div>
    </x-card>
  @endforeach
  {{ $users->withQueryString()->links() }}
</x-layout>
