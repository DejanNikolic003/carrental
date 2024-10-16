<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between mb-5">
                        <h2>Manufacturers</h2>
                        <x-primary-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'add-new-manufacturer')">
                            {{ __('Add new manufacturer') }}
                        </x-primary-button>
                    </div>
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th>Song</th>
                                <th>Artist</th>
                                <th>Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                                <td>Malcolm Lockyer</td>
                                <td>1961</td>
                            </tr>
                            <tr>
                                <td>Witchy Woman</td>
                                <td>The Eagles</td>
                                <td>1972</td>
                            </tr>
                            <tr>
                                <td>Shining Star</td>
                                <td>Earth, Wind, and Fire</td>
                                <td>1975</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-modal name="add-new-manufacturer" focusable>
        <div class="p-5">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Add new manufacturer') }}
                </h2>
                <button x-on:click="$dispatch('close')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
            <form method="POST" action={{ route('manufacturers.store')}} class="mt-4">
                @csrf
                <div class="space-y-5">
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- TODO: Fill out the countries. -->
                    <div>
                        <x-input-label for="countries" :value="__('Country')" />
                        <select name="countries" id="countries" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="">--Please choose an option--</option>
                            <option value="{{ $country ?? 'N/A' }}">{{ $country ?? 'N/A'}}</option>
                        </select>
                    </div>

                    <div>
                        <x-input-label for="website" :value="__('Website')" />
                        <x-text-input id="website" class="block mt-1 w-full" type="text" name="website" :value="old('website')" required autofocus />
                        <x-input-error :messages="$errors->get('website')" class="mt-2" />
                    </div>

                    <!-- TODO: Upload image to storage. -->
                    <div>
                        <x-input-label for="logo" :value="__('Logo')" />
                        <input type="file" id="logo" name="logo" class="block mt-1 w-full" accept="image/png, image/jpeg" />
                    </div>

                    <!-- TODO: Change the 'text-input' component to textarea. -->
                    <div>
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                </div>


                 <!-- TODO: Save the data in database. -->
                <div class="mt-6 flex justify-end">
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
</x-app-layout>
