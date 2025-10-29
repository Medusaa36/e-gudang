<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data User</title>
  <style>
    body { font-family: "Times New Roman", Times, serif; font-size: 12pt; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid black; padding: 5px; text-align: center; }
    th { background-color: #ffffffff; }
  </style>
</head>
<body>
<h4 style="text-align:center; text-decoration:underline;">DAFTAR USER</h4>

<table>
  <thead>
    <tr>
      <th>No</th>
      <th>NAMA</th>
      <th>EMAIL</th>
      <th>ROLE</th>
    </tr>
  </thead>
  <tbody>
    @foreach($user as $key => $item)
    <tr>
      <td>{{ $key + 1 }}</td>
      <td>{{ $item->nama }}</td>
      <td>{{ $item->email }}</td>
      <td>{{ $item->role }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>
