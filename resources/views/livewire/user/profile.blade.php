<div>
    <x-slot name='title'>Profile</x-slot>
    <h3 class="name">{{ Auth::user()->name }}</h3>
    <p class="title">{{Auth::user()->email}}</p>
    <button type="submit" {{ $is_clicked  ? 'disabled':'' }}  wire:click.prevent='logout' class="btn">
        Login  <span wire:loading wire:target="logout"  style="{{ $is_clicked  ? 'display:block':'display:none' }}" class="loader"></span>
    </button>
</div>
