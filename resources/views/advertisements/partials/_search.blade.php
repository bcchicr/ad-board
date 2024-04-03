<form action="{{ url()->current() }}" method="GET">
  <x-card class="mb-3 p-0 ">
    <div class="input-group">
      <input class="form-control form-control-lg border-0 rounded-start-1" name="search" type="text"
        placeholder="Поиск..." value="{{ $searchValue ?? '' }}">
      <button class="btn btn-outline-primary border-0 border-start rounded-end-1" type="submit">Поиск</button>
    </div>
    <input hidden type="text" name="super-category" value="{{ $superCategory ?? '' }}">
    <input hidden type="text" name="category" value="{{ $category ?? '' }}">
  </x-card>
</form>