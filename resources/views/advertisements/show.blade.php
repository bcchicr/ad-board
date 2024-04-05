<x-layout>
  <x-simple-link :href='url()->previous()'
    text="Назад" />
  <x-card class="mt-1 p-4">
    <div class="d-flex justify-content-between">
      <h2>{{ $advertisement->title }}</h2>
      @if ($advertisement->isPublished())
        <x-control-button class="btn btn-outline-secondary"
          action="{{ route('ads.destroy', $advertisement->id) }}"
          method="DELETE"
          text="Удалить" />
      @endif
    </div>
    <p>{{ $advertisement->content }}</p>
    <x-advertisements.info :$advertisement />
    <x-advertisements.category-nav :category='$advertisement->category' />
    <x-advertisements.controls :$advertisement />
  </x-card>
</x-layout>
