<!-- Pagination -->
<div class="row">
    @if ($blogs->hasPages())
        <div class="d-flex justify-content-center">
            {{ $blogs->links('pagination::default') }}
        </div>
    @endif
</div>