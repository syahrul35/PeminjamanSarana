<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Hasil Bandingkan Event') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-2 mt-2 max-w-[50%]">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                <thead class="text-xs uppercase bg-sky-200 dark:bg-gray-700">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Acara</th>
                        <th scope="col" class="px-6 py-3">Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($results as $result)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">Event {{$loop->iteration}}</td>
                        <td class="px-6 py-4">{{ $result }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
