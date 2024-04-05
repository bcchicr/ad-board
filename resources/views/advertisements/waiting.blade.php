<x-layout>
  <h2 class="text-center mb-1">Предложенные объявления</h2>
  <x-simple-link :href="route('ads.index')" text="На главную" />
  <x-advertisements.ad-list :$advertisements />
  {{ $advertisements->withQueryString()->links() }}
</x-layout>
