<form action="{{ route('login') }}" method="POST">
    @csrf
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Login</button>
    @error('email')
        <div>{{ $message }}</div>
    @enderror
</form>
