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
                        <td width="10%">
                            <div>
                                <p class="text-gray-700 font-bold text-base">{{$goal->id}}-{{$goal->position}}</p>
                            </div>
                        </td>
                        <td width="60%">
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