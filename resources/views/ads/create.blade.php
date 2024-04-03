<x-layout>
  <x-simple-link :href="route('ads.index')" text="На главную" />
  <x-card class="p-4">
    <h2 class="text-center">Предложить объявление</h2>
    <form class="" action="{{ route('ads.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="title-field" class="form-label">Заголовок объявления:</label>
        <input class="form-control" id="title-field" name="title" type="text" required>
      </div>
      <div class="mb-3">
        <label for="content-field" class="form-label">Текст объявления:</label>
        <textarea class="form-control" id="content-field" name="content" cols="30" rows="10" required></textarea>
      </div>
      <div class="mb-4">
        <label for="category-field" class="form-label">Категория:</label>
        <select class="form-select" name="category" id="category-field">
          @foreach ($superCategories as $superCategory)
            <optgroup label="{{ $superCategory->name }}">
              @foreach ($superCategory->categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </optgroup>
          @endforeach
        </select>
      </div>
      <button class="d-block w-75 mx-auto btn btn-primary btn-lg" type="submit">Предложить</button>
    </form>
  </x-card>
</x-layout>
