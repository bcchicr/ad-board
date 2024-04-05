<x-card class="mb-3 p-4">
  <h3><a href="{{ route('ads.show', $advertisement->id) }}">{{ $advertisement->title }}</a></h3>
  <p>{{ Str::limit($advertisement->content, 200) }}</p>
  <x-advertisements.info :$advertisement />
  <x-advertisements.category-nav :category='$advertisement->category' />
  <x-advertisements.controls :$advertisement />
</x-card>
