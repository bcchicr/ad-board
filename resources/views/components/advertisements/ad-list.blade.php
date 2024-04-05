@forelse ($advertisements as $advertisement)
  <x-advertisements.list-item :$advertisement />
@empty
  <x-card class="mb-3 p-4">
    Пока здесь ничего нет.
  </x-card>
@endforelse
