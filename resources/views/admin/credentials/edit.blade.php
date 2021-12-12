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
            <h1 class="h2 text-white mb-0">Update Credential</h1>
            <h2 class="h4 fw-normal text-white-75">
                <?php echo Auth::user()->name; ?>
            </h2>
            <a class="btn btn-alt-secondary" href="{{ route('clients.index')  }}">
                <i class="fa fa-fw fa-arrow-left text-danger"></i> Back to Clients
            </a>
        </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content content-boxed">

    <!-- booking Profile -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Credential</h3>
        </div>
        <div class="block-content">
            <div class="row push">
                <div class="col-lg-4">
                    <p class="fs-sm text-muted">
                        Here you can Update your Credential.
                    </p>
                </div>
                <div class="col-lg-8 col-xl-5">
                    {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminCredentialController@update', $credential->id],
                        'files'=>false])
                   !!}

                    <div class="form-group mb-4">
                        {!! Form::label('subject','Select Client:', ['class'=>'form-label']) !!}
                        {!! Form::select('client_id',$clients, $credential->client->name,['class'=>'form-control'])!!}
                        @error('client_id')
                        <p class="text-danger mt-2"> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('subject','Select Subject:', ['class'=>'form-label']) !!}
                        {!! Form::select('subject_id',$subjects, $credential->subject->name,['class'=>'form-control'])!!}
                        @error('subject_id')
                        <p class="text-danger mt-2"> {{ $message }}</p>
                        @enderror
                    </div>

                    @canany(['is_superAdmin', 'is_admin', 'is_employee'])
                        <div class="form-group mb-4">
                            {!! Form::label('client','Select Client:', ['class'=>'form-label']) !!}
                            {!! Form::select('client_id',$clients, $booking->client->id ,['class'=>'form-control'])!!}
                            @error('client_id')
                            <p class="text-danger mt-2"> {{ $message }}</p>
                            @enderror
                        </div>
                    @endcanany

                    <div class="form-group mb-4">
                        {!! Form::label('host', 'Host:') !!}
                        {!! Form::text('host',$credential->host,['class'=>'form-control']) !!}
                        @error('host')
                        <p class="text-danger mt-2"> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('login', 'Login:') !!}
                        {!! Form::text('login',$credential->login,['class'=>'form-control']) !!}
                        @error('login')
                        <p class="text-danger mt-2"> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        {!! Form::label('password', 'Password:') !!}
                        {!! Form::text('password',$credential->password,['class'=>'form-control']) !!}
                        @error('host')
                        <p class="text-danger mt-2"> {{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group  mb-4">
                        {!! Form::label('remarks', 'Remarks:') !!}
                        {!! Form::textarea('remarks',$credential->remarks,['class'=>'form-control']) !!}
                    </div>



                        <button type="submit" name="button_submit" value="noMail" class="btn btn-alt-primary">Update</button>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END booking Profile -->


<?php require '../resources/inc/_global/views/page_end.php'; ?>
<?php require '../resources/inc/_global/views/footer_start.php'; ?>
<?php require '../resources/inc/_global/views/footer_end.php'; ?>
