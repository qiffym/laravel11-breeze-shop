@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 bg-white border rounded-md cursor-default text-zinc-500 border-zinc-300 dark:text-zinc-600 dark:bg-zinc-800 dark:border-zinc-600">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 transition duration-150 ease-in-out bg-white border rounded-md text-zinc-700 border-zinc-300 hover:text-zinc-500 focus:outline-none focus:ring ring-zinc-300 focus:border-blue-300 active:bg-zinc-100 active:text-zinc-700 dark:bg-zinc-800 dark:border-zinc-600 dark:text-zinc-300 dark:focus:border-blue-700 dark:active:bg-zinc-700 dark:active:text-zinc-300">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 transition duration-150 ease-in-out bg-white border rounded-md text-zinc-700 border-zinc-300 hover:text-zinc-500 focus:outline-none focus:ring ring-zinc-300 focus:border-blue-300 active:bg-zinc-100 active:text-zinc-700 dark:bg-zinc-800 dark:border-zinc-600 dark:text-zinc-300 dark:focus:border-blue-700 dark:active:bg-zinc-700 dark:active:text-zinc-300">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 bg-white border rounded-md cursor-default text-zinc-500 border-zinc-300 dark:text-zinc-600 dark:bg-zinc-800 dark:border-zinc-600">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
