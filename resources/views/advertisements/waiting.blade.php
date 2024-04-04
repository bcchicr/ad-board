<x-layout>
    <h2 class="text-center mb-1">Предложенные объявления</h2>
    <x-simple-link :href="route('ads.index')" text="На главную" />
    @foreach ($advertisements as $advertisement)
      <x-advertisements.list-item :$advertisement />
    @endforeach
    {{ $advertisements->withQueryString()->links() }}
  </x-layout>
  