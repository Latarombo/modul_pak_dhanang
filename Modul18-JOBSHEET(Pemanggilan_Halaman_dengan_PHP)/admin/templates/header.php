<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Portal.ID</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
    }

    /* Sidebar */
    .sidebar {
      width: 220px;
      background: #2c3e50;
      color: white;
      min-height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 100;
    }

    .sidebar h2 {
      text-align: center;
      padding: 15px 0;
      margin: 0;
      font-size: 1.1rem;
      border-bottom: 1px solid #34495e;
    }

    .sidebar a {
      display: block;
      padding: 12px 16px;
      color: white;
      text-decoration: none;
      font-size: 0.9rem;
    }

    .sidebar a:hover {
      background: #34495e;
    }

    .sidebar a.active {
      background: #1abc9c;
    }

    /* Main layout */
    .main {
      margin-left: 220px;
      flex: 1;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      width: calc(100% - 220px);
    }

    /* Content */
    .content {
      flex: 1;
      padding: 24px;
      background: #f8f9fa;
    }

    /* Footer */
    .footer {
      background: #eee;
      padding: 10px;
      text-align: center;
      font-size: 0.85rem;
      color: #666;
    }

    /* Table */
    .table th {
      background: #f1f1f1;
    }

    /* Modal image preview */
    #previewImg, #newPreviewImg {
      max-height: 200px;
      object-fit: cover;
    }
  </style>
</head>

<body>
