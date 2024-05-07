@extends('layouts.master')

@section('title')
الملف الشخصي
@endsection







   @section('intitle')
   <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">الرئيسية</a></li>
   <li class="breadcrumb-item active"><a href="javascript:void(0)">  الملف الشخصي
</a></li>
@endsection

@section('content')


<div class="card">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8  shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div class="mb-3">
                                <x-input-label for="name" :value="__('اسم المستخدم')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('البريد الالكتروني')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full  form-control" :value="old('email', $user->email)" required autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />



                                    

                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div>
                                        <p class="text-sm mt-2 text-gray-800">
                                            {{ __('Your email address is unverified.') }}

                                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                {{ __('Click here to re-send the verification email.') }}
                                            </button>
                                        </p>

                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif
                            </div>


                            <div class="flex items-center gap-4  text-center">
                                 <button class="btn btn-primary btn-sm rounded mt-4" style="width: 250px !important;">{{ __('حفظ') }}</button>
                                @if (session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('تحديث الباسورد ') }}
                            </h2>


                        </header>

                        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div class="mb-3">
                                <x-input-label for="update_password_current_password" :value="__(' الباسورد الحالي')" />
                                <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full form-control" autocomplete="current-password" />
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>

                            <div class="mb-3">
                                <x-input-label for="update_password_password" :value="__(' الباسورد الجديد')" />
                                <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full  form-control" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>

                            <div class="mb-3">
                                <x-input-label for="update_password_password_confirmation" :value="__(' تاكيد الباسورد الجديد')" />
                                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full  form-control" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4  text-center">
                                <button class="btn btn-primary btn-sm rounded mt-4" style="width: 250px !important;">{{ __('حفظ') }}</button>
                                @if (session('status') === 'password-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                    <section class="space-y-6">

{{--
                        <button type="button" class="btn btn-danger mt-4" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
                            {{ __(' حذف الحساب') }}
                        </button> --}}

                        <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" role="dialog" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <form method="post" action="{{ route('profile.destroy') }}" class="modal-content p-6">
                                    @csrf
                                    @method('delete')

                                    <div class="modal-header">
                                        <h2 class="modal-title" id="confirmUserDeletionModalLabel">
                                            {{ __('سيتم حذف الحساب') }}
                                        </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                    </div>

                                    <div class="modal-body">


                                        <div class="mt-3">
                                            <label for="password" class="sr-only">{{ __('الباسورد') }}</label>
                                            <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('ادخل الباسورد الحالي') }}">
                                            @error('password', 'userDeletion')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('اغلاق') }}</button>
                                        <button type="submit" class="btn btn-danger">{{ __(' حذف الحساب نهائيا') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>

                </div>
            </div>

        </div>
    </div>

</div>


@endsection
