<div class="p-3 mx-1" style="width: 38%">
    <div >
        <form class="d-flex w-75 mx-5" role="search" method="GET" action="{{route('job.table')}}">
            @csrf
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
    </div>
    <div class="mt-5">
        <img src="{{asset('assets/css/images/join.png')}}" alt="" style="width: 100%">
    </div>
</div>
