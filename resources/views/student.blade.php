<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- changed title -->
    <title>CRUD Laravel Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        <!-- bootstrap icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>
<body>
    @if($layout == 'index')
    <div class="container-fluid">
        <div class="row">
            <section class="col">
                <!--wea addding the stu--->
                @include("studentlist")
            </section>
            <section class="col">
                <form action="{{url('/store')}}" method="POST">
                    <!--to avoid forgery we write that codebelow-->
                    @csrf
                    <div class=" form-group">
                        <label for="cne">CNE</label>
                        <input type="text" name="cne" class="form-control" placeholder="Enter CNE">
                    </div>
                    <div class="form-group">
                        <label for="firstname">FirstName</label>
                        <input type="text" name="firstname" class="form-control" placeholder="Enter Firstname">
                    </div>
                    <div class="form-group">
                        <label for="lastname">LastName</label>
                        <input type="text" name="secondname" class="form-control" placeholder="Enter Lastname">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" name="age" class="form-control" placeholder="Enter Age">
                    </div>
                    <div class="form-group">
                        <label for="speciality">Speciality</label>
                        <input type="text" name="speciality" class="form-control" placeholder="EnterSpeciality">
                    </div>

                    <!-- changed button text to create student when layout = index -->
                    <input type="submit" class="btn btn-info" value="Create student">

                    <!-- commenting out reset button since not needed -->
                    <!--<input type="reset" class="btn btn-warning">-->
                </form>
            </section>
        </div>
        @elseif($layout == 'show')
        <div class="container-fluid">
            <div class="row">
                <section class="col">@include("studentlist")</section>
                <section class="col">
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
                           
                        </tbody>
                    </table>
                </section> 
            </div>
        </div>
        @elseif($layout == 'edit')
        <!-- added a row class -->
        <div class="container-fluid row">
            <section class="col">@include("studentlist")</section>

            <!-- next next section was initially empty. Added an update form for when layout = edit -->
            <section class="col">
                <section class="col">
                    <form action="/update/{{$student->id}}" method="POST">
                        <!--to avoid forgery we write that codebelow-->
                        @csrf
                        <div class=" form-group">
                            <label for="cne">CNE</label>
                            <input value="{{$student->cne}}" type="text" name="cne" class="form-control" placeholder="Enter CNE">
                        </div>
                        <div class="form-group">
                            <label for="firstname">FirstName</label>
                            <input value="{{$student->firstname}}" type="text" name="firstname" class="form-control" placeholder="Enter Firstname">
                        </div>
                        <div class="form-group">
                            <label for="lastname">LastName</label>
                            <input value="{{$student->secondname}}" type="text" name="secondname" class="form-control" placeholder="Enter Lastname">
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input value="{{$student->age}}" type="text" name="age" class="form-control" placeholder="Enter Age">
                        </div>
                        <div class="form-group">
                            <label for="speciality">Speciality</label>
                            <input value="{{$student->speciality}}" type="text" name="speciality" class="form-control" placeholder="EnterSpeciality">
                        </div>

                        <!-- changed button text to update -->
                        <input type="submit" class="btn btn-info" value="Update">
                        <!-- commenting out reset button since not needed -->
                        <!-- <input type="reset" class="btn btn-warning"> -->
                    </form>
                </section>
            </section>
        </div>

       <!-- no need for the update route endpoint anymore -->
        @elseif($layout == 'update')
        <div class="container-fluid">
            <div class="row">
                <section class="col">@include("studentlist")</section>
                <section class="col">
                
                    <form action="{{url('/update/'.$student -> id)}}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="cne">CNE</label>
                            <input type="text" name="cne" value="{{$student -> cne}}" class="form-control" placeholder="Enter CNE">
                        </div>
                        <div class="form-group">
                            <label for="firstname">FirstName</label>
                            <input type="text" name="firstname" value="{{$student -> firstname}}" class="form-control" placeholder="Enter FirstName">
                        </div>
                        <div class="form-group">
                            <label for="secondname">SecondName</label>
                            <input type="text" name="secondname" value="{{$student -> secondname}}" class="form-control" placeholder="Enter SecondName">
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="text" name="age" class="form-control" value="{{$student -> age}}" placeholder="Enter Age">
                        </div>
                        <div class="form-group">
                            <label for="speciality">Speciality</label>
                            <input type="text" name="speciality" value="{{$student -> speciality}}" class="form-control" placeholder="EnterSpeciality">
                        </div>
                        <input type="submit" class="btn btn-danger">
                        <input type="reset" class="btn btn-warning">
                    </form>
                </section>
            </div>
        </div>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>