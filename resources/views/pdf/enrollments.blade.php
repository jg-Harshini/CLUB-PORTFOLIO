<!DOCTYPE html>
<html>
<head>
    <title>Student Registrations</title>
    <style>
@page {
    margin: 10px; /* You can reduce further if needed */
}

body {
    font-family: Arial, sans-serif;
    font-size: 12px;
    margin: 0; /* Remove browser default body margin */
    padding: 0;
}


        .header {
            text-align: center;
        }

        .header img {
            height: 80px;
            width: 400px;
        }

        h2 {
            text-align: center;
           text-transform: uppercase;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('/img/tce.jpg') }}" alt="Logo">
<h2 class="text-center fw-bold">
    @if($filterType === 'clubadmin')
        @if(isset($filterValue['dept']))
            Student Enrollment for {{ $filterValue['club'] }} Club - {{ $filterValue['dept'] }} Department
        @else
            Student Enrollment for {{ $filterValue['club'] }} Club
        @endif
    @elseif($filterType === 'club')
        Student Registrations for {{ $filterValue }} Club
    @elseif($filterType === 'dept')
        Student Registrations for {{ $filterValue }} Department
    @elseif($filterType === 'both')
        Student Registrations for {{ $filterValue['club'] }} Club, {{ $filterValue['dept'] }} Department
    @else
        Overall Student Enrollment
    @endif
</h2>


    </div>

    <table>
        <thead>
    <tr>
        @if($filterType === 'clubadmin')
            <th>Roll No</th>
            <th>Name</th>
            <th>Department</th>
            <th>Created At</th>
            <th>Updated At</th>
        @else
            <th>ID</th>
            <th>Name</th>
            <th>Roll No</th>
            <th>Email</th>
            @if (!in_array($filterType, ['dept', 'both']))
                <th>Department</th>
            @endif
            @if (!in_array($filterType, ['club', 'both']))
                <th>Clubs</th>
            @endif
            <th>Registered At</th>
        @endif
    </tr>
</thead>
<tbody>
    @foreach ($students as $s)
        <tr>
            @if($filterType === 'clubadmin')
                <td>{{ $s->roll_no }}</td>
                <td>{{ $s->name }}</td>
                <td>{{ $s->department }}</td>
                <td>{{ $s->created_at ? $s->created_at->format('d-m-Y H:i') : 'N/A' }}</td>
                <td>{{ $s->updated_at ? $s->updated_at->format('d-m-Y H:i') : 'N/A' }}</td>
            @else
                <td>{{ $s->id }}</td>
                <td>{{ $s->name }}</td>
                <td>{{ $s->roll_no }}</td>
                <td>{{ $s->email }}</td>
                @if (!in_array($filterType, ['dept', 'both']))
                    <td>{{ $s->department }}</td>
                @endif
                @if (!in_array($filterType, ['club', 'both']))
                    <td>
                        @foreach ($s->clubs as $club)
                            {{ $club->club_name }}@if (!$loop->last), @endif
                        @endforeach
                    </td>
                @endif
                <td>{{ $s->created_at ? $s->created_at->format('d-m-Y H:i') : 'N/A' }}</td>
            @endif
        </tr>
    @endforeach
</tbody>

    </table>
</body>
</html>
