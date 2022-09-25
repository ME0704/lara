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
            <td><a href="/show/{{$student->id}}">{{$student -> firstname}}</a></td>
            <td>{{$student -> secondname}}</td>
            <td>{{$student -> age}}</td>
            <td>{{$student -> speciality}}</td>

            <!-- changed the link to EDIT route instead of the pre-existing UPDATE route -->
            <td><a href="/edit/{{$student -> id}}" class="btn btn-sm btn-warning">Edit</a></td>

            <!-- added a delete form -->
            <td>
                <form action="/delete/{{$student->id}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>