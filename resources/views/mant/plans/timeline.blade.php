<x-app-layout>
    <div class="card">
        <div class="card-body">
            <table id="plan" class="">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Task</th>
                        <th>Team</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($timelines as $goal)
                    <tr>
                        <td width="30%">
                            <div>
                                <p class="text-gray-700 font-bold text-base">
                                    {{$rest_start->format('h:i A').'-'.$rest_end->format('h:i A')}}
                                    {{$goal->start->format('h:i A')}}
                                    {{$goal->start->format('h:i A')}}

                                </p>
                            </div>
                        </td>
                        <td width="40%">
                            <div>
                                <p class="text-gray-700 font-bold text-base">{{$goal->task}}</p>
                            </div>
                        </td>
                        <td width="30%">
                            <div>
                                <p class="text-gray-700 font-bold text-base">{{$goal->specialty()}}</p>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>