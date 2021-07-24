<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
     google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([

            ['Task', 'Hours per Day'],
            @foreach($questions as $index => $type)
            <?php
                $questionAnswer = DB::table('question_answer')->where('question_id', $type->id)->count();
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

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
     google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([

            ['Task', 'Hours per Day'],
            @foreach($questions as $index => $type)
            <?php
                $questionAnswer = DB::table('question_answer')->where('question_id', $type->id)->count();
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

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
      }
    </script>
