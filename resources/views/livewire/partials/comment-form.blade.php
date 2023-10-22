<form class="mb-6" wire:submit="{{$method}}">
    @if (session()->has('message'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                 role="alert">
                <span class="font-medium">Success!</span> {{session('message')}}
            </div>
        </div>
    @endif
    @csrf
    <div
        class="">
        <label for="{{$inputId}}" class="sr-only">{{$inputLabel}}</label>
        <textarea id="{{$inputId}}" rows="3" cols="12"
                  class="@error($state.'.body') @enderror w-100 form-control"
                  placeholder="Write a comment..."
                  wire:model.live="{{$state}}.body"
                  oninput="detectAtSymbol()"
        ></textarea>
        @if(!empty($users) && $users->count() > 0)
            @include('commentify::livewire.partials.dropdowns.users')
        @endif
        @error($state.'.body')
        <p class="mt-2 text-sm text-red-600">
            {{$message}}
        </p>
        @enderror
    </div>

    <button wire:loading.attr="disabled" type="submit"
            class="btn btn-primary mt-3">
        <div wire:loading wire:target="{{$method}}">
            @include('commentify::livewire.partials.loader')
        </div>
        {{$button}}
    </button>

</form>
