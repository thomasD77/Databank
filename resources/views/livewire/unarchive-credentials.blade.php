<div class="parent">
    @include('admin.includes.flash')
    <table class="table table-striped table-hover table-vcenter fs-sm">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Client</th>
            <th scope="col">Host</th>
            <th scope="col">Subject</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($subjects)
            @foreach($subjects as $subject)
                <tr>
                    <td>{{$subject->id ? $subject->id : 'No ID'}}</td>
                    <td>{{$subject->client ? $subject->client->name : 'No Name'}}</td>
                    <td>{{$subject->host ? $subject->host : 'No Host'}}</td>
                    <td>{{$subject->subject ? $subject->subject : 'No Subject'}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-alt-secondary" wire:click="unArchiveSubject({{$subject->id}})"><i class="si si-refresh "></i></button>
                            <a href="{{route('credentials.show', $subject->id)}}">
                                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Show subject">
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
    {!! $subjects->links()  !!}
</div>



