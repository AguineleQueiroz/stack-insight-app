@extends('layouts.app')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Suport') }}
    </h2>
</x-slot>
@section('content')
    {{--  flash messages  --}}
    <x-messages></x-messages>
    <div class="flex border rounded-sm xl:p-8 p-8 w-full bg-white gap-4">
        <div class="col flex items-center border-r">
            <div class="relative w-12 h-10 overflow-hidden bg-green-400 rounded-full">
                <svg class="absolute w-12 h-12 text-slate-100 -left-1" fill="#ffffff" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                    </path>
                </svg>
            </div>
            <div class="d-flex ps-2">
                <h1 class="font-medium">{{ $support->user['name'] }}</h1>
                <div class="text-gray-600">
                    <span class="text-xs italic">{{ $support->created_at }}</span>
                </div>
            </div>
        </div>
        <div class="w-full">
            <div class=" col flex max-sm:flex-col justify-between">

                <div class=" flex items-center gap-2">
                    <h1 class="font-medium mb-2 text-2xl">{{ $support->subject }}</h1>
                    <h5 class="m-0">
                        @if($support->status === "Active")
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        @elseif($support->status=== "Pending")
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                        @elseif($support->status === "Closed")
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                            </svg>
                        @endif
                    </h5>
                </div>
                @can('owner', $support->user_id)
                    <form action="{{ route('supports.destroy', $support->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 relative inline-flex items-center px-8 py-2 h-9 text-sm font-medium leading-5 rounded-sm focus:outline-none focus:ring ring-red-300 focus:border-red-300  active:bg-red-700 transition ease-in-out duration-150" type="submit">
                            Delete
                        </button>
                    </form>
                @endcan
            </div>

            <div class="pt-2">
                <p>{{ $support->content_body }}</p>
            </div>
        </div>
    </div>
    {{-- replies --}}
    @forelse($replies as $reply)
        <div class="ps-6 rounded-sm">
            <div class="border rounded-sm xl:p-8 p-8 w-full mt-2 bg-slate-50">

                <div class="flex max-sm:flex-col justify-between">

                    <div class=" flex items-center gap-2">
                        <div class="relative w-10 h-10 overflow-hidden bg-indigo-300 rounded-full">
                            <svg class="absolute w-12 h-12 text-slate-100 -left-1" fill="#ffffff" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                                </path>
                            </svg>
                        </div>
                        <div class="d-flex ps-2">
                            <h1 class="font-medium">{{ $reply['user']['name'] }}</h1>
                            <div class="text-gray-600">
                                <span class="text-xs italic">{{ $reply['created_at'] }}</span>
                            </div>
                        </div>
                    </div>
                    @can('owner', $reply['user_id'])
                        <form action="{{ route('replies.destroy', [$support->id, $reply['id']])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 relative inline-flex items-center px-8 py-2 h-9 text-sm font-medium leading-5 rounded-sm focus:outline-none focus:ring ring-red-300 focus:border-red-300  active:bg-red-700 transition ease-in-out duration-150" type="submit">
                                Delete
                            </button>
                        </form>
                    @endcan
                </div>

                <div class="pt-5">
                    <p>{{ $reply['content'] }}</p>
                </div>
            </div>
        </div>
    @empty
        <div class="bg-amber-100 border border-[#fbbf24] px-2 py-1 text-center mt-2">
            <p class="text-amber-600">No one has answered your question yet...</p>
        </div>
    @endforelse
    {{--replies input area--}}
    <div class="ps-6 py-4">
        <form method="post" action="{{ route('replies.store', $support->id) }}">
            @csrf
            <input type="hidden" name="support_id" value="{{ $support->id }}">
            <textarea
                rows="2"
                name="content"
                class="w-full resize-none rounded-sm border border-[#e0e0e0] bg-white py-3 px-6 text-base text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                placeholder="Write your reply" >
            </textarea>
            <button type="submit" class="hover:shadow-form rounded-sm bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                Submit
            </button>
        </form>
    </div>
@endsection
