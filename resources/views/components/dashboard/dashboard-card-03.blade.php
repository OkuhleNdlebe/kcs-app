<div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
    <div class="px-5 pt-5">
        <header class="flex justify-between items-start mb-2">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Users</h2>

        </header>
        <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1"> Number of Registered Users</div>
        <div class="flex items-start">
            <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">{{ \App\Models\User::count() }}</div>
            <div class="text-sm font-medium text-green-700 px-1.5 bg-green-500/20 rounded-full">Total</div>
        </div>
    </div>
    <!-- Chart built with Chart.js 3 -->
    <!-- Check out src/js/components/dashboard-card-03.js for config -->
    <div class="grow max-sm:max-h-[128px] xl:max-h-[128px]">
        <!-- Change the height attribute to adjust the chart height -->
        <canvas id="dashboard-card-03" width="389" height="128"></canvas>
    </div>
</div>
