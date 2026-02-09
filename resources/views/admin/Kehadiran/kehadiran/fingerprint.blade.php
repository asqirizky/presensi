<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Absensi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: linear-gradient(-45deg, #0f2027, #203a43, #2c5364);
      background-size: 300% 300%;
      animation: gradientMove 10s ease infinite;
      font-family: 'Segoe UI', sans-serif;
    }
    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
    .glass-card {
      background: rgba(30, 30, 30, 0.6);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      border-radius: 14px;
      border: 1px solid rgba(255, 255, 255, 0.15);
      box-shadow: 0 0 20px rgba(0, 255, 255, 0.15);
      padding: 1.5rem;
      width: 100%;
      max-width: 300px;
      animation: fadeIn 0.8s ease-in-out;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(15px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .form-control {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(0, 255, 255, 0.2);
      color: #fff;
      font-weight: 500;
      text-align: center;
      height: 45px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 255, 255, 0.1);
      transition: 0.3s ease;
    }
    .form-control:focus {
      background: rgba(255, 255, 255, 0.12);
      border-color: rgba(0, 255, 255, 0.5);
      box-shadow: 0 0 15px rgba(0, 255, 255, 0.4);
      outline: none;
    }
    ::placeholder {
      color: rgba(255, 255, 255, 0.6);
    }
    .btn-primary {
      background: linear-gradient(135deg, rgba(204, 247, 247, 0.3), rgba(0,128,255,0.4));
      border: 1px solid rgba(0, 255, 255, 0.3);
      color: #fff;
      font-weight: 600;
      height: 45px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(23, 194, 194, 0.3);
      transition: all 0.3s ease;
    }
    .btn-primary:hover {
      background: linear-gradient(135deg, rgba(0,255,255,0.5), rgba(0,128,255,0.6));
      box-shadow: 0 0 20px rgba(0, 255, 255, 0.6);
      transform: scale(1.03);
    }
  </style>
</head>
<body>
  <div class="glass-card">
    <form method="GET" action="">
      <div class="mb-3">
        <input type="text" name="nik" class="form-control" placeholder="Submit Here" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
  </div>
</body>
</html>
