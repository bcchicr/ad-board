<x-layout>
  <x-simple-link :href='url()->previous()' text="Назад" />
  <x-card class="mt-1 p-4">
    <div class="position-relative">
      <h2 class="text-center">{{ $advertisement->title }}</h2>
      @if ($advertisement->isPublished())
        <div class="position-absolute top-0 end-0">
          <x-control-button class="btn btn-outline-secondary"
            action="{{ route('ads.destroy', $advertisement->id) }}"
            method="DELETE">
            <i class="fa-solid fa-trash"></i>
          </x-control-button>
        </div>
      @endif
      @if ($advertisement->image_path)
        <div class="col-lg-6 offset-lg-3">
          <img src="{{ asset('storage/' . $advertisement->image_path) }}"
            class="img-fluid img-thumbnail object-fit-cover ">
        </div>
      @endif
      <p>{{ $advertisement->content }}</p>
      <x-advertisements.info :$advertisement />
      <x-advertisements.category-nav :category='$advertisement->category' />
      <x-advertisements.controls :$advertisement />
    </div>
  </x-card>
</x-layout>
