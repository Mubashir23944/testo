<!DOCTYPE html>

<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="vertical-menu-template">

@include('auth.essentials.header')

<body>

    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">

                <!-- Reset Password -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        @include('auth.essentials.logo')
                        <!-- /Logo -->
                        <h4 class="mb-2">Reset Password 🔒</h4>
                        <p class="mb-4">for <span
                                class="fw-bold">{{ $email ?? old('email') }}</span></p>
                        <form action="{{ route('updatePassword') }}" id="formAuthentication"
                            class="mb-3" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="mb-3">
                                <label class="form-label" for="email">Email</label>
                                <div class="input-group input-group-merge">
                                    <input type="email" id="email" class="form-control" name="email"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="email"
                                        value="{{ $email ?? old('email') }}" required
                                        autocomplete="email" autofocus />

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="new_password">New Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="new_password" class="form-control" name="new_password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" required />

                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    @if($errors->all('new_password'))
                                        <p class="text-danger">
                                            {!! $errors->first('new_password') !!}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="new_password_confirmation">Confirm Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="new_password_confirmation" class="form-control"
                                        name="new_password_confirmation"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="new-password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    @if($errors->all('new_password_confirmation'))
                                        <p class="text-danger">
                                            {!! $errors->first('new_password_confirmation') !!}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100 mb-3">
                                Set new password
                            </button>

                            @include('auth.essentials.back-to-login')

                        </form>
                    </div>
                </div>
                <!-- /Reset Password -->
            </div>
        </div>
    </div>

    <!-- / Content -->

    @include('auth.essentials.scripts')

</body>


<!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/auth-reset-password-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Oct 2022 06:02:40 GMT -->

</html>
