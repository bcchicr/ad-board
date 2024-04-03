<x-layout>
  <h2 class="text-center mb-1">Опубликованные объявления</h2>
  <x-simple-link :href="route('ads.create')" text="Предложить" />
  @include('advertisements.partials._search')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0 fs-4">
      <li class="breadcrumb-item fw-bold"><a href="{{ route('ads.index') }}">Всe</a>
      </li>
      @if ($superCategory)
        <li class="breadcrumb-item"><a href="{{ route('ads.index', [$superCategory]) }}">{{ $superCategory }}</a>
        </li>
      @endif
      @if ($category)
        <li class="breadcrumb-item"><a
            href="{{ route('ads.index', [$superCategory, $category]) }}">{{ $category }}</a>
        </li>
      @endif
    </ol>
  </nav>
  @foreach ($advertisements as $advertisement)
    <x-advertisements.list-item :$advertisement />
  @endforeach
  {{ $advertisements->links() }}
</x-layout>
