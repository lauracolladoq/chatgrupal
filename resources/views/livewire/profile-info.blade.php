<div>
    <x-button  wire:click="$set('openModalPerfil', true)"  class="profile">
        <div class="profile-picture" id="my-profile-picture">
            <img src="{{ Storage::url('users-avatar/' . $user->avatar) }}" alt="My Profile Picture" />
        </div>
        <div class="profile-handle">
            <h4 class="font-extrabold">{{ $user->name }}</h4>
            <p class="text-gray"><span>@</span>{{ $user->username }}</p>
        </div>
    </x-button>
    
    <!-- Profile Info Modal -->
    <x-dialog-modal wire:model="openModalPerfil">
        <x-slot name="title">
            <button wire:click="cancelarPerfil">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#000000"
                fill="none">
                <path d="M18 6L12 12M12 12L6 18M12 12L18 18M12 12L6 6" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            </button>

        </x-slot>
        <x-slot name="content">
            <h1 class="font-extrabold text-3xl">{{ $user->name }}</h1>
            <p class="font-bold text-md"><span>@</span>{{ $user->username }}</p>
            <img src="{{ Storage::url('users-avatar/' . $user->avatar) }}" alt=""
                class="profile-picture" />
        </x-slot>
        <x-slot name="footer">
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <a class="btn btn-primary" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        </x-slot>
    </x-dialog-modal>
</div>
