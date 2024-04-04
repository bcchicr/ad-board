<x-card class="mb-3 p-4">
  <h3><a href="{{ route('ads.show', $advertisement->id) }}">{{ $advertisement->title }}</a></h3>
  <p>{{ Str::limit($advertisement->content, 200) }}</p>
  <div class="d-flex justify-content-between">
    <x-advertisements.category-nav :category='$advertisement->category' />
    <p>{{ $advertisement->published_at }}</p>
  </div>
  <x-advertisements.controls :$advertisement />
</x-card>
