<div class="relative z-10 hidden" aria-labelledby="edit-form" role="dialog" aria-modal="true" id="edit-form">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <form id="form-edit" method="post">
            @method('PUT')
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0 ">
                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-gray-50 px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left" id="head-modal">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                        Update Question
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500" id="subtitle-modal">
                                            Update your question information
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4" id="content-edit-modal">
                            <x-alert/>
                            <input type="hidden" id="support-id" name="id">
                            @include('components.body-form')
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button type="submit" class="inline-flex w-full justify-center rounded bg-green-600 px-6 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Save</button>
                            <a href="{{route('supports.index')}}" class="mt-3 inline-flex w-full justify-center rounded bg-white px-6 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

