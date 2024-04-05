@php
  if ($profile->avatar_path) {
      $avatarPath = 'storage/' . $profile->avatar_path;
  } else {
      $avatarPath = 'images/blank_avatar.jpg';
  }
@endphp
<div class="ratio ratio-1x1">
  <img src="{{ asset($avatarPath) }}"
    class="img-fluid img-thumbnail object-fit-cover">
</div>
