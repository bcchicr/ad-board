@unless ($advertisement->isPublished())
  <div class="d-flex justify-content-center gap-3">
    <x-control-button class="btn btn-primary btn-lg"
      action="{{ route('ads.publish', $advertisement->id) }}"
      method="PATCH"
      text="Принять" />
    <x-control-button class="btn btn-outline-primary btn-lg"
      action="{{ route('ads.decline', $advertisement->id) }}"
      method="DELETE"
      text="Оклонить" />
  </div>
@endunless
@error('controls')
  <p class="text-danger text-center mb-0">{{ $message }}</p>
@enderror
