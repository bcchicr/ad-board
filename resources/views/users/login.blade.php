<x-layout>
  <x-simple-link :href="route('ads.index')" text="На главную" />
  <x-card class="p-4">
    <div class="text-center">
      <h2 class="mb-0">Вход</h2>
      <p class="">
        Зайти, чтобы предлагать объвления
      </p>
    </div>
    <form class="" action="{{ route('users.authenticate') }}" method="POST">
      @csrf
      <div class="col-6 offset-3">
        <div class="mb-3">
          <label for="title-field" class="form-label">Логин:</label>
          <input class="form-control" id="title-field" name="name" type="text" required>
        </div>
        <div class="mb-3">
          <label for="password-field" class="form-label">Пароль:</label>
          <input class="form-control" id="password-field" name="password" type="password" required>
        </div>
        <button class="d-block w-75 mx-auto btn btn-primary btn-lg mb-3" type="submit">Войти</button>
        <p class="text-center">
          Нет аккаунта?
          <a href="{{ route('users.create') }}" class="">Зарегистрироваться</a>
        </p>
      </div>
    </form>
  </x-card>
</x-layout>
