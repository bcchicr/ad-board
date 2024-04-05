<div class="d-flex justify-content-between mb-2">
  <p class="mb-0">
    <a href="{{ route('users.show', $advertisement->user->id) }}"
      class="link-secondary link-underline link-underline-opacity-0">
      <i class="fa-regular fa-user"></i>
      {{ $advertisement->user->name }}
    </a>
  </p>
  <p class="mb-0">
    {{ $advertisement->published_at }}
  </p>
</div>
