<?php require '../resources/inc/_global/config.php'; ?>
<?php require '../resources/inc/backend/config.php'; ?>
<?php require '../resources/inc/_global/views/head_start.php'; ?>
<?php require '../resources/inc/_global/views/head_end.php'; ?>
<?php require '../resources/inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-primary-dark" style="background-image: url({{asset('images/general/banner6.png')}}); background-size: cover  ; background-repeat: no-repeat ">
        <div class="content content-full text-center">
            <div class="my-3">
                <img class="rounded-circle border border-white border border-3" height="80" width="80" src="{{Auth::user()->avatar ? asset('/') . Auth::user()->avatar->file : 'http://placehold.it/62x62'}}" alt="{{Auth::user()->name}}">
            </div>
            <h1 class="h2 text-white mb-0">Client</h1>
            <h2 class="h4 fw-normal text-white-75">
                <?php echo Auth::user()->name; ?>
            </h2>
            <a class="btn btn-alt-secondary" href="{{ route('clients.index') }}">
                <i class="fa fa-fw fa-arrow-left text-danger"></i> Back to Clients
            </a>
        </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="">

    <!-- Block Tabs Animated Slide Right -->
    <div class="block block-rounded">
        <ul class="nav nav-tabs nav-tabs-block" role="tablist">

            <li class="nav-item">
                <button class="nav-link" id="btabs-animated-slideright-home-tab" data-bs-toggle="tab" data-bs-target="#btabs-animated-slideright-home" role="tab" aria-controls="btabs-animated-slideright-home" aria-selected="true">Information</button>
            </li>

            <li class="nav-item">
                <button class="nav-link" id="btabs-animated-slideright-profile-tab" data-bs-toggle="tab" data-bs-target="#btabs-animated-slideright-profile" role="tab" aria-controls="btabs-animated-slideright-profile" aria-selected="false">Address</button>
            </li>

            <li class="nav-item">
                <button class="nav-link" id="btabs-animated-slideright-contact-tab" data-bs-toggle="tab" data-bs-target="#btabs-animated-slideright-contact" role="tab" aria-controls="btabs-animated-slideright-contact" aria-selected="false">Credentials</button>
            </li>

            <li class="nav-item">
                <button class="nav-link active" id="btabs-animated-slideright-docs-tab" data-bs-toggle="tab" data-bs-target="#btabs-animated-slideright-docs" role="tab" aria-controls="btabs-animated-slideright-docs" aria-selected="false">Docs</button>
            </li>
        </ul>
        <div class="block-content tab-content overflow-hidden">
            <div class="tab-pane fade fade-right show" id="btabs-animated-slideright-home" role="tabpanel" aria-labelledby="btabs-animated-slideright-home-tab">
                <!-- Client Profile -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Client Profile</h3>
                    </div>
                    <div class="block-content">
                        <div class="row push">
                            <div class="col-lg-4">
                                <p class="fs-sm text-muted">
                                    Here you can Check your Happy Client.
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">

                                <div class="form-group mb-4">
                                    {!! Form::label('firstname','Name:',['class'=>'form-label']) !!}
                                    {!! Form::label('firstname',$client->name ,['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group mb-4">
                                    {!! Form::label('email','E-mail:', ['class'=>'form-label']) !!}
                                    {!! Form::label('email',$client->email,['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group mb-4">
                                    {!! Form::label('remarks','Remarks:',['class'=>'form-label']) !!}
                                    {!! Form::label('remarks',$client->remarks ,['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Client Profile -->
            </div>
            <div class="tab-pane fade fade-right" id="btabs-animated-slideright-profile" role="tabpanel" aria-labelledby="btabs-animated-slideright-profile-tab">
                <!-- Address Information -->
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Address Information</h3>
                        </div>
                        <div class="block-content">
                            <div class="row push">
                                <div class="col-lg-4">
                                    <p class="fs-sm text-muted">
                                        Address information for your Happy Client.
                                    </p>
                                </div>
                                <div class="col-lg-8 col-xl-5">
                                    @if($client->billing)
                                    <div class="form-group mb-4">
                                        {!! Form::label('company','Company (Optional):',['class'=>'form-label']) !!}
                                        {!! Form::label('company',$client->billing->company,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group mb-4">
                                        {!! Form::label('firstname','Firstname:',['class'=>'form-label']) !!}
                                        {!! Form::label('firstname',$client->billing->firstname,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group mb-4">
                                        {!! Form::label('lastname','Lastname:',['class'=>'form-label']) !!}
                                        {!! Form::label('lastname',$client->billing->lastname,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group mb-4">
                                        {!! Form::label('phone','Phone:',['class'=>'form-label']) !!}
                                        {!! Form::label('phone',$client->billing->phone,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group mb-4">
                                        {!! Form::label('website','Website:',['class'=>'form-label']) !!}
                                        {!! Form::label('website',$client->billing->website,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group mb-4">
                                        {!! Form::label('streetAddress1','Street Address 1:',['class'=>'form-label']) !!}
                                        {!! Form::label('streetAddress1',$client->billing->streetAddress1,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group mb-4">
                                        {!! Form::label('streetAddress2','Street Address 2 (Optional):',['class'=>'form-label']) !!}
                                        {!! Form::label('streetAddress2',$client->billing->streetAddress2,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group mb-4">
                                        {!! Form::label('city','City:',['class'=>'form-label']) !!}
                                        {!! Form::label('city',$client->billing->city,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group mb-4">
                                        {!! Form::label('postalCode','Postal Code:',['class'=>'form-label']) !!}
                                        {!! Form::label('postalCode',$client->billing->postalCode,['class'=>'form-control']) !!}
                                    </div>

                                    <div class="form-group mb-4">
                                        {!! Form::label('VAT','VAT Number:',['class'=>'form-label']) !!}
                                        {!! Form::label('VAT',$client->billing->VAT,['class'=>'form-control']) !!}
                                    </div>
                                    @else
                                        <p>No address information...</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- END Address Information -->
            </div>
            <div class="tab-pane fade fade-right" id="btabs-animated-slideright-settings" role="tabpanel" aria-labelledby="btabs-animated-slideright-settings-tab">
                <h4 class="fw-normal">Settings Content</h4>
                <p>Content slides in to the right..</p>
            </div>
        </div>
            <div class="tab-pane fade fade-right" id="btabs-animated-slideright-contact" role="tabpanel" aria-labelledby="btabs-animated-slideright-contact-tab">
                <a href="{{route('credentials.create')}}"><button data-bs-toggle="tooltip" title="New Credential" class="btn btn-alt-primary"><i class="fa fa-plus"></i></button></a>
                <table class="table table-striped table-hover table-vcenter fs-sm">
                    <thead>
                    <tr>
                        <th scope="col">Host</th>
                        <th scope="col">Subject</th>
                        <th scope="col">login</th>
                        <th scope="col">password</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($credentials)
                        @foreach($credentials as $credential)
                            <tr>
                                <td>{{$credential->host ? $credential->host : 'No Host'}}</td>
                                <td>{{$credential->subject->name ? $credential->subject->name : 'No subject'}}</td>
                                <td>{{$credential->login ? $credential->login : 'No login'}}</td>
                                <td>{{$credential->password ? $credential->password : 'No password'}}</td>
                                <td>
                                    <a href="{{route('credentials.edit', $credential->id)}}">
                                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit credential">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </button>
                                    </a>
                                    <a href="{{route('credentials.show', $credential->id)}}">
                                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Show credential">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade fade-right show active" id="btabs-animated-slideright-docs" role="tabpanel" aria-labelledby="btabs-animated-slideright-docs-tab">
                <button type="button" class="btn btn-alt-primary push" data-bs-toggle="modal" data-bs-target="#modal-block-large"><i class="fa fa-plus"></i></button>
                <!-- Large Block Modal -->
                <div class="modal" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="block block-rounded block-transparent mb-0">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">new Doc</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-fw fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content fs-sm">
                                    <form class="row mb-0" name="contactformulier"
                                          action="{{action('App\Http\Controllers\AdminCredentialController@createCredentialDoc')}}"
                                          method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" class="form-control" name="client_id" value="{{ $client->id }}">
                                        <div class="mb-4">
                                            {!! Form::label('type','Select Type:', ['class'=>'form-label']) !!}
                                            {!! Form::select('type',$types,null,['class'=>'form-control', 'placeholder'=>'select...'])!!}
                                            @error('type')
                                            <p class="text-danger mt-2"> {{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="frontend-contact-msg">Description</label>
                                            <textarea class="form-control" name="description" rows="7"
                                                      ></textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="frontend-contact-email">Doc file</label>
                                            <input type="file" class="form-control" id="frontend-contact-tagline"
                                                   name="photos[]" multiple>
                                        </div>
                                        <div class="mb-4">
                                            <button type="submit" class="btn btn-alt-primary">
                                                <i class="fa fa-paper-plane me-1 opacity-50"></i> Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Large Block Modal -->
                <table class="table table-striped table-hover table-vcenter fs-sm">
                    <thead>
                    <tr>
                        <th scope="col">type</th>
                        <th scope="col">description</th>
                        <th scope="col">file</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($docs)
                        @foreach($docs as $doc)
                            <tr>
                                <td>
                                    @if($doc->type->name == "WORD")
                                        <a class="btn btn-alt-primary" href=""><i class="far fa-file-word"></i></a>

                                    @elseif($doc->type->name == "EXCEL")
                                        <a class="btn btn-alt-success" href=""><i class="far fa-file-excel"></i></a>

                                    @elseif($doc->type->name == "PDF")
                                        <a class="btn btn-alt-danger" href=""><i class="far fa-file-pdf"></i></a>

                                    @elseif($doc->type->name == "OFFICE")
                                        <a class="btn btn-alt-secondary" href=""><i class="si si-docs"></i></a>

                                    @elseif($doc->type->name == "IMG")
                                        <a class="btn btn-alt-primary" href=""><i class="far fa-image"></i></a>

                                    @else($doc->type->name == "OTHER")
                                        <a class="btn btn-alt-info" href=""><i class="far fa-file"></i></a>
                                    @endif
                                </td>
                                <td>{{$doc->description ? $doc->description : 'No description'}}</td>
                                <td>
                                    @foreach($doc->photos as $photo)
                                        <a target="_blank" href="{{ asset('images/docs/') . $photo->file }}"><li>{{ substr($photo->file, 11)}}</li></a>
                                    @endforeach
                                </td>

                                <td>
                                    <a href="{{route('doc.edit', $doc->id)}}">
                                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit doc">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-alt-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modal-block-delete{{$doc->id}}">
                                        <i class="far fa-trash-alt"></i>
                                    </button
                                    >
                                    <!-- Large Block Modal -->
                                    <div class="modal" id="modal-block-delete{{$doc->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-block-delete{{$doc->id}}" aria-hidden="true">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="block block-rounded block-transparent mb-0">
                                                    <div class="block-header block-header-default">
                                                        <h3 class="block-title">Delete Doc</h3>
                                                        <div class="block-options">
                                                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="fa fa-fw fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="block-content fs-sm">
                                                        <form class="row mb-0" name="contactformulier"
                                                              action="{{action('App\Http\Controllers\AdminCredentialController@deleteCredentialDoc')}}"
                                                              method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{$doc->id}}" name="doc_id">
                                                                <p class="text-center">Are you sure you want to delete these docs?</p>
                                                                <button type="submit" class="btn btn-alt-danger mb-1">Yes</button>
                                                                <button type="button" class="btn btn-alt-primary mb-3" data-bs-dismiss="modal">No</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Large Block Modal -->
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
    </div>
    <!-- END Block Tabs Animated Slide Right -->



    </div>
    <!-- END Page Content -->




<?php require '../resources/inc/_global/views/page_end.php'; ?>
<?php require '../resources/inc/_global/views/footer_start.php'; ?>
<?php require '../resources/inc/_global/views/footer_end.php'; ?>
