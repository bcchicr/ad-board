<x-card class="mb-3 p-4">
  <div class="d-flex gap-3 mb-3">
    @if ($advertisement->image_path)
      <div class="w-25 ratio ratio-1x1">
        <img src="{{ asset('storage/' . $advertisement->image_path) }}"
          class="img-fluid img-thumbnail object-fit-cover ">
      </div>
    @endif
    <div class="">
      <h3><a
          href="{{ route('ads.show', $advertisement->id) }}">{{ $advertisement->title }}</a>
      </h3>
      <p>{{ Str::limit($advertisement->content, 200) }}</p>
    </div>
  </div>
  <x-advertisements.info :$advertisement />
  <x-advertisements.category-nav :category='$advertisement->category' />
  <x-advertisements.controls :$advertisement />
</x-card>
