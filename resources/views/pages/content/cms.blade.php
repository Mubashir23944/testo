@extends('layouts.master')

<!-- Page CSS -->
@section('pageStyle')
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.0/ckeditor5.css">
@endsection

@section('content')
@if(session('success'))
<div class="alert alert-primary alert-dismissible" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
</div>
@endif
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">{{ $module_name }} /</span> CMS
        </h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="nav-align-top mb-4">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <button type="button" class="nav-link active" role="tab"
                                                data-bs-toggle="tab" data-bs-target="#navs-top-about-us"
                                                aria-controls="navs-top-home" aria-selected="true">About Us</button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#navs-top-privacy-policy" aria-controls="navs-top-privacy-policy"
                                                aria-selected="false">Privacy Policy</button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#navs-top-terms-conditions" aria-controls="navs-top-terms-conditions"
                                                aria-selected="false">Terms and Conditions</button>
                                        </li>
                                        <li class="nav-item">
                                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                                data-bs-target="#navs-top-rules" aria-controls="navs-top-terms-conditions"
                                                aria-selected="false">Rules</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="navs-top-about-us" role="tabpanel">
                                            <form action="{{ route('cms.edit') }}" class="mb-3"
                                                method="POST">
                                                @csrf
                                                <div>
                                                    <input type="hidden" name="slug" value="{{$about_us->slug}}">
                                                    <label for="defaultFormControlInput" class="form-label">Title</label>
                                                    <input name="about_us_name" type="text" class="form-control" id="defaultFormControlInput"
                                                        value="{{ $about_us->name }}" aria-describedby="defaultFormControlHelp" />
                                                    @if($errors->has('about_us_name'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('about_us_name') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <label for="defaultFormControlInput" class="form-label">Body</label>
                                                    <textarea name="about_us_body" class="form-control" id="ckeditor">{{ $about_us->body }}</textarea>
                                                    @if($errors->has('about_us_body'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('about_us_body') }}</span>
                                                    @endif
                                                </div>
                                                <div class="demo-inline-spacing">
                                                    <input type="submit" class="btn btn-primary move-right" value="Update" />
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="navs-top-privacy-policy" role="tabpanel">
                                            <form action="{{ route('cms.edit') }}" class="mb-3"
                                                method="POST">
                                                @csrf
                                                <div>
                                                    <input type="hidden" name="slug" value="{{$privacy_policy->slug}}">

                                                    <label for="defaultFormControlInput" class="form-label">Title</label>
                                                    <input name="privacy_policy_name" type="text" class="form-control" id="defaultFormControlInput"
                                                        value="{{ $privacy_policy->name }}" aria-describedby="defaultFormControlHelp" />
                                                    @if($errors->has('privacy_policy_name'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('privacy_policy_name') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <label for="defaultFormControlInput" class="form-label">Body</label>
                                                    <textarea name="privacy_policy_body" class="form-control" id="privacy_policy_ckeditor">{{ $privacy_policy->body }}</textarea>
                                                    @if($errors->has('privacy_policy_body'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('privacy_policy_body') }}</span>
                                                    @endif
                                                </div>
                                                <div class="demo-inline-spacing">
                                                    <input type="submit" class="btn btn-primary move-right" value="Update" />
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="navs-top-terms-conditions" role="tabpanel">
                                            <form action="{{ route('cms.edit') }}" class="mb-3"
                                                method="POST">
                                                @csrf
                                                <div>
                                                    <input type="hidden" name="slug" value="{{$terms_conditions->slug}}">
                                                    <label for="defaultFormControlInput" class="form-label">Title</label>
                                                    <input name="terms_conditions_name" type="text" class="form-control" id="defaultFormControlInput"
                                                        value="{{ $terms_conditions->name }}" aria-describedby="defaultFormControlHelp" />
                                                    @if($errors->has('terms_conditions_name'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('terms_conditions_name') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <label for="defaultFormControlInput" class="form-label">Body</label>
                                                    <textarea name="terms_conditions_body" class="form-control" id="terms_conditions_ckeditor">{{ $terms_conditions->body }}</textarea>
                                                    @if($errors->has('terms_conditions_body'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('terms_conditions_body') }}</span>
                                                    @endif
                                                </div>
                                                <div class="demo-inline-spacing">
                                                    <input type="submit" class="btn btn-primary move-right" value="Update" />
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="navs-top-rules" role="tabpanel">
                                            <form action="{{ route('cms.edit') }}" class="mb-3"
                                                method="POST">
                                                @csrf
                                                <div>
                                                    <input type="hidden" name="slug" value="{{$rules->slug}}">
                                                    <label for="defaultFormControlInput" class="form-label">Title</label>
                                                    <input name="rules_name" type="text" class="form-control" id="defaultFormControlInput"
                                                        value="{{ $rules->name }}" aria-describedby="defaultFormControlHelp" />
                                                    @if($errors->has('rules_name'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('rules_name') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <label for="defaultFormControlInput" class="form-label">Body</label>
                                                    <textarea name="rules_body" class="form-control" id="rules_ckeditor">{{ $rules->body }}</textarea>
                                                    @if($errors->has('rules_body'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('rules_body') }}</span>
                                                    @endif
                                                </div>
                                                <div class="demo-inline-spacing">
                                                    <input type="submit" class="btn btn-primary move-right" value="Update" />
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tabs -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

    @endsection

    @section('scripts')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('ckeditor', {
                removeButtons: 'Source,Table,Link,Anchor,About,Image'

            });
            CKEDITOR.replace('privacy_policy_ckeditor', {
                removeButtons: 'Source,Table,Link,Anchor,About,Image'

            });
            CKEDITOR.replace('terms_conditions_ckeditor', {
                removeButtons: 'Source,Table,Link,Anchor,About,Image'

            });
            CKEDITOR.replace('rules_ckeditor', {
                removeButtons: 'Source,Table,Link,Anchor,About,Image'

            });
        });
    </script>

    @endsection