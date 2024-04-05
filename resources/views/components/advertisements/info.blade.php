<div class="row mb-2">
  <p class="mb-0 col-sm-6">
    <a href="{{ route('users.show', $advertisement->user->id) }}"
      class="link-secondary link-underline link-underline-opacity-0">
      <i class="fa-regular fa-user"></i>
      {{ $advertisement->user->name }}
    </a>
  </p>
  <p class="mb-0 col-sm-6 text-end">
    {{ $advertisement->published_at }}
  </p>
</div>
