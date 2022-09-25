<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">CNE</th>
            <th scope="col">FirstName</th>
            <th scope="col">SecondName</th>
            <th scope="col">Age</th>
            <th scope="col">Speciality</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
            <td>{{$student -> cne}}</td>
            <td>{{$student -> firstname}}</td>
            <td>{{$student -> secondname}}</td>
            <td>{{$student -> age}}</td>
            <td>{{$student -> speciality}}</td>
            <td><a href="{{url('/update/'.$student -> id)}}" class="btn btn-sm btn-warning">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>