<form action="{{ url()->current() }}" method="GET">
  <x-card class="mb-2 p-0 ">
    <div class="input-group">
      <input class="form-control form-control-lg border-0 rounded-start-1"
        name="search" type="text" placeholder="Поиск..."
        value="{{ Request::get('search') ?? '' }}">
      <button class="btn btn-outline-primary border-0 border-start rounded-end-1"
        type="submit">Поиск</button>
    </div>
  </x-card>
</form>
