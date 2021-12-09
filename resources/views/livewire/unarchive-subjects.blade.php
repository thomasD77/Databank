<div class="block-content block-content-full overflow-scroll parent">
    @include('admin.includes.flash')
    <table class="table table-striped table-hover table-vcenter fs-sm">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
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
                    <td>{{$subject->subjectcategory ? $subject->subjectcategory->name : 'No Category'}}</td>
                    <td>{{$subject->created_at ? $subject->created_at->diffForHumans() : 'Not Verified'}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-alt-secondary" wire:click="unArchiveSubject({{$subject->id}})"><i class="si si-refresh "></i></button>
                            <a href="{{route('subjects.show', $subject->id)}}">
                                <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit subject">
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
