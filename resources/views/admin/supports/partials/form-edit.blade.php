<form action="{{ route('supports.update', $support->id ) }}" method="POST">
    @method('PUT')
    <div class="relative z-10" aria-labelledby="edit-form" role="dialog" aria-modal="true" id="edit-form">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

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
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <x-alert/>
                        <div class="flex flex-col">
                            @csrf
                            <label for="subject" class="w-full block pb-2">
                                  <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
                                      Title
                                  </span>
                                <input class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 block w-full rounded-sm sm:text-sm focus:ring-0"
                                       type="text"
                                       name="subject"
                                       placeholder="Doubt's title"
                                       value="{{ $support->subject }}"
                                >
                            </label>
                            <label for="content_body" class="w-full block pt-2 pb-4">
                                <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Description</span>
                                <textarea class="text-left mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 block w-full rounded-sm sm:text-sm focus:ring-0"
                                    name="content_body">
                                    {{ $support->content_body }}
                                </textarea>
                            </label>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="submit" class="inline-flex w-full justify-center rounded bg-green-600 px-6 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 sm:ml-3 sm:w-auto">Save</button>
                        <a href="{{route('supports.index')}}" class="mt-3 inline-flex w-full justify-center rounded bg-white px-6 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
