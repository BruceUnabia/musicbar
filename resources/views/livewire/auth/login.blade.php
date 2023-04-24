<div>
    <div class="container col-md-6 offset-md-3 mt-5">
        <div class="card shadow">
            <h1 style="background-color:#4b6cb7" class="text-center">
                Log In
            </h1>
            @if (isset($errorMsg))
            <div class="alert alert-danger">
                {{$errorMsg}}
            </div>
            @endif
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" wire:model="email">
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" wire:model="password">
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="d-flex">
                <div class="flex-grow-1">
                    <a class="text-primary" href="/register">Sign up for an account</a>
                </div>
                <div style="background-color: #A5D7E8" class="btn px-5 mb-3" wire:click="submit">
                    Log In
                </div>
            </div>
        </div>
    </div>
</div>
