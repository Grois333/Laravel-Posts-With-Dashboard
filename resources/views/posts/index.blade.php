<x-app-layout>
    <x-slot name="header">
       	<h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            {{ __('Posts') }}

            <a href="{{ route('posts.create') }}" class="text-xs bg-gray-800 text-white rounded px-2 py-1">Create</a>
		</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                	
                	<table class="mb-4">
                        @foreach($posts as $post)
                        <tr class="border-b border-gray-200 text-sm">
                            <td class="px-6 py-4">{{ $post->title }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('posts.edit', $post) }}" class="text-indigo-600">Edit</a>
                            </td>
                            <td class="px-6 py-4">
                            	<form action="{{ route('posts.destroy', $post) }}" method="POST">
								    @csrf 
								    @method('DELETE')

								    <input 
								    	type="submit" 
								    	value="Delete" 
								    	class=" bg-gray-800 text-white rounded px-4 py-2 cursor-pointer" 
								    	onclick="return confirm('¿You Want To Delete?')"
								    >
								</form>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
