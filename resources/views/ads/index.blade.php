<x-layout>
  <h2 class="text-center mb-1">Опубликованные объявления</h2>
  <x-simple-link :href="route('ads.create')" text="Предложить" />
  @include('ads.partials._search')
  @foreach ($advertisements as $advertisement)
    <x-advertisements.list-item :$advertisement />
  @endforeach
  {{ $advertisements->links() }}
</x-layout>
