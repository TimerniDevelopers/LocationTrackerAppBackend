<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
     google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([

            ['Task', 'Hours per Day'],
            @foreach($questions as $index => $type)
            <?php
//                $questionAnswer = DB::table('question_answer')
//                    ->join('user_questions', 'question_answer.user_question_id', '=', 'user_questions.id')
//                    ->join('users', 'user_questions.user_id', '=', 'users.id')
//                    ->select('question_answer.question_id')
//                    ->where('question_answer.question_id', $type->id)
//                    ->where('users.upazilla_id', Auth::guard('admin')->user()->upazilla_id)
//                    ->count();
                $questionAnswer = DB::table('users')
                    ->join('user_questions', 'users.id', '=', 'user_questions.user_id')
                    ->join('question_answer', 'user_questions.id', '=', 'question_answer.user_question_id')
                    ->select('question_answer.question_id')
                    ->where('users.upazilla_id', Auth::guard('admin')->user()->upazilla_id)
                    ->where('question_answer.question_id', $type->id)
                    ->count();
//                dd($questionAnswer);
            ?>
                @if($loop->last)
                    ['{{$type->name}}',    {{ $questionAnswer }}]
                @else
                    ['{{$type->name}}',    {{ $questionAnswer }}],
                @endif
            @endforeach
        ]);

        var options = {
          title: 'Question Answer Analytics'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
