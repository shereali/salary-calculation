<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Salary Calculatiion</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mt-5">
               <div class="card">
                   <div class="card-body">
                    <form action="{{ route('salary-calculator') }}" class="form" method="POST">
                        @csrf
                    <div class="form-group">
                        <label for="">Employee</label>
                        <select name="name" class="form-control">
                            <option value="0">Select Employee</option>
                            <option value="Jamal">Jamal</option>
                            <option value="Kamal">Kamal</option>
                            <option value="Hasan">Hasan</option>
                            <option value="Jamil">Jamil</option>
                            <option value="Farid">Farid</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Month</label>
                        <select name="month" id="month" class="form-control">
                            <option value="0">Select Month</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                    <div class="form-group show_div">
                        <label for="">Last year revenue [This section for Financial Year Revenue share]</label>
                        <input type="text" class="form-control" name="revenue" placeholder="E.G. 20000000">
                    </div>
                    <div class="form-group show_div">
                        <label for="">Total Employee</label>
                        <input type="text" class="form-control" placeholder="E.G. 50" name="total_employee">
                    </div>
                    <div class="form-group">
                        <label for="">Basic Salary</label>
                        <input type="text" placeholder="E.G. 30000" class="form-control" name="salary">
                    </div>
                    <button type="submit" class="btn btn-md btn-primary">Calculate Now</button>
                </form>
                   </div>
               </div>
            </div>
            <div class="col-md-7">
                @if(session()->has('name'))
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Month</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ session('name') }}</td>
                            <td>{{ session('month') }}</td>
                            <td>{{ round(session('total_salary')) }}</td>
                        </tr>
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            $('.show_div').hide();
           $('#month').on('change', function(){
            var $month = $(this).val();
            if($month == "January"){
                $('.show_div').show();
            } else {
                $('.show_div').hide();
            }
           });
        });
    </script>
</body>
</html>