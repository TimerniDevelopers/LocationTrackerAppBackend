{{-- <tbody>
    @php($i=1)
    @foreach($answers as $answer)
    <?php
    $temp = explode(' ',$answer->created_at);
    ?>
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $answer->first_name ?? '' }}</td>
            <td>{{ $answer->stall_name }}</td>
            <td>{!! date('d-M-y', strtotime($temp[0])) !!}</td>

            <td>{{ date('h:i A', strtotime($temp[1])) }}</td>

            <td> <a href="{{ route('show.maps', ['id'=>$answer->id]) }}" class="btn btn-primary text-white">
                    <span class="fas fa-eye"></span> Show Map
                </a>
                <a href="{{ route('view_answer', ['id'=>$answer->id]) }}" class="btn btn-primary text-white">
                    <span class="fas fa-eye"></span> Show Data
                </a>
            </td>
        </tr>
    @endforeach
    </tbody> --}}
