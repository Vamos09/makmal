<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ms">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Senarai Makmal TPP</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body.dark-mode {
      background-color: #121212;
      color: #e0e0e0;
    }

    body.dark-mode .table {
      color: #e0e0e0;
    }

    .btn-blue {
      background-color: #0d6efd;
      color: #fff;
    }

    .btn-yellow {
      background-color: #ffc107;
      color: #000;
    }

    .btn-red {
      background-color: #dc3545;
      color: #fff;
    }

    .btn-blue:hover,
    .btn-yellow:hover,
    .btn-red:hover {
      opacity: 0.9;
    }

    .table-bordered th,
    .table-bordered td {
      vertical-align: middle;
      text-align: center;
    }

    .header-title {
      font-weight: 600;
      font-size: 2rem;
    }

    .dark-toggle {
      margin-left: 10px;
    }

    .table-hover tbody tr:hover {
      background-color: #f8f9fa;
    }

    body.dark-mode .table-hover tbody tr:hover {
      background-color: #1e1e1e;
    }

    .shadow-table {
      box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
      border-radius: 10px;
      overflow: hidden;
    }

      @media (max-width: 576px) {
    .header-title {
      font-size: 1.5rem;
    }

    .d-flex.flex-wrap.gap-2 > a,
    .d-flex.flex-wrap.gap-2 > button {
      flex: 1 1 100%;
    }

    td .btn {
      display: block;
      width: 100%;
      margin-bottom: 5px;
    }
  }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="header-title">Senarai Makmal TPP</h1>
      <div class="d-flex flex-wrap gap-2">
        <a href="create.php" class="btn btn-success"><i class="bi bi-plus-lg"></i> Tambah</a>
        <button id="darkToggle" class="btn btn-secondary dark-toggle"><i class="bi bi-moon-stars-fill"></i> Mod Gelap</button>
        <a href="logout.php" class="btn btn-outline-danger"><i class="bi bi-box-arrow-right"></i> Log Keluar</a>
      </div>
    </div>

    <?php foreach (['create', 'update', 'delete'] as $type): ?>
      <?php if (isset($_SESSION[$type])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?= $_SESSION[$type]; unset($_SESSION[$type]); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>

    <div class="table-responsive shadow-table">
      <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Nama Makmal</th>
            <th>PIC Makmal</th>
            <th>Modul</th>
            <th>Pengajar Modul</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include('connect.php');
          $sql = "SELECT * FROM rekod_makmal";
          $result = mysqli_query($conn, $sql);
          if ($result && mysqli_num_rows($result) > 0):
            while ($data = mysqli_fetch_assoc($result)):
          ?>
            <tr>
              <td><?= htmlspecialchars($data['id']) ?></td>
              <td><?= htmlspecialchars($data['namamakmal']) ?></td>
              <td><?= htmlspecialchars($data['picmakmal']) ?></td>
              <td><?= htmlspecialchars($data['modul']) ?></td>
              <td><?= htmlspecialchars($data['pengajarmodul']) ?></td>
              <td>
                <div class="d-flex flex-wrap justify-content-center gap-1">
                  <a href="view.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i></a>
                  <a href="edit.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning text-dark"><i class="bi bi-pencil-square"></i></a>
                  <a href="delete.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Buang rekod ini?')"><i class="bi bi-trash"></i></a>
                </div>
              </td>
            </tr>
          <?php
            endwhile;
          else:
          ?>
            <tr>
              <td colspan="6" class="text-center">Tiada rekod makmal dijumpai.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const toggleBtn = document.getElementById('darkToggle');
    const body = document.body;

    if (localStorage.getItem('darkMode') === 'enabled') {
      body.classList.add('dark-mode');
    }

    toggleBtn.addEventListener('click', () => {
      body.classList.toggle('dark-mode');
      localStorage.setItem('darkMode', body.classList.contains('dark-mode') ? 'enabled' : 'disabled');
    });
  </script>
</body>
</html>
