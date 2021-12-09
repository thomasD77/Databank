<?php require '../resources/inc/_global/config.php'; ?>
<?php require '../resources/inc/backend/config.php'; ?>
<?php require '../resources/inc/_global/views/head_start.php'; ?>
<?php require '../resources/inc/_global/views/head_end.php'; ?>
<?php require '../resources/inc/_global/views/page_start.php'; ?>

<!-- Hero -->
<div class="bg-primary-dark" style="background-image: url({{asset('images/general/banner6.png')}}); background-size: cover  ; background-repeat: no-repeat ">
    <div class="content content-full text-center">
      <div class="my-3">
          <img class="rounded-circle border border-white border border-3" height="80" width="80" src="{{$user->avatar ? asset('/') . $user->avatar->file : 'http://placehold.it/62x62'}}" alt="{{$user->name}}">
      </div>
      <h1 class="h2 text-white mb-0">Edit Account</h1>
      <h2 class="h4 fw-normal text-white-75">
          <?php echo Auth::user()->name; ?>
      </h2>
      <a class="btn btn-alt-secondary" href="{{ asset('/dashboard') }}">
        <i class="fa fa-fw fa-arrow-left text-danger"></i> Back to Dashboard
      </a>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content content-boxed">
  <!-- User Profile -->
  <div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">User Profile</h3>
    </div>
    <div class="block-content">
          <div class="row push">
          <div class="col-lg-4">
            <p class="fs-sm text-muted">
              Your account’s vital info. Your username will be publicly visible.
            </p>
          </div>
          <div class="col-lg-8 col-xl-5">
              {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminUsersController@update',$user->id],
            'files'=>true])
             !!}
              <div class="form-group mb-4">
                  {!! Form::label('one-profile-edit-username', 'Username:',['class'=>'form-label']) !!}
                  {!! Form::text('username',$user->username ? $user->username : "" ,['class'=>'form-control']) !!}
                  @if(Session::has('user_username'))
                      <p class="alert alert-danger my-2">{{session('user_username')}}</p>
                  @endif
              </div>
              <div class="form-group mb-4">
                  {!! Form::label('one-profile-edit-name', 'Name:', ['class'=>'form-label']) !!}
                  {!! Form::text('name',$user->name,['class'=>'form-control']) !!}
                  @error('name')
                  <p class="text-danger mt-2"> {{ $message }}</p>
                  @enderror
              </div>
              <div class="form-group mb-4">
                  {!! Form::label('one-profile-edit-email', 'E-mail:', ['class'=>'form-label']) !!}
                  {!! Form::text('email',$user->email,['class'=>'form-control']) !!}
                  @error('email')
                  <p class="text-danger mt-2"> {{ $message }}</p>
                  @enderror
              </div>

              @canany(['is_admin', 'is_superAdmin'])
              <div class="form-group mb-4">
                  {!! Form::label('one-profile-edit-roles', 'Select Role:', ['class'=>'form-label']) !!}
                  {!! Form::select('roles[]',$roles,$user->roles->pluck('id')->toArray(),['class'=>'form-control',])!!}
              </div>
              @endcan

              @can('is_client')
                  <input type="hidden" name="roles" value="3">
              @endcan

              <div class="mb-4">
                  <label class="form-label">Your Avatar</label>
                  <div class="mb-4">
                      <img class="rounded-circle" height="80" width="80" src="{{$user->avatar ? asset('/') . $user->avatar->file : 'http://placehold.it/62x62'}}" alt="{{$user->name}}">
                  </div>
                  <div class="form-group mb-4">
                      {!! Form::label('avatar_id', 'Choose a new avatar:', ['class'=>'form-label']) !!}
                      {!! Form::file('avatar_id',['class'=>'form-control']) !!}
                  </div>
              </div>

              <div class="d-flex justify-content-between">
                  <div class="form-group mr-1">
                      {!! Form::submit('Update',['class'=>'btn btn-alt-primary']) !!}
                  </div>
                  {!! Form::close() !!}
              </div>

          </div>
        </div>
      </div>
  </div>
  <!-- END User Profile -->

  <!-- Change Password -->
  <div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">Change Password</h3>
    </div>
    <div class="block-content">
        <div class="row push">
          <div class="col-lg-4">
            <p class="fs-sm text-muted">
              Changing your sign in password is an easy way to keep your account secure.
            </p>
          </div>
          <div class="col-lg-8 col-xl-5">
              {!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\AdminUsersController@updatePassword',$user->id]]) !!}
              <div class="form-group mb-4">
                  {!! Form::label('one-profile-edit-password', 'Current Password:',['class'=>'form-label']) !!}
                  {!! Form::password('currentPassword',['class'=>'form-control']) !!}
                  @if(Session::has('user_message'))
                      <p class="alert alert-danger my-2">{{session('user_message')}}</p>
                  @endif
              </div>
              <div class="form-group mb-4">
                  {!! Form::label('one-profile-edit-password-new', 'New Password:',['class'=>'form-label']) !!}
                  {!! Form::password('newPassword',['class'=>'form-control']) !!}
              </div>
              <div class="form-group mb-4">
                  {!! Form::label('one-profile-edit-password-new-confirm', 'Confirm Password:',['class'=>'form-label']) !!}
                  {!! Form::password('confirmPassword',['class'=>'form-control']) !!}
                  @if(Session::has('user_password'))
                      <p class="alert alert-danger my-2">{{session('user_password')}}</p>
                  @endif
                  @error('newPassword')
                  <p class="text-danger mt-2"> {{ $message }}</p>
                  @enderror
              </div>

              <div class="d-flex justify-content-between">
                  <div class="form-group mr-1">
                      {!! Form::submit('Update',['class'=>'btn btn-alt-primary']) !!}
                  </div>
              {!! Form::close() !!}
          </div>
        </div>
  </div>
  <!-- END Change Password -->

  <!-- Billing Information -->
  <div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">Billing Information</h3>
    </div>
    <div class="block-content">
        <div class="row push">
          <div class="col-lg-4">
            <p class="fs-sm text-muted">
              Your billing information is never shown to other users and only used for creating your invoices.
            </p>
          </div>
          <div class="col-lg-8 col-xl-5">
              @if(Auth::user()->billing)
                  {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminBillingController@update', $user->billing->id]]) !!}

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-company', 'Company (Optional):',['class'=>'form-label']) !!}
                      {!! Form::text('company',$user->billing ? $user->billing->company : "",['class'=>'form-control']) !!}
                      @error('company')
                      <p class="text-danger mt-2"> {{ $message }}</p>
                      @enderror
                  </div>

                  <div class="row mb-4">
                      <div class="form-group col-6">
                          {!! Form::label('one-profile-edit-firstname', 'Firstname:',['class'=>'form-label']) !!}
                          {!! Form::text('firstname',$user->billing ? $user->billing->firstname : "",['class'=>'form-control']) !!}
                          @error('firstname')
                          <p class="text-danger mt-2"> {{ $message }}</p>
                          @enderror
                      </div>
                      <div class="form-group col-6">
                          {!! Form::label('one-profile-edit-lastname', 'Lastname:',['class'=>'form-label']) !!}
                          {!! Form::text('lastname',$user->billing ? $user->billing->lastname : "",['class'=>'form-control']) !!}
                          @error('lastname')
                          <p class="text-danger mt-2"> {{ $message }}</p>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-streetAddress1', 'Street Address 1:',['class'=>'form-label']) !!}
                      {!! Form::text('streetAddress1',$user->billing ? $user->billing->streetAddress1 : "",['class'=>'form-control']) !!}
                      @error('streetAddress1')
                      <p class="text-danger mt-2"> {{ $message }}</p>
                      @enderror
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-streetAddress2', 'Street Address 2 (Optional):',['class'=>'form-label']) !!}
                      {!! Form::text('streetAddress2',$user->billing ? $user->billing->streetAddress2 : "",['class'=>'form-control']) !!}
                      @error('streetAddress2')
                      <p class="text-danger mt-2"> {{ $message }}</p>
                      @enderror
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-city', 'City:',['class'=>'form-label']) !!}
                      {!! Form::text('city',$user->billing ? $user->billing->city : "",['class'=>'form-control']) !!}
                      @error('city')
                      <p class="text-danger mt-2"> {{ $message }}</p>
                      @enderror
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-postalCode', 'Postal Code:',['class'=>'form-label']) !!}
                      {!! Form::text('postalCode',$user->billing ? $user->billing->postalCode : "",['class'=>'form-control']) !!}
                      @error('postalCode')
                      <p class="text-danger mt-2"> {{ $message }}</p>
                      @enderror
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-VAT', 'VAT Number (optional):',['class'=>'form-label']) !!}
                      {!! Form::text('VAT',$user->billing ? $user->billing->VAT : "",['class'=>'form-control']) !!}
                      @error('VAT')
                      <p class="text-danger mt-2"> {{ $message }}</p>
                      @enderror
                  </div>

                  <div class="d-flex justify-content-between">
                      <div class="form-group mr-1">
                          {!! Form::submit('Update',['class'=>'btn btn-alt-primary']) !!}
                      </div>
                      {!! Form::close() !!}
              @else
                  {!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\AdminBillingController@store']]) !!}

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-company', 'Company (Optional):',['class'=>'form-label']) !!}
                      {!! Form::text('company',$user->billing? $user->billing->company : "",['class'=>'form-control']) !!}
                      @error('company')
                      <p class="text-danger mt-2"> {{ $message }}</p>
                      @enderror
                  </div>

                  <div class="row mb-4">
                      <div class="form-group col-6">
                          {!! Form::label('one-profile-edit-firstname', 'Firstname:',['class'=>'form-label']) !!}
                          {!! Form::text('firstname',$user->billing? $user->billing->firstname : "",['class'=>'form-control']) !!}
                          @error('firstname')
                          <p class="text-danger mt-2"> {{ $message }}</p>
                          @enderror
                      </div>
                      <div class="form-group col-6">
                          {!! Form::label('one-profile-edit-lastname', 'Lastname:',['class'=>'form-label']) !!}
                          {!! Form::text('lastname',$user->billing? $user->billing->lastname : "",['class'=>'form-control']) !!}
                          @error('lastname')
                          <p class="text-danger mt-2"> {{ $message }}</p>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-streetAddress1', 'Street Address 1:',['class'=>'form-label']) !!}
                      {!! Form::text('streetAddress1',$user->billing? $user->billing->streetAddress1 : "",['class'=>'form-control']) !!}
                      @error('streetAddress1')
                      <p class="text-danger mt-2"> {{ $message }}</p>
                      @enderror
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-streetAddress2', 'Street Address 2 (Optional):',['class'=>'form-label']) !!}
                      {!! Form::text('streetAddress2',$user->billing? $user->billing->streetAddress2 : "",['class'=>'form-control']) !!}
                      @error('streetAddress2')
                      <p class="text-danger mt-2"> {{ $message }}</p>
                      @enderror
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-city', 'City:',['class'=>'form-label']) !!}
                      {!! Form::text('city',$user->billing? $user->billing->city : "",['class'=>'form-control']) !!}
                      @error('city')
                      <p class="text-danger mt-2"> {{ $message }}</p>
                      @enderror
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-postalCode', 'Postal Code:',['class'=>'form-label']) !!}
                      {!! Form::text('postalCode',$user->billing? $user->billing->postalCode : "",['class'=>'form-control']) !!}
                      @error('postalCode')
                      <p class="text-danger mt-2"> {{ $message }}</p>
                      @enderror
                  </div>

                  <div class="form-group mb-4">
                      {!! Form::label('one-profile-edit-VAT', 'VAT Number (optional):',['class'=>'form-label']) !!}
                      {!! Form::text('VAT',$user->billing? $user->billing->VAT : "",['class'=>'form-control']) !!}
                      @error('VAT')
                      <p class="text-danger mt-2"> {{ $message }}</p>
                      @enderror
                  </div>

                  <div class="d-flex justify-content-between">
                      <div class="form-group mr-1">
                          {!! Form::submit('Save',['class'=>'btn btn-alt-primary']) !!}
                      </div>
                      {!! Form::close() !!}
              @endif

          </div>
          </div>
        </div>
    </div>
  </div>
  <!-- END Billing Information -->
</div>
<!-- END Page Content -->

<?php require '../resources/inc/_global/views/page_end.php'; ?>
<?php require '../resources/inc/_global/views/footer_start.php'; ?>
<?php require '../resources/inc/_global/views/footer_end.php'; ?>
