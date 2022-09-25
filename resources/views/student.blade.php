<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
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
                    <input type="submit" class="btn btn-info">
                    <input type="reset" class="btn btn-warning">
                </form>
            </section>
        </div>
        @elseif($layout == 'show')
        <div class="container-fluid">
            <div class="row">
                <section class="col">@include("studentlist")</section>
                <section class="col"></section> 
            </div>
        </div>
        @elseif($layout == 'edit')
        <div class="container-fluid">
            <section class="col">@include("studentlist")</section>
            <section class="col"></section>
        </div>
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