@csrf
<div class="my-1">
    <div class="form-floating mb-3">
        <input type="text" class="form-control shadow-none @error('name') is-invalid @enderror" id="name"
            name="name" placeholder="Name Technical" value="{{ $user->name ?? '' }}">
        <label for="title">Name</label>
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input type="email" class="form-control shadow-none @error('email') is-invalid @enderror" id="email"
            name="email" placeholder="email@gmail.com" value="{{ $user->email ?? '' }}">
        <label for="title">Email</label>
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-floating mb-3">
        <input type="password"
            class="form-control shadow-none @if (empty($user)) @error('password') is-invalid @enderror @endif"
            id="password" name="password" placeholder="Password">
        <label for="title">Password</label>
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    @if (!$user)
        <div class="form-floating">
            <select name="provider" class="form-select shadow-none" id="floatingSelect"
                aria-label="Floating label select example" required>
                <option selected disabled>Select type user</option>
                <option value="employee">Employee</option>
                <option value="technical">Technical</option>
                <option value="administrator">Administrator</option>
            </select>
            <label for="floatingSelect">Select typer user</label>
        </div>
    @endif

    {{-- {{ $errors->m() }} --}}
</div>
