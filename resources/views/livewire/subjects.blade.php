<div class="parent">
    @include('admin.includes.flash')
    <table class="table table-striped table-hover table-vcenter fs-sm">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Registered</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @if($subjects)
            @foreach($subjects as $subject)
                <tr>
                    <td>{{$subject->id ? $subject->id : 'No ID'}}</td>
                    <td>{{$subject->name ? $subject->name : 'No Name'}}</td>
                    <td>{{$subject->created_at ? $subject->created_at->diffForHumans() : 'Not Verified'}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{route('subjects.edit', $subject->id)}}">
                                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit subject">
                                    <i class="fa fa-fw fa-pencil-alt"></i>
                                </button>
                            </a>
                            <button class="btn btn-sm btn-alt-secondary" wire:click="archiveSubject({{$subject->id}})"><i class="fa fa-archive"></i></button>
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
