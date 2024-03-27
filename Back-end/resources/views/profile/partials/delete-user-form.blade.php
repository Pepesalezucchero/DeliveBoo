<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Cancella Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Una volta avviata questa operazione non è più possibile tornare indietro, la cancellazione dell\'Account comporta l\'eliminazione di tutti i tuoi dati.') }}
        </p>
    </header>

    <!-- Modal trigger button -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-account">
        {{__('Cancella Account')}}
    </button>

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="delete-account" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="delete-account" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-account">Cancella Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Sei sicuro di voler cancellare il tuo Account?') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Sei sicuro di voler eliminare il tuo Account? Una volta cancellato tutti i tuoi dati andranno perduti. Inserisci la tua Password per confermare la cancellazione dell\'Account.') }}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

                    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                        @csrf
                        @method('delete')


                        <div class="input-group">

                            <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Password') }}" />

                            @error('password')
                            <span class="invalid-feedback mt-2" role="alert">
                                <strong>{{ $errors->userDeletion->get('password')}}</strong>
                            </span>
                            @enderror



                            <button type="submit" class="btn btn-danger">
                                {{ __('Cancella Account') }}
                            </button>
                            <!--  -->
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</section>
