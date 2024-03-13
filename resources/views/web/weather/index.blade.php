<x-app-layout>
    <div class="py-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-semibold mb-4">User:</h2>
                    <ul>
                        <li><b>ID:</b> {{ $user->id }}</li>
                        <li><b>First Name:</b> {{ $user->first_name }}</li>
                        <li><b>Last Name:</b> {{ $user->last_name }}</li>
                        <li><b>Email:</b> {{ $user->email }}</li>
                        <li><b>Status:</b> {{ $user->status->name() }}</li>
                        <li><b>Created At:</b> {{ $user->created_at }}</li>
                        <li><b>Updated At:</b> {{ $user->updated_at }}</li>
                    </ul>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-semibold mb-4">Weather:</h2>
                    <ul>
                        <li><b>Temp:</b> {{ $weather->temp }}</li>
                        <li><b>Pressure:</b> {{ $weather->pressure }}</li>
                        <li><b>Humidity:</b> {{ $weather->humidity }}</li>
                        <li><b>Temp min:</b> {{ $weather->temp_min }}</li>
                        <li><b>Temp max:</b> {{ $weather->temp_max }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
