<div>
  <x-slot name='title'>Pattren</x-slot>
  <div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
            <form class="login100-form validate-form">
                <span class="login100-form-title p-b-55">
                    Pattern
                </span>
                <h5 class="mb-4 text-center" >Pattern will be change in 40 sec</h5>
                <input class="input101 text-center mb-4" type="number"  name="code" readonly value="{{ Auth::user()->code }}" placeholder="4453">
                <div class=" validate-input m-b-16" style="display: flex; align-items: center;" wire:ignore.self>
                    <input class="input101 " type="number" minlength="1" wire:model.lazy="code1" placeholder="1">
                    <input class="input101 ml-1" type="number" minlength="1" wire:model.lazy="code2" placeholder="2">
                    <input class="input101 ml-1" type="number" minlength="1" wire:model.lazy="code3" placeholder="3">
                    <input class="input101 ml-1" type="number" minlength="1" wire:model.lazy="code4" placeholder="4">
                </div>
                <div class="container-login100-form-btn p-t-25">
                    <button type="submit" {{ $is_clicked  ? 'disabled':'' }}  class="login100-form-btn" wire:click.prevent='verify'>
                    Verify
                        <span wire:loading wire:target="verify"  style="{{ $is_clicked  ? 'display:block':'display:none' }}" class="loader"></span>
                    </button>
                </div>
                <div class="text-center w-full p-t-115">
                    <a class="txt1 bo1 hov1" href="#">
                        Recreate
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
