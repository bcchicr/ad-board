<x-layout>
  <x-simple-link :href="route('ads.index')"
    text="На главную" />
  <x-card class="p-4">
    <h2 class="text-center">Предложить объявление</h2>
    <form class=""
      action="{{ route('ads.store') }}"
      method="POST"
      enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="title-field"
          class="form-label">Заголовок объявления:</label>
        <input class="form-control"
          id="title-field"
          name="title"
          type="text"
          value="{{ old('title') }}"
          required>
        @error('title')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="content-field"
          class="form-label">Текст объявления:</label>
        <textarea class="form-control"
          id="content-field"
          name="content"
          cols="30"
          rows="10"
          required>{{ old('content') }}</textarea>
        @error('content')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3">
        <label for="category-field"
          class="form-label">Категория:</label>
        <select class="form-select"
          name="category-id"
          id="category-field">
          @foreach ($superCategories as $superCategory)
            <optgroup label="{{ $superCategory->name }}">
              @foreach ($superCategory->categories as $category)
                <option {{ $category->id == old('category-id') ? 'selected' : '' }}
                  value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </optgroup>
          @endforeach
        </select>
        @error('category-id')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="picture-field"
          class="form-label">Картинка (необязательно):</label>
        <input class="form-control"
          name="picture"
          type="file"
          id="picture-field">
        @error('picture')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <button class="d-block w-75 mx-auto btn btn-primary btn-lg"
        type="submit">Предложить</button>
    </form>
  </x-card>
</x-layout>
