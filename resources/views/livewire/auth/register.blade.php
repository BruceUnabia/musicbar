<div>
    <div>
        <div class="container col-md-6 offset-md-3 mt-5">
            <div class="card shadow">
                <h1 style="background-color:#4b6cb7" class="text-center">
                    Register
                </h1>
                @if (isset($errorMsg))
                <div class="alert alert-danger">
                    {{$errorMsg}}
                </div>
                @endif
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" wire:model="name">
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

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

                <div class="form-group mb-3">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="password" id="password" class="form-control" wire:model="password_confirmation">
                    @error('password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="d-flex">
                    <div class="flex-grow-1">
                        <a class="text-info" href="/login">Already have an account? Click here..</a>
                    </div>
                    <div style="background-color: #A5D7E8" class="btn px-5 rounded" wire:click="submit">
                        Register
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
