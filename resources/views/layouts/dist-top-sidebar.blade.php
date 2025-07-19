<div id="stickyHeader" class="sticky-header d-flex align-items-center justify-content-between fw-bold d-none">
    <div class="sticky-header-placeholder"></div>

    <div class="sticky-header-title text-left flex-grow-1">Aplikasi Bimbingan Skripsi</div>

    <div class="sticky-header-icon-right px-3">
        <a href="javascript:void();" class="text-decoration-none" id="logoutStickyIcon"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="las la-share-square fs-3"></i>
        </a>
        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>
