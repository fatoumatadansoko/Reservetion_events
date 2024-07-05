@if ($paginator->hasPages())
    <nav>
        <ul class="pagination d-flex justify-content-end mt-4">
            {{-- Lien vers la page précédente --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true"><</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><</a>
                </li>
            @endif

            {{-- Affichage de la page actuelle et du nombre total de pages --}}
            <li class="page-item disabled">
                <span class="page-link">{{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}</span>
            </li>

            {{-- Lien vers la page suivante --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">></a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
