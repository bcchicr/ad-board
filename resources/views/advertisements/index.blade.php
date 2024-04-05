<x-layout>
  <h2 class="text-center mb-1">Опубликованные объявления</h2>
  <x-simple-link :href="route('ads.create')"
    text="{{ Auth::user()?->isAdmin() ? 'Опубликовать' : 'Предложить' }}" />
  @include('partials._search')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0 fs-4">
      <li class="breadcrumb-item fw-bold"><a
          href="{{ route('ads.index') }}">Всe</a>
      </li>
      @php
        $superCategory = Request::route('superCategory');
      @endphp
      @if ($superCategory)
        <li class="breadcrumb-item"><a
            href="{{ route('ads.index', [$superCategory]) }}">{{ $superCategory }}</a>
        </li>
        @php
          $category = Request::route('category');
        @endphp
        @if ($category)
          <li class="breadcrumb-item"><a
              href="{{ route('ads.index', [$superCategory, $category]) }}">{{ $category }}</a>
          </li>
        @endif
      @endif
    </ol>
  </nav>
  <x-advertisements.ad-list :$advertisements />
  {{ $advertisements->withQueryString()->links() }}
</x-layout>
