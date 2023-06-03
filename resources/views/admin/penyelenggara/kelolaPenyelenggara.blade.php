<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Kelola Penyelenggara') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <a href="tambahPenyelenggara">
            <x-button class="justify-center gap-2">
                <x-heroicon-s-plus-small class="w-6 h-6" aria-hidden="true" />
                <span>{{ __('Tambah') }}</span>
            </x-button>
    </div>

    <div class="py-2">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                <thead class="text-xs uppercase bg-sky-200 dark:bg-gray-700">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Username</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 text-center">
                        <td class="px-6 py-4">1.</td>
                        <td class="px-6 py-4">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            <form action="{{ route ('editPenyelenggara',$user)}}" method="get">
                                {{ csrf_field() }}
                                <x-button class="justify-center gap-2 bg-yellow-400 hover:bg-yellow-500">
                                    <span>{{ __('Edit') }}</span>
                                </x-button>
                            </form>
                            </form>
                            <form action="{{ route('hapusPenyelenggara', $user) }}" method="post" class="mt-2 pt-2">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE" class="pt-2 mt-2">
                                <x-button class="justify-center gap-2 bg-red-500 hover:bg-red-600">
                                    <span>{{ __('Hapus') }}</span>
                                </x-button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>