<x-layout>
  <x-simple-link :href="route('ads.index')" text="На главную" />
  <x-card class="mb-3 p-4">
    <div class="text-center">
      <h2 class="mb-0">Вход</h2>
      <p class="">
        Зайти, чтобы предлагать объявления
      </p>
      @error('auth')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <form class="" action="{{ route('users.authenticate') }}" method="POST">
      @csrf
      <div class="col-6 offset-3">
        <div class="mb-3">
          <label for="title-field" class="form-label">Логин:</label>
          <input id="title-field" name="name" type="text"
            class="form-control" value="{{ old('name') }}" required>
          @error('name')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-3">
          <label for="password-field" class="form-label">Пароль:</label>
          <input id="password-field" name="password" type="password"
            class="form-control" required>
          @error('password')
            <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <button class="d-block w-75 mx-auto btn btn-primary btn-lg mb-3"
          type="submit">Войти</button>
        <p class="text-center">
          Нет аккаунта?
          <a href="{{ route('users.create') }}"
            class="">Зарегистрироваться</a>
        </p>
      </div>
    </form>
  </x-card>
</x-layout>
