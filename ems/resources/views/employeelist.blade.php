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
            margin-top: 2px;
            margin-bottom: -2px;
            padding: 10px;
            
            color: rgb(141, 138, 138)
        }
        .employee-table {
            margin-bottom: 2px;
        }

        
        tr:hover {
            background-color: #e0f2f7; /* Slightly lighter blue on hover */
        }
        .edit-button {
            background-color: #000080; /* Dark blue button */
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
        }
        .edit-button:hover {
            background-color: #4169e1; /* Royal blue on hover */
        }
    </style>
</head>
<body>

    <h1>LIST OF EMPLOYEES IN THE DIFFERENT DEPARTMENTS</h1>

    @foreach ($employeesByDepartment as $departmentName => $employees)
        <div class="employee-table">
            <h2 class="department-header">{{ $departmentName }} Department</h2>
            <table>
                
                    <tr>
                        @foreach (array_keys($employees->first()->toArray()) as $attribute)
                            @if ($attribute !== 'id'&& $attribute !== 'password')
                                @if ($attribute !== 'created_at'&& $attribute !== 'updated_at')
                                <th>{{ ucfirst(str_replace('_', ' ', $attribute)) }}</th>
                                    
                                @endif
                                @if ( $attribute == 'created_at')
                                <th>Registerd On</th>
                                @endif
                                @if ( $attribute == 'updated_at')
                                    <th>Updated On</th>
                                @endif
                            @endif
                            @if($attribute=='id')
                            @if($T==1)
                            <th>
                                EDIT
                            </th>
                            @endif
                            @endif
                        @endforeach
                    </tr>
                

                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            @foreach ($employee->toArray() as $key => $value)
                                @if ($key !== 'id' && $key != 'password')
                                    <td>{{ $value }}</td>
                                @endif
                                {{-- @if ($key == 'updated_at' || $key = 'created_at')           &&$key !== 'updated_at' && $key != 'created_at'
                                <td>{{ \Carbon\Carbon::parse( $employee->created_at)->format('Y-m-d \a\t H:i:s') }}</td>
                               @endif --}}
                                
                               @if($key=='id')
                               @if($T==1)
                               <td>
                                   <a href="{{ route('editing', $value)}}" class="edit-button">Edit</a>
                               </td>                       
                               @endif
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