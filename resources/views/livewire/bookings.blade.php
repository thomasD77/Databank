<div class="parent">
    @include('admin.includes.flash')
    <table class="table table-striped table-hover table-vcenter fs-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Client</th>
            <th scope="col">Host</th>
            <th scope="col">Login</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($bookings)
            @foreach($bookings as $booking)
                <tr>
                    <td>{{$booking->id ? $booking->id : 'No ID'}}</td>
                    <td>{{$booking->client ? $booking->client->name : 'No Name'}}</td>
                    <td>{{$booking->host ? $booking->host : 'No Host'}}</td>
                    <td>{{$booking->login ? $booking->login : 'No Login'}}</td>
                    <td>
                        <a href="{{route('bookings.show', $booking->id)}}">
                            <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Show booking">
                                <i class="far fa-eye"></i>
                            </button>
                        </a>
                        <button class="btn btn-sm btn-alt-secondary"
                                wire:click="archiveBooking({{$booking->id}})">
                            <i class="fa fa-archive"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
    {!! $bookings->links()  !!}
</div>

