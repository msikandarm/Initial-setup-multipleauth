<!DOCTYPE html>
<html>
<head>
    <title>Product Description</title>
    <style>
        table.table-bordered > thead > tr > th{
          border:1px solid #a1a1a1;
          padding: 4px;
          text-align: left;
        }
        table.table-bordered > thead > tr > td{
          border:1px solid #a1a1a1;
          padding: 4px;
          text-align: left;
        }
        .table{
            width: 100%;
        }
        </style>
</head>
<body>
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th>Name</th>
                <td>{{ $pdf->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$pdf->email }}</td>
            </tr>
            <tr>
                <th>Phone No</th>
                <td>{{ $pdf->phone }}</td>
            </tr>
            <tr>
                <th>Links</th>
                <td>{{ $pdf->link }}</td>
            </tr>
        </thead>
    </table>
   {!! $product->description !!}
</body>
</html>
