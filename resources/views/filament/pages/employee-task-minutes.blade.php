<x-filament::page>
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-100">Employee Task Summary</h1>

    <div class="mb-6 flex justify-center">
        <form method="GET" action="{{ route('employee.tasks') }}" class="flex items-center space-x-4">
            <input type="date" name="start_date" class="p-2 rounded-md bg-gray-800 text-gray-300" required>
            <input type="date" name="end_date" class="p-2 rounded-md bg-gray-800 text-gray-300" required>
            <button type="submit" class="bg-indigo-600 text-white p-2 rounded-md hover:bg-indigo-500 transition duration-200">Filter</button>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-900 shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-gray-300">
                <tr>
                    <th class="py-4 px-6 text-left text-sm uppercase font-semibold tracking-wider">Employee Name</th>
                    <th class="py-4 px-6 text-left text-sm uppercase font-semibold tracking-wider">Total Minutes</th>
                    <th class="py-4 px-6 text-left text-sm uppercase font-semibold tracking-wider">Total Hours</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @foreach ($this->employees as $employee)
                    <tr class="bg-gray-800 hover:bg-gray-700 transition ease-in-out duration-200">
                        <td class="py-4 px-6 text-gray-100 font-medium">{{ $employee->name }}</td>
                        <td class="py-4 px-6 text-gray-400">{{ $employee->sent_tasks_sum_time_in_minutes ?? 0 }} mins</td>
                        <td class="py-4 px-6 text-gray-400">
                            {{ number_format(($employee->sent_tasks_sum_time_in_minutes ?? 0) / 60, 2) }} hrs
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-filament::page>
