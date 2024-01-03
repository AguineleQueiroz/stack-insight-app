@extends('layouts.app')

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Suport') }}
    </h2>
</x-slot>

@section('content')
    <x-messages/>
    <div class="border rounded-sm xl:p-8 p-8 w-full bg-white">
        <div class="flex max-sm:flex-col justify-between mb-6">
            <div>
                <h4 class="font-medium mb-2">Questions</h4>
                <p class="text-slate-500">A list of all the supports in your account including their subject,
                    description and status.</p>
                <p class="text-slate-500 mt-2">Supports total: {{ $supports->total() }}</p>
            </div>
            <div class="w-4/12 max-sm:mt-4 flex flex-row justify-end max-sm:justify-start">
                <button type="button"
                        data-modal-target="modal-form" data-modal-toggle="create-form"
                        class="showModal relative inline-flex items-center px-4 py-2 h-9 text-sm font-medium text-gray-700
                        bg-white border border-indigo-400  rounded-sm focus:outline-none focus:ring-0 ring-indigo-300
                        focus:border-indigo-300 hover:border-blue-800 active:bg-indigo-500 active:text-white"
                >
                    <span class="inline-block align-middle font-medium">New Question</span>
                </button>
            </div>
        </div>
        <div class="">
            @include('admin.supports.partials.content')
        </div>
        @include('admin.supports.partials.form-edit')
        @include('admin.supports.partials.form-create')
    </div>
@endsection

