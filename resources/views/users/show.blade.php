<x-layout>
  <x-simple-link :href="route('ads.index')"
    text="На главную" />
  <x-card class="mb-3 p-4">
    <div class="position-relative">
      <div class="d-flex gap-3">
        <div class="w-25">
          <img src="{{ asset('images/blank_avatar.jpg') }}"
            class="img-fluid img-thumbnail object-fit-cover">
        </div>
        <h2 class="{{ $user->is_banned ? 'text-secondary text-decoration-line-through' : '' }}">
          {{ $user->name }}
        </h2>
      </div>
      <div class="position-absolute top-0 end-0">
        <x-users.controls :$user />
      </div>
      @error('controls')
        <p class="text-danger text-center mb-0">{{ $message }}</p>
      @enderror
    </div>
  </x-card>
  <h3>Объявления пользователя:</h3>
  @php
    $advertisements = Auth::user()->isAdmin() ? $user->advertisements : $user->advertisementsPublished;
  @endphp
  <x-advertisements.ad-list :$advertisements />
</x-layout>
