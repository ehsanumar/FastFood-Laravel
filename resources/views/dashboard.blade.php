<x-app-layout>
    <x-slot name="header" class="d-flex flex-row">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (auth()->user()->role === 'user')
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                @endif
                @if (auth()->user()->role === 'admin')

                    <div class="p-6 text-gray-900">
                        <div class="flex flex-wrap -mx-4">
                            <div class="w-full md:w-1/4 px-4 mb-4">
                                <div class="bg-yellow-200 shadow-lg rounded-lg p-6">
                                    <h2 class="text-xl text-center underline font-semibold mb-4">{{ $Users }}
                                    </h2>
                                    <h4 class=" text-lg font-semibold text-center text-gray-700">Users</>
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 px-4 mb-4">
                                <div class="bg-green-200 shadow-lg rounded-lg p-6">
                                    <h2 class="text-xl text-center underline font-semibold mb-4">{{ $Request }}
                                    </h2>
                                    <h4 class=" text-lg font-semibold text-center text-gray-700">Requests</>
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 px-4 mb-4">
                                <div class="bg-red-200 shadow-lg rounded-lg p-6">
                                    <h2 class="text-xl text-center underline font-semibold mb-4">{{ $Booking }}
                                    </h2>
                                    <h4 class=" text-lg font-semibold text-center text-gray-700">Bookings</>
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 px-4 mb-4">
                                <div class="bg-violet-200 shadow-lg rounded-lg p-6">
                                    <h2 class="text-xl text-center underline font-semibold mb-4">{{ $Item }}
                                    </h2>
                                    <h4 class=" text-lg font-semibold text-center text-gray-700">Items</>
                                </div>
                            </div>
                            <form action="{{ route('addItemadmin') }}" enctype="multipart/form-data" method="post" class="w-[60%]"  >
                                @csrf
                                <!--student  Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name')" required autofocus
                                        autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <!--teacher Name -->
                                <div class="mt-4">
                                    <x-input-label for="category" :value="__('Category')" />
                                    <select id="category"
                                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        name="category" :value="old('category')" required autocomplete="username">
                                        @foreach ($category as $id => $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->type}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('department')" class="mt-2" />
                                </div>

                                <!-- Title -->
                                <div class="mt-4">
                                    <x-input-label for="quantity" :value="__('Quantity')" />
                                    <x-text-input id="quantity" class="block mt-1 w-full" type="number" min="0"
                                        name="quantity" :value="old('quantity')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                                </div>

                                <!-- description -->
                                <div class="mt-4">
                                    <div class="relative w-full min-w-[200px]">
                                        <label for="message"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Descreption</label>
                                        <textarea id="message" rows="4" name="description"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Your description..."></textarea>
                                    </div><x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="price" :value="__('Price')" />

                                    <x-text-input id="price" class="block mt-1 w-full" type="text" name="price"
                                        :value="old('price')" required autocomplete="new-price" />

                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                </div>

                                <!-- content -->
                                <div class="mt-4">
                                    <x-input-label for="image" :value="__('Image')" />

                                    <x-text-input id="image" class="block mt-1 w-full p-3 border-1 border-gray-800"
                                        type="file" accept=".gif,.jpg,.jpeg,.png,.doc,.docx" name="image" :value="old('image')" required
                                         />

                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <x-primary-button class="ml-4">
                                        {{ __('Submit') }}
                                    </x-primary-button>
                                </div>
                            </form>

                        </div>

                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
