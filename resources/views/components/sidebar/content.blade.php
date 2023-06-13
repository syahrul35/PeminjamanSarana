<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    @can('admin')
    <x-sidebar.link title="Dashboard" href="{{ route('dashboardAdmin') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-heroicon-m-squares-2x2 class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    @endcan
    
    @can('admin')
    <x-sidebar.link title="Kelola Penyelenggara" href="{{ route('kelolaPenyelenggara') }}" :isActive="request()->routeIs('penyelenggara')">
        <x-slot name="icon">
            <x-heroicon-s-users class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    @endcan

    @can('admin')
    <x-sidebar.link title="Kelola wewenang" href="{{ route('wewenang') }}" :isActive="request()->routeIs('wewenang')">
        <x-slot name="icon">
            <x-heroicon-s-user class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    @endcan

    @can('admin')
    <x-sidebar.link title="Kategori Sarana" href="{{ route('kategoriSarana') }}" :isActive="request()->routeIs('kategoriSarana')">
        <x-slot name="icon">
            <x-heroicon-s-wallet class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    @endcan

    @can('admin')
    <x-sidebar.link title="Kelola Sarana" href="{{ route('kelolaSarpras') }}" :isActive="request()->routeIs('kelolaSarana')">
        <x-slot name="icon">
            <x-heroicon-m-home class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    @endcan

    @can('admin')
    <x-sidebar.link title="Data Pengajuan" href="{{ route('pengajuan') }}" :isActive="request()->routeIs('pengajuan')">
        <x-slot name="icon">
            <x-heroicon-o-clipboard-document-list class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    @endcan

    @can('admin')
    <x-sidebar.link title="Data Peminjaman" href="{{ route('peminjaman') }}" :isActive="request()->routeIs('peminjaman')">
        <x-slot name="icon">
            <x-heroicon-s-calendar-days d class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    @endcan

    @can('admin')
    <x-sidebar.link title="Bandingkan Event" href="{{ route('bandingkanEvent') }}" :isActive="request()->routeIs('bandingkanEvent')">
        <x-slot name="icon">
            <x-heroicon-o-scale class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    @endcan

    {{-- dashboard penyelenggara --}}

    @can('user')
    <x-sidebar.link title="Dashboard Penyelengara" href="{{ route('dashboardPenyelenggara') }}" :isActive="request()->routeIs('dashboardPenyelenggara')">
        <x-slot name="icon">
            <x-heroicon-m-squares-2x2 class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    @endcan

    @can('user')
    <x-sidebar.link title="Kelola Event" href="{{ route('kelolaEvent') }}" :isActive="request()->routeIs('kelolaEvent')">
        <x-slot name="icon">
            <x-heroicon-s-plus-circle class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    @endcan
    

</x-perfect-scrollbar>