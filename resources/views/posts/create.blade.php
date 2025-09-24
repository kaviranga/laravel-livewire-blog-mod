<x-app-layout>
  <x-slot name="header">
    <h2 class="text-gray-800 text-xl font-semibold leading-tight">{{ __('Create New Post') }}</h2>

    <!-- Back Button -->
      <a href="{{ url()->previous() }}"
         class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
         <- Back
      </a>

  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl lg:px-8 sm:px-6">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="border-gray-200 border-b bg-white p-6">@livewire('post-form')</div>
      </div>
    </div>
  </div>
</x-app-layout>
