<x-layout>
  <x-simple-link :href='url()->previous()'
    text="Назад" />
  <x-card class="mt-1 p-4">
    <div class="d-flex justify-content-between align-items-center">
      <h2 class="">{{ $user->name }}</h2>
      <x-control-button class="btn btn-outline-danger"
        :action="route('users.logout')"
        text="Выйти" />
    </div>
  </x-card>
</x-layout>
