<div>
    <x-slot name='title'>Register</x-slot>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
                <form class="login100-form validate-form" wire:submit.prevent='register'>
                    <span class="login100-form-title p-b-55">
                        Register
                    </span>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" wire:model="name" placeholder="Name">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="lnr lnr-user"></span>
                        </span>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input m-b-16"
                        data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="email" wire:model="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="lnr lnr-envelope"></span>
                        </span>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
                        <input class="input100" type="password" wire:model="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <span class="lnr lnr-lock"></span>
                        </span>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="container-login100-form-btn p-t-25">
                        <button type="submit" {{ $is_clicked  ? 'disabled':'' }}  class="login100-form-btn">
                            Register
                            <span wire:loading wire:target="register"  style="{{ $is_clicked  ? 'display:block':'display:none' }}" class="loader"></span>
                        </button>
                    </div>
                    <div class="text-center w-full p-t-115">
                        <span class="txt1">
                            Not a member?
                        </span>
                        <a class="txt1 bo1 hov1" href="{{ route('login') }}">
                            Sign in now
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
