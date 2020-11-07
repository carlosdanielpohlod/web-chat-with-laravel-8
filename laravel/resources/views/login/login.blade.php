<form action="{{route('api.login')}}" method="POST">
    @csrf
    <input name="email" placeholder="email" value="email@example.com">
    <input name="password" placeholder="password" value="12345">
    <button type="submit">Go</button>
</form>