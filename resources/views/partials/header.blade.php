<header class="app-header">
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
      <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
        <li class="nav-item dropdown">
          <a class="nav-link d-flex align-items-center gap-2" href="#" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="User" width="35" height="35" class="rounded-circle">
            <span class="text-dark fw-semibold fs-3">{{ auth()->user()->name }}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
            <div class="message-body">
              <a href="#" class="d-flex align-items-center gap-2 dropdown-item">
                <i class="ti ti-user fs-6"></i>
                <p class="mb-0 fs-3">My Profile</p>
              </a>

              <button type="button" class="btn btn-outline-danger mx-3 mt-2 d-block"
                      onclick="confirmLogout()">Logout</button>

              {{-- Hidden Logout Form --}}
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>

{{-- SweetAlert2 CDN & Script --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function confirmLogout() {
    Swal.fire({
      title: 'Yakin ingin logout?',
      text: "Kamu akan keluar dari sesi login!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Ya, logout',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('logout-form').submit();
      }
    });
  }
</script>
