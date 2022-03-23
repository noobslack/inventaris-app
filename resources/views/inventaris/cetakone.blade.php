<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<style>
    body {
        font-size: 18px;
        font-family: Arial, Helvetica, sans-serif;
    }

    th {
        text-align: start;
    }

    .page-break {
        page-break-after: always;
    }

</style>

<body>
    <table class="center" border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th>Nama Barang</th>
            <td>{{ $inventaris->nama_barang }}</td>
        </tr>
        <tr>
            <th>Kode Barang</th>
            <td>{!! DNS1D::getBarcodeHTML($inventaris->kode_barang, 'C39') !!}</td>
        </tr>
    </table>
</body>

</html>
