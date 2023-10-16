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
               value="{{ old('subject')}}"
               id="subject"
        >
    </label>
    <label for="content_body" class="w-full block pt-2 pb-4">
        <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Description</span>
        <textarea id="content_body"
                  class="text-left mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:ring-indigo-500 block w-full rounded-sm sm:text-sm focus:ring-0"
                  name="content_body">
            {{ old('content_body')}}
        </textarea>
    </label>
</div>
