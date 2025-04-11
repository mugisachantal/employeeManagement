<!DOCTYPE html>
<html>
<head>
    <title>Employee List by Department</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .department-header {
            font-size: 1.2em;
            font-weight: bold;
            background-color: #e0f7fa;
            margin-top: 20px;
            padding: 10px;
        }
        .employee-table {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <h1>Employee List Grouped by Department</h1>

    @foreach ($employeesByDepartment as $departmentName => $employees)
        <div class="employee-table">
            <h2 class="department-header">{{ $departmentName }}</h2>
            <table>
                <thead>
                    <tr>
                        @foreach (array_keys($employees->first()->toArray()) as $attribute)
                            @if ($attribute !== 'id')
                                <th>{{ ucfirst(str_replace('_', ' ', $attribute)) }}</th>
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            @foreach ($employee->toArray() as $key => $value)
                                @if ($key !== 'id')
                                    <td>{{ $value }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach

</body>
</html>