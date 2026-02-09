<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Room absensi pegawai</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background-image: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=1920&q=80');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }
  </style>
</head>

<body class="relative flex items-center justify-center min-h-screen">

  <!-- Overlay warna biru elegan -->
  <div class="absolute inset-0 bg-blue-800/75 backdrop-blur-sm"></div>

  <!-- Form Card -->
  <div class="relative z-10 w-full max-w-md p-10 text-center shadow-2xl bg-white/10 backdrop-blur-md rounded-2xl">
    <!-- Logo -->
    <h1 class="flex items-center justify-center gap-2 mb-8 text-3xl font-bold text-white">
      <span class="px-2 py-1 text-blue-700 bg-white rounded">lib</span>
      <span>Ibrahimy</span>
    </h1>

    <!-- Form -->
    <form class="form" method="POST" action="{{ route('admin.kehadiran-absen.store') }}">
      @csrf
      <!-- Input NIK -->
      <div>
        <input type="text" name="nik" placeholder="Absent Here"
          required
          class="w-full px-4 py-3 text-center rounded-lg bg-white/90 focus:outline-none focus:ring-2 focus:ring-blue-400" />
      </div>

      <!-- Button -->
      <div class="flex justify-center mt-4">
        <button type="submit"
          class="px-6 py-2 font-semibold text-blue-700 transition bg-white rounded-lg hover:bg-blue-100">
          Submit
        </button>
      </div>
    </form>

    <!-- Footer -->
    <p class="mt-8 text-xs text-white/80">
      © 2025 by asqirizky & IT Developer Library Team
    </p>
  </div>

  <!-- SweetAlert Notification -->
  @if (session('success'))
    <script>
      Swal.fire({
        title: 'Alhamdulillah!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK',
        confirmButtonColor: '#2563eb'
      });
    </script>
  @endif

  @if (session('error'))
    <script>
      Swal.fire({
        title: 'Astaghfirullah!',
        text: '{{ session('error') }}',
        icon: 'error',
        confirmButtonText: 'OK',
        confirmButtonColor: '#dc2626'
      });
    </script>
  @endif

</body>
</html>
