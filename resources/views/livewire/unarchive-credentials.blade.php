<div class="parent">
    @include('admin.includes.flash')
    <table class="table table-striped table-hover table-vcenter fs-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Client</th>
            <th scope="col">Host</th>
            <th scope="col">credential</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($credentials)
            @foreach($credentials as $credential)
                <tr>
                    <td>{{$credential->id ? $credential->id : 'No ID'}}</td>
                    <td>{{$credential->client ? $credential->client->name : 'No Name'}}</td>
                    <td>{{$credential->host ? $credential->host : 'No Host'}}</td>
                    <td>{{$credential->credential ? $credential->credential : 'No credential'}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-alt-secondary" wire:click="unArchiveCredential({{$credential->id}})"><i class="si si-refresh "></i></button>
                            <a href="{{route('credentials.show', $credential->id)}}">
                                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Show credential">
                                    <i class="far fa-eye"></i>
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
    {!! $credentials->links()  !!}
</div>



