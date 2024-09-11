@section('title',"Permission")
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @can('permission create')
                        <div class="flex justify-end sm:px-6 lg:px-8 mb-4">
                            <a href="{{ route('permissions.create') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md">Create permission</a>
                        </div>
                    @endcan
                    <div class="flex flex-col">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center capitalize">
                                                    {{ $permission->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex justify-end">
                                                    <div class="flex space-x-2">
                                                        <a href=""
                                                           class="p-1 text-orange-500">@include('components.icons.eye')</a>

                                                        @can('permission edit')
                                                            <a href="{{ route('permissions.edit', $permission->id) }}"
                                                               class="p-1 text-green-500">@include('components.icons.edit')</a>
                                                        @endcan

                                                        @can('permission delete')
                                                            <form class="p-1 text-red-500"
                                                                  method="POST" action="{{ route('permissions.destroy', $permission->id) }}"
                                                                  onsubmit="return confirm('Are you sure?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="mr-4" type="submit">@include('components.icons.trash')</button>
                                                            </form>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-6">
                                {{ $permissions->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
