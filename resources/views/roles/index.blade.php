@section('title',"Role")
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @can('role create')
                        <div class="flex justify-end min-w-full sm:px-6 lg:px-8 mb-4">
                            <a href="{{ route('roles.create') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md">Create Role</a>
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
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center capitalize">
                                                    {{ $role->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex justify-end">
                                                    <div class="flex space-x-2">

                                                        @can('role edit')
                                                            <a href="{{ route('roles.edit', $role->id) }}"
                                                               class="p-1 text-green-500">@include('components.icons.edit')</a>
                                                        @endcan


                                                        @can('role delete')
                                                            <form class=""
                                                                  method="POST" action="{{ route('roles.destroy', $role->id) }}"
                                                                  onsubmit="return confirm('Are you sure?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="p-1 text-red-500 mr-6" type="submit">@include('components.icons.trash')</button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
