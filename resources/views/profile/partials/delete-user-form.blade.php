<section class="space-y-6">


    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmUserDeletionModal">
        {{ __(' حذف الحساب') }}
    </button>

    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" role="dialog" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('profile.destroy') }}" class="modal-content p-6">
                @csrf
                @method('delete')

                <div class="modal-header">
                    <h2 class="modal-title" id="confirmUserDeletionModalLabel">
                        {{ __('سيتم حذف الحساب') }}
                    </h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    </button>
                </div>

                <div class="modal-body">
                    {{-- <p class="mt-1 text-sm text-gray-600">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                    </p> --}}

                    <div class="mt-3">
                        <label for="password" class="sr-only">{{ __('الباسورد') }}</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('ادخل الباسورد الحالي') }}">
                        @error('password', 'userDeletion')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('اغلاق') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __(' حذف الحساب نهائيا') }}</button>
                </div>
            </form>
        </div>
    </div>
</section>
