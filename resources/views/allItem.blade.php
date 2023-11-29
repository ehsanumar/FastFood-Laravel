<x-app-layout>
    <x-slot name="header" class="d-flex flex-row">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" m-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 grid  grid-cols-12 text-gray-900 ">
                    @foreach ($items as $item)

                    <div
                        class="col-span-4 m-6 relative flex max-w-[20rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                        <div
                            class="relative m-0 overflow-hidden text-gray-700 bg-transparent rounded-none shadow-none bg-clip-border">
                            <img class="h-[40vh] w-full" src="{{ asset('storage/images/' . $item->image) }}"
                                alt="ui/ux review check" />
                                {{-- <img src="{{ asset('img/dolma.jpg') }}"
                                alt="ui/ux review check" /> --}}
                        </div>
                        <div class="p-6">
                            <h4
                                class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                {{ $item->name }}
                            </h4>
                            <p
                                class="block mt-3 font-sans text-xl antialiased font-normal leading-relaxed text-gray-700">
                                {{ $item->description }}
                        </div>
                        <div class="flex items-center justify-between p-6">
                            <h4
                                class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                {{ $item->price }} $
                            </h4>
                            <p
                                class="block mt-3 font-sans text-xl antialiased font-normal leading-relaxed text-gray-700">
                                {{ $item->category->type }}
                        </div>
                        <div class="flex items-center justify-between p-6">
                            <div class="flex items-center -space-x-3">
                                 <form action="{{ route('removeItemadnmin' , ['id'=>$item->id]) }}" method="post">
                                                @csrf
                                                <button class="bg-red-500 px-6 py-2 text-white rounded">Delete</button>
                                                </form>
                            </div>
                            <p class="block font-sans text-base antialiased font-normal leading-relaxed text-inherit">
                                {{ $item->created_at->diffForHumans() }}

                            </p>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
           {{$items->links()}}

        </div>
    </div>
</x-app-layout>
