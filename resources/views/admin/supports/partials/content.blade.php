@if($supports->getItems())
    <table class="my-8 p-8 w-full">
        <thead class="text-left border-b h-14">
            <th class="text-blue-900  px-4">Title</th>
            <th class="text-blue-900  px-4">Content</th>
            <th class="text-blue-900  px-4">Replies</th>
            <th class="text-blue-900  px-4">Status</th>
            <th class="text-blue-900  px-4"></th>
        </thead>
        <tbody class="body-table">
        @foreach ($supports->getItems() as $support)
            <tr class="h-12 odd:bg-slate-50 even:bg-white" id="{{$support->id}}">
                <td class="px-4">{{ $support->subject}}</td>
                <td class="text-slate-500 px-4">{{ $support->content_body }}</td>
{{--                <td class="text-slate-500 px-4">{{ count($support->total_replies) }}</td>--}}
                <td class="text-slate-500 px-4">
                    <x-replies-support>{{__($support->total_replies)}}</x-replies-support>
                </td>
                <td class="px-4">
                    <x-status-support :status="$support->status"></x-status-support>
                </td>
                <td class="flex items-center justify-end h-12 px-4">
                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="max-content">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>Options</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <div class="flex py-2 align-items-center">
                                    @can('owner', $support->user_id)
                                        <a href="javascript:void(0)" onclick="updateSupport('{{$support->id}}')" class="showEdit px-2" data-modal-target="modal-form" data-modal-toggle="modal-form" data-bs-target="{{ $support->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 28 28" stroke-width="1.5" stroke="#444" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </a>
                                    @endcan
                                    <a class="px-2 showModal" href="{{ route('replies.replies', $support->id)}}"
                                       data-modal-target="edit-form" data-modal-toggle="edit-form">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 28 28" stroke-width="1.5" stroke="#444" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </a>
                                    @can('owner', $support->user_id)
                                        <div class="px-2">
                                            <form action="{{ route('supports.destroy', $support->id)}}" method="POST" style="height:24px;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 28 28" stroke-width="1.5" stroke="#444" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @endcan
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <x-pagination :paginator="$supports" :appends="$filters" />
@else
    <div class="w-full flex flex-col items-center py-5">
        <div>
            <svg width="200px" height="200px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 15C9.85038 15.6303 10.8846 16 12 16C13.1154 16 14.1496 15.6303 15 15" stroke="#9999FF" stroke-width=".1" stroke-linecap="round"/>
                <ellipse cx="15" cy="9.5" rx="1.2" ry="1" fill="#9999FF"/>
                <ellipse cx="9" cy="9.5" rx="1.2" ry="1" fill="#9999FF"/>
                <path d="M22 19.723V12.3006C22 6.61173 17.5228 2 12 2C6.47715 2 2 6.61173 2 12.3006V19.723C2 21.0453 3.35098 21.9054 4.4992 21.314C5.42726 20.836 6.5328 20.9069 7.39614 21.4998C8.36736 22.1667 9.63264 22.1667 10.6039 21.4998L10.9565 21.2576C11.5884 20.8237 12.4116 20.8237 13.0435 21.2576L13.3961 21.4998C14.3674 22.1667 15.6326 22.1667 16.6039 21.4998C17.4672 20.9069 18.5727 20.836 19.5008 21.314C20.649 21.9054 22 21.0453 22 19.723Z" stroke="#1C274C" stroke-width=".02"/>
            </svg>
        </div>
        <p class="text-indigo-400 mt-5">There are no doubts to show...</p>
    </div>
@endif
