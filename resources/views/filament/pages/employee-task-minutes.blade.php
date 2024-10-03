<x-filament::page>
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-900 dark:text-gray-100">Employee Task Summary</h1>

    <div class="mb-6 flex justify-center">
        <form method="GET" action="{{ url()->current() }}" class="flex items-center space-x-4">
            <input type="date" name="start_date" class="p-2 rounded-md bg-gray-200 dark:bg-gray-800 dark:text-gray-300 text-gray-900" value="{{ request('start_date') }}">
            <input type="date" name="end_date" class="p-2 rounded-md bg-gray-200 dark:bg-gray-800 dark:text-gray-300 text-gray-900" value="{{ request('end_date') }}">
            <button type="submit" class="bg-indigo-600 text-white p-2 rounded-md hover:bg-indigo-500 transition duration-200 dark:bg-indigo-500 dark:hover:bg-indigo-400">Filter</button>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white dark:bg-gray-900 shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-300">
                <tr>
                    <th class="py-4 px-6 text-left text-sm uppercase font-semibold tracking-wider">Employee Name</th>
                    <th class="py-4 px-6 text-left text-sm uppercase font-semibold tracking-wider">Total Minutes</th>
                    <th class="py-4 px-6 text-left text-sm uppercase font-semibold tracking-wider">Total Hours</th>
                    <th class="py-4 px-6 text-left text-sm uppercase font-semibold tracking-wider">Exact Time (mins)</th>
                    <th class="py-4 px-6 text-left text-sm uppercase font-semibold tracking-wider">Exact Time (hrs)</th> <!-- العمود الجديد لعرض exact_time بالساعات -->
                    <th class="py-4 px-6 text-left text-sm uppercase font-semibold tracking-wider">Difference (hrs)</th> <!-- العمود الجديد لعرض الفارق بين الساعات -->
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($this->employees as $employee)
                    <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition ease-in-out duration-200">
                        <td class="py-4 px-6 text-gray-900 dark:text-gray-100 font-medium">{{ $employee->name }}</td>
                        <td class="py-4 px-6 text-gray-700 dark:text-gray-400">{{ $employee->sent_tasks_sum_time_in_minutes ?? 0 }} mins</td>
                        <td class="py-4 px-6 text-gray-700 dark:text-gray-400">
                            {{ number_format(($employee->sent_tasks_sum_time_in_minutes ?? 0) / 60, 2) }} hrs
                        </td>
                        <td class="py-4 px-6 text-gray-700 dark:text-gray-400">{{ $employee->sent_tasks_sum_exact_time ?? 0 }} mins</td>
                        <td class="py-4 px-6 text-gray-700 dark:text-gray-400">
                            {{ number_format(($employee->sent_tasks_sum_exact_time ?? 0) / 60, 2) }} hrs <!-- عرض exact_time بالساعات -->
                        </td>
                        <td class="py-4 px-6 text-gray-700 dark:text-gray-400">
                            {{ number_format((($employee->sent_tasks_sum_time_in_minutes ?? 0) - ($employee->sent_tasks_sum_exact_time ?? 0)) / 60, 2) }} hrs <!-- حساب الفارق بالساعات -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-filament::page>
