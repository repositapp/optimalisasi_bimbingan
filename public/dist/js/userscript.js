document.addEventListener('DOMContentLoaded', () => {
    console.log('Dashboard Mahasiswa loaded!');

    const stickyHeader = document.getElementById('stickyHeader');
    // Pastikan dashboardHeader ada sebelum mengambil offsetHeight
    const dashboardHeader = document.querySelector('.dashboard-header');
    let headerHeight = 0;
    if (dashboardHeader) {
        headerHeight = dashboardHeader.offsetHeight;
        // Recalculate header height on window resize, only if dashboardHeader exists
        window.addEventListener('resize', () => {
            headerHeight = dashboardHeader.offsetHeight;
        });
    }


    window.addEventListener('scroll', () => {
        // Logika sticky header hanya berjalan jika stickyHeader ada di halaman
        if (stickyHeader) {
            if (window.scrollY > headerHeight - 20) { // -20 for a slight buffer
                stickyHeader.classList.add('show');
                stickyHeader.classList.remove('d-none');
            } else {
                stickyHeader.classList.remove('show');
                setTimeout(() => {
                    if (!stickyHeader.classList.contains('show')) {
                        stickyHeader.classList.add('d-none');
                    }
                }, 300); // Match CSS transition duration
            }
        }
    });

    // Logic to set active class on navigation items
    const navItems = document.querySelectorAll('.navbar .nav-item');
    const currentPath = window.location.pathname.split('/').pop(); // Get current file name (e.g., "index.html" or "profile.html")

    navItems.forEach(item => {
        // Hapus e.preventDefault() agar link berfungsi normal
        // item.addEventListener('click', function(e) {
        //     e.preventDefault(); // <-- INI YANG DIHAPUS ATAU DIKOMENTARI
        //
        //     // Logika ini sekarang tidak perlu dijalankan on click karena halaman akan di-reload
        //     // navItems.forEach(nav => nav.classList.remove('active'));
        //     // this.classList.add('active');
        //     // console.log(`Nav item clicked: ${this.querySelector('span').textContent}`);
        //     // window.location.href = this.href; // Ini akan terjadi secara otomatis oleh browser
        // });

        // Tetapkan kelas 'active' saat halaman dimuat berdasarkan URL
        const itemHref = item.getAttribute('href');
        if (itemHref) {
            const itemPath = itemHref.split('/').pop();
            if (itemPath === currentPath) {
                item.classList.add('active');
            } else {
                item.classList.remove('active'); // Pastikan yang lain tidak aktif
            }
        }
    });
});