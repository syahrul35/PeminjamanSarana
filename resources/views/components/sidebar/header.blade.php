<div class="flex items-center justify-between flex-shrink-0 px-3">
    <!-- Logo -->
    <a href="{{ route('dashboardAdmin') }}" class="inline-flex items-center gap-2">
        <img src="/unhasy.png" alt="" aria-hidden="true" class="w-10 h-10">
        {{-- <x-application-logo aria-hidden="true" class="w-10 h-10" /> --}}

        {{-- <img src="unhasy.png" alt="" style="max-width: 3.5em"> --}}
        <span class="sr-only">Dashboard</span>
    </a>

    <!-- Toggle button -->
    <x-button type="button" icon-only sr-text="Toggle sidebar" variant="secondary" x-show="isSidebarOpen || isSidebarHovered" x-on:click="isSidebarOpen = !isSidebarOpen">
        <x-icons.menu-fold-right x-show="!isSidebarOpen" aria-hidden="true" class="hidden w-6 h-6 lg:block" />

        <x-icons.menu-fold-left x-show="isSidebarOpen" aria-hidden="true" class="hidden w-6 h-6 lg:block" />

        <x-heroicon-o-x-mark aria-hidden="true" class="w-6 h-6 lg:hidden" />
    </x-button>
</div>