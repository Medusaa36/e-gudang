<div>
    <div class="login-box">
        <h1 class="text-center"><b>E-Gudang</b> | Login</h1>
        <div class="card card-outline card-primary">
            <div class="card-body">
                <form wire:submit.prevent="login">
                    <div class="input-group mb-3">
                        <input type="email" wire:model="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" wire:model="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary btn-block">
                            Login
                        </button>
                    </div>

                    @if (session('error'))
                        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                    @endif
                </form>

            </div>
        </div>
    </div>
</div>
