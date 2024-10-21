<x-page-layout>
    <div class="p-6 text-gray-900">
        <div class="flex items-center justify-between mb-5">
            <h1 class="text-xl">Manufacturers ({{ $count }})</h1>
            <x-primary-button x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'add-new-manufacturer')">
                {{ __('Add new manufacturer') }}
            </x-primary-button>
        </div>
        <div class="overflow-hidden w-full overflow-x-auto rounded-md border border-neutral-300">
            <table class="text-center w-full text-sm text-neutral-600">
                <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900">
                    <tr>
                        <th scope="col" class="p-2">#</th>
                        <th scope="col" class="p-2">Name</th>
                        <th scope="col" class="p-2">Image</th>
                        <th scope="col" class="p-2 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-neutral-300">
                    @forelse($manufacturers as $manufacturer)
                        <tr class="text-center">
                            <td class="font-bold">{{ $manufacturer->id }}</td>
                            <td>{{ $manufacturer->name }}</td>
                            <td class="text-center">
                                <div class="flex justify-center">
                                    <x-tooltip :tooltipMsg="'Image status'">
                                    @if($manufacturer->imagePath)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="peer w-6 h-6 text-center text-green-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="peer w-6 h-6 text-center text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-x"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                                    @endif
                                    </x-tooltip>
                                </div>
                            </td>
                            <td class="flex items-center justify-end gap-2 p-4">
                                <button type="button" class="cursor-pointer whitespace-nowrap rounded-md bg-black p-2 text-xs font-medium tracking-wide text-neutral-100 transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed" x-on:click.prevent="$dispatch('open-modal', 'add-new-manufacturer')">
                                    {{ __('Edit') }}
                                </button>
                                <form action={{ route('manufacturers.destroy', $manufacturer->id) }} method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="cursor-pointer whitespace-nowrap rounded-md p-2 bg-red-500 text-xs font-medium tracking-wide text-white transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500 active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center">
                            {{ __('No data found.') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {!! $manufacturers->links() !!}
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
