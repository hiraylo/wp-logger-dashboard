<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{--{{ $entries }}--}}

                    <form action="{{url('/dashboard')}}" method="get">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <label>Websites</label><br>
                                <select class="w-100" id="website_name" name="website_name[]" multiple="multiple">
                                    @foreach ($websites as $key => $value)

                                        @if(is_array(request()->get('website_name')))

                                            @if(in_array($key, request()->get('website_name')))
                                                <option value="{{ $key }}" selected="selected">{{ $value }} ({{ $key  }})</option>
                                            @else
                                                <option value="{{ $key }}">{{ $value }} ({{ $key  }})</option>
                                            @endif

                                            {{--@if ($website == $selected)
                                                <option value="{{ $website }}" selected="selected">{{ $website }}</option>
                                            @else
                                                <option value="{{ $website }}">{{ $website }}</option>
                                            @endif--}}

                                        @else
                                            <option value="{{ $key }}">{{ $value }} ({{ $key  }})</option>
                                        @endif


                                    @endforeach
                                </select>

                            </div>
                            <div class="col">
                                <label for="record_count">Date Range</label>
                                <input type="text" id="daterange" name="daterange" value="{{ request()->get('daterange') }}" />
                            </div>
                            <div class="col">
                                <label for="record_count">Record Count</label>
                                <input type="number" name="record_count" value="{{ request()->get('record_count') }}">
                            </div>
                            <div class="col"><input type="submit" class="btn btn-primary" value="Filter"></div>
                        </div>








                    </form>

                    <div class="w-full mt-3">
                        <div class="shadow overflow-hidden rounded border-b border-gray-200">

                                @if ($entries->count() > 0)

                                <table class="min-w-full bg-white">
                                    <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Website</th>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">URL</th>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Plugin Name</th>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Plugin Version</th>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">User</th>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                                        <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Timestamp</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-gray-700">

                                    @foreach ($entries as $entry)

                                        <tr>
                                            <td class="w-1/3 text-left py-3 px-4">{{ $entry->website_name }}</td>
                                            <td class="w-1/3 text-left py-3 px-4">{{ $entry->website_url }}</td>
                                            <td class="text-left py-3 px-4">{{ $entry->plugin_name }}</td>
                                            <td class="text-left py-3 px-4">{{ $entry->plugin_version }}</td>
                                            <td class="text-left py-3 px-4">{{ $entry->user }}</td>
                                            <td class="text-left py-3 px-4">{{ $entry->status }}</td>
                                            <td class="text-left py-3 px-4">{{ $entry->created_at }}</td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>

                                @else
                                    <p>There are no matches.</p>
                                @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
