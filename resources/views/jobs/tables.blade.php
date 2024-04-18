<div class=" p-1 mx-1" style="width: 60%">
    <div>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">Date and Time</th>
                    <th scope="col">Job Offer</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                <tr>
                    <td>{{$job->created_at}}</td>
                    <td>{{$job->job}}</td>
                    <td><a class="btn btn-primary btn-sm" href="{{route('job.details', $job->id )}}">Details</a></td>
                    <td><a class="btn btn-success btn-sm" href="{{route('apply.create', $job->id )}}">Apply now</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $jobs->links() }}
    </div>
</div>
