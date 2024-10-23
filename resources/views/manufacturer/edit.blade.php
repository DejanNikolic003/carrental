<x-page-layout>
    <div class="p-6 text-gray-900">
        <div class="flex items-center justify-between mb-5">
            <h1 class="text-xl">Edit manufacturer</h1>
        </div>
        <hr class="mt-3 mb-3 w-full">
        <form method="POST" action={{ route('manufacturers.update', $manufacturer->id) }} class="mt-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-5">
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                    :value="$manufacturer->name"  required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="relative flex w-full flex-col gap-1">
                    <x-input-label for="imagePath" :value="__('Upload logo')" />
                    <x-file-input id="imagePath" name="imagePath" />
                    <x-input-error :messages="$errors->get('imagePath')" class="mt-2" />
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <x-primary-button class="ms-3">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-page-layout>
