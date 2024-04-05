<x-layout>
  <x-simple-link :href="route('users.show', $profile->user_id)" text="Назад" />
  <x-card class="mb-3 p-4">
    <h2 class="text-center">Редактировать профиль</h2>
    <form class="" action="{{ route('profiles.update', $profile) }}"
      method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="col-md-6 offset-md-3">
        <div class="mb-3">
          <label for="first-name-field" class="form-label">Имя:</label>
          <input class="form-control" id="first-name-field" name="first-name"
            type="text" value="{{ $profile->first_name }}">
          @error('first-name')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="last-name-field" class="form-label">Фамилия:</label>
          <input class="form-control" id="last-name-field" name="last-name"
            type="text" value="{{ $profile->last_name }}">
          @error('last-name')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="phone-field" class="form-label">Телефон:</label>
          <input class="form-control" id="phone-field" name="phone"
            type="tel" value="{{ $profile->phone }}">
          @error('phone')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="bio-field" class="form-label">О себе:</label>
          <textarea class="form-control" id="bio-field" name="bio" cols="30"
            rows="10">{{ $profile->bio }}</textarea>
          @error('bio')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-4">
          <label for="avatar-field" class="form-label">Аватар:</label>
          <input class="form-control" id="avatar-field" name="avatar"
            type="file">
          @error('avatar')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>
      <button class="d-block w-100 btn btn-primary btn-md-lg mb-3"
        type="submit">Редактировать</button>
      </div>
    </form>
  </x-card>
</x-layout>
