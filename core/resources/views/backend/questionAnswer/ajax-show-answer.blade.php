<table id="table_id" class="table dt-responsive table-bordered table-striped nowrap">
    <thead>
        <tr>
            <th style="font-family: Kalpurush">#</th>
            <th style="font-family: Kalpurush">User/Volunteer Name</th>
            <th style="font-family: Kalpurush">Patient ID</th>
            <th style="font-family: Kalpurush">Patient Name</th>
            <th style="font-family: Kalpurush">Phone</th>
            <th style="font-family: Kalpurush">Date</th>
            <th style="font-family: Kalpurush">Time</th>
            <th style="font-family: Kalpurush">Action</th>
        </tr>
    </thead>

    <tbody>
        @php($i = 1)
        @foreach ($answers as $answer)
            <?php
            $temp = explode(' ', $answer->created_at);
            ?>
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $answer->first_name ?? '' }}</td>
                <td>{{ $answer->unique_id }}</td>
                <td>{{ $answer->name }}</td>
                <td>{{ $answer->phone }}</td>
                <td>{!! date('d-M-y', strtotime($temp[0])) !!}</td>

                <td>{{ date('h:i A', strtotime($temp[1])) }}</td>

                <td> <a href="{{ route('show.maps', ['id' => $answer->id]) }}"
                        class="btn btn-primary text-white">
                        <span class="fas fa-eye"></span> Show Map
                    </a>
                    <a href="{{ route('view_answer', ['id' => $answer->id, 'user_id' => $answer->user_id]) }}"
                        class="btn btn-primary text-white">
                        <span class="fas fa-eye"></span> Show Data
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
