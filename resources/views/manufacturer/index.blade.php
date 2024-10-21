<x-page-layout>
    <div class="p-6 text-gray-900">
        <div class="flex items-center justify-between mb-5">
            <h1 class="text-xl">Manufacturers ({{ $count }})</h1>
            <x-primary-button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'add-new-manufacturer')">
                {{ __('Add new manufacturer') }}
            </x-primary-button>
            <table>
                <thead>

                </thead>
                <tbody>
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-modal name="add-new-manufacturer" focusable>
        <div class="p-5">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Add new manufacturer') }}
                </h2>
                <button x-on:click="$dispatch('close')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-x">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>
            <form method="POST" action={{ route('manufacturers.store') }} class="mt-4" enctype="multipart/form-data">
                @csrf
                <div class="space-y-5">
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="relative flex w-full flex-col gap-1">
                        <x-input-label for="imagePath" :value="__('Upload logo')" />
                        <x-file-input id="imagePath" name="imagePath" />
                        <x-input-error :messages="$errors->get('imagePath')" class="mt-2" />
                    </div>
                </div>

                <hr class="mt-5 mb-5 w-full">
                <div class="flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Close') }}
                    </x-secondary-button>

                    <x-primary-button class="ms-3">
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </x-modal>

</x-page-layout>
