@php
  $profile = $user->profile;
@endphp
<x-layout>
  <x-simple-link :href="route('ads.index')"
    text="На главную" />
  <x-card class="mb-3 p-4">
    <div class="position-relative">
      <div class="row">
        <div class="col-4 text-center">
          @php
            if ($profile->avatar_path) {
                $avatarPath = 'storage/' . $profile->avatar_path;
            } else {
                $avatarPath = 'images/blank_avatar.jpg';
            }
          @endphp
          <div class="ratio ratio-1x1">
            <img src="{{ asset($avatarPath) }}"
              class="img-fluid img-thumbnail object-fit-cover">
          </div>
          @can('update', $profile)
            <a href="{{ route('profiles.edit', $profile) }}">Редактировать</a>
          @endcan
        </div>
        <div class="col-8">
          <h2 class="{{ $user->is_banned ? 'text-secondary text-decoration-line-through' : '' }}">
            {{ $user->name }}
          </h2>
          @if ($profile->fullName())
            <p>
              <b>Имя:</b>
              <br>{{ $profile->fullName() }}
            </p>
          @endif
          @if ($profile->phone)
            <p>
              <b>Телефон:</b><br>
              {{ $profile->phone }}
            </p>
          @endif
          @if ($profile->bio)
            <p>
              <b>О себе:</b><br>
              {{ $profile->bio }}
            </p>
          @endif
        </div>
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
