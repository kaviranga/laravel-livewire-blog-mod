<x-app-layout>
  <x-slot name="header">
    <h2 class="text-gray-800 text-xl font-semibold leading-tight">{{ $post->title }}</h2>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl lg:px-8 sm:px-6">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="border-gray-200 border-b bg-white p-6">
          <h1 class="mb-4 text-3xl font-bold">{{ $post->title }}</h1>
          <p class="text-gray-600 mb-4">By {{ $post->user->name }} on {{ $post->published_at }}</p>
          <div class="prose mb-6 max-w-none">{!! nl2br(e($post->content)) !!}</div>
          <div class="mb-6 flex flex-wrap gap-2">
            @foreach($post->tags as $tag)
            <span class="bg-green-100 text-green-800 rounded px-2.5 py-0.5 text-xs font-semibold"
              >{{ $tag->name }}</span
            >
            @endforeach
          </div>
          @can('update', $post)
          <a
            href="{{ route('posts.edit', $post) }}"
            class="bg-blue-500 hover:bg-blue-700 rounded px-4 py-2 font-bold text-white"
            >Edit Post</a
          >
          @endcan

          @can('delete', $post)
          <!-- Delete Form -->
          <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Are you sure you want to delete this post?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 rounded px-4 py-2 font-bold text-white">
              Delete Post
            </button>
          </form>
          @endcan


        </div>
      </div>
    </div>
  </div>

   <!-- Add this after the post content -->
   <div class="mt-8">@livewire('comment-section', ['post' => $post])</div>
</x-app-layout>
