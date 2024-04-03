<x-layout>
  <x-simple-link :href='url()->previous()' text="Назад" />
  <x-card class="mt-1 p-4">
    <h2>{{ $advertisement->title }}</h2>
    <p>{{ $advertisement->content }}</p>
    <x-advertisements.category-nav :category='$advertisement->category' />
  </x-card>
</x-layout>
