@extends('layouts.app')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Suport') }}
    </h2>
</x-slot>
@section('content')
    <div class="border rounded-sm xl:p-8 p-8 w-full">
        <div class="flex max-sm:flex-col justify-between">
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
            <form action="{{ route('supports.destroy', $support->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-red-600 relative inline-flex items-center px-8 py-2 h-9 text-sm font-medium leading-5 rounded-sm focus:outline-none focus:ring ring-red-300 focus:border-red-300  active:bg-red-700 transition ease-in-out duration-150" type="submit">
                    Delete
                </button>
            </form>
        </div>

        <div class="pt-5">
            <p>{{ $support->content_body }}</p>
        </div>
    </div>
    {{-- replies --}}
    <div class="ps-6 rounded-sm w-full">
        <div class="border rounded-sm xl:p-8 p-8 w-full mt-2">
            <div class="flex max-sm:flex-col justify-between">
                <div class=" flex items-center gap-2">
                    <h1 class="font-medium">New reply</h1>
                </div>
                <form action="{{ route('supports.destroy', $support->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 relative inline-flex items-center px-8 py-2 h-9 text-sm font-medium leading-5 rounded-sm focus:outline-none focus:ring ring-red-300 focus:border-red-300  active:bg-red-700 transition ease-in-out duration-150" type="submit">
                        Delete
                    </button>
                </form>
            </div>

            <div class="pt-5">
                <p>{{ $support->content_body }}</p>
            </div>
            <div class="mt-3 text-gray-600">
                <span class="text-sm">10 August, 2023</span>
            </div>
        </div>
    </div>
    {{--replies input area--}}
    <div class="ps-6 py-4">
        <x-messages></x-messages>
        <form method="post" action="{{ route('replies.store', $support->id) }}">
            @csrf
            <input type="hidden" name="support_id" value="{{ $support->id }}">
            <textarea
                rows="2"
                name="content"
                placeholder="Write your reply"
                class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
            </textarea>
            <button type="submit" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                Submit
            </button>
        </form>
    </div>
@endsection
