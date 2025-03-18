<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
        <!-- Total Candidates Card -->
        <div class="bg-white rounded-lg shadow-sm p-5 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-700">Total Candidates</h3>
                <div class="p-2 bg-blue-50 rounded-full text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline">
                <span class="text-3xl font-bold">3,782</span>
                <span class="ml-2 text-sm text-green-500 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    11.01%
                </span>
            </div>
            <p class="text-sm text-gray-500 mt-1">Compared to last week</p>
        </div>
        
        <!-- Assessment Criteria Card -->
        <div class="bg-white rounded-lg shadow-sm p-5 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-700">Assessment Criteria</h3>
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
                    <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.80443 5.60156C7.59109 5.60156 6.60749 6.58517 6.60749 7.79851C6.60749 9.01185 7.59109 9.99545 8.80443 9.99545C10.0178 9.99545 11.0014 9.01185 11.0014 7.79851C11.0014 6.58517 10.0178 5.60156 8.80443 5.60156ZM5.10749 7.79851C5.10749 5.75674 6.76267 4.10156 8.80443 4.10156C10.8462 4.10156 12.5014 5.75674 12.5014 7.79851C12.5014 9.84027 10.8462 11.4955 8.80443 11.4955C6.76267 11.4955 5.10749 9.84027 5.10749 7.79851ZM4.86252 15.3208C4.08769 16.0881 3.70377 17.0608 3.51705 17.8611C3.48384 18.0034 3.5211 18.1175 3.60712 18.2112C3.70161 18.3141 3.86659 18.3987 4.07591 18.3987H13.4249C13.6343 18.3987 13.7992 18.3141 13.8937 18.2112C13.9797 18.1175 14.017 18.0034 13.9838 17.8611C13.7971 17.0608 13.4132 16.0881 12.6383 15.3208C11.8821 14.572 10.6899 13.955 8.75042 13.955C6.81096 13.955 5.61877 14.572 4.86252 15.3208ZM3.8071 14.2549C4.87163 13.2009 6.45602 12.455 8.75042 12.455C11.0448 12.455 12.6292 13.2009 13.6937 14.2549C14.7397 15.2906 15.2207 16.5607 15.4446 17.5202C15.7658 18.8971 14.6071 19.8987 13.4249 19.8987H4.07591C2.89369 19.8987 1.73504 18.8971 2.05628 17.5202C2.28015 16.5607 2.76117 15.2906 3.8071 14.2549ZM15.3042 11.4955C14.4702 11.4955 13.7006 11.2193 13.0821 10.7533C13.3742 10.3314 13.6054 9.86419 13.7632 9.36432C14.1597 9.75463 14.7039 9.99545 15.3042 9.99545C16.5176 9.99545 17.5012 9.01185 17.5012 7.79851C17.5012 6.58517 16.5176 5.60156 15.3042 5.60156C14.7039 5.60156 14.1597 5.84239 13.7632 6.23271C13.6054 5.73284 13.3741 5.26561 13.082 4.84371C13.7006 4.37777 14.4702 4.10156 15.3042 4.10156C17.346 4.10156 19.0012 5.75674 19.0012 7.79851C19.0012 9.84027 17.346 11.4955 15.3042 11.4955ZM19.9248 19.8987H16.3901C16.7014 19.4736 16.9159 18.969 16.9827 18.3987H19.9248C20.1341 18.3987 20.2991 18.3141 20.3936 18.2112C20.4796 18.1175 20.5169 18.0034 20.4837 17.861C20.2969 17.0607 19.913 16.088 19.1382 15.3208C18.4047 14.5945 17.261 13.9921 15.4231 13.9566C15.2232 13.6945 14.9995 13.437 14.7491 13.1891C14.5144 12.9566 14.262 12.7384 13.9916 12.5362C14.3853 12.4831 14.8044 12.4549 15.2503 12.4549C17.5447 12.4549 19.1291 13.2008 20.1936 14.2549C21.2395 15.2906 21.7206 16.5607 21.9444 17.5202C22.2657 18.8971 21.107 19.8987 19.9248 19.8987Z" fill=""></path>
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline">
                <span class="text-3xl font-bold">24</span>
                <span class="ml-2 text-sm text-green-500 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    8.5%
                </span>
            </div>
            <p class="text-sm text-gray-500 mt-1">Compared to last week</p>
        </div>
        
        <!-- Teachers Card -->
        <div class="bg-white rounded-lg shadow-sm p-5 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-700">Teachers</h3>
                <div class="p-2 bg-purple-50 rounded-full text-purple-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline">
                <span class="text-3xl font-bold">42</span>
                <span class="ml-2 text-sm text-green-500 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    7.2%
                </span>
            </div>
            <p class="text-sm text-gray-500 mt-1">Compared to last week</p>
        </div>
        
        <!-- Completed Assessments Card -->
        <div class="bg-white rounded-lg shadow-sm p-5 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-700">Completed Assessments</h3>
                <div class="p-2 bg-yellow-50 rounded-full text-yellow-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
            </div>
            <div class="flex items-baseline">
                <span class="text-3xl font-bold">5,359</span>
                <span class="ml-2 text-sm text-red-500 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                    9.05%
                </span>
            </div>
            <p class="text-sm text-gray-500 mt-1">Compared to last week</p>
        </div>
    </div>
    
    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Monthly Assessments Chart -->
        <div class="lg:col-span-2 bg-white rounded-lg shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-medium text-gray-700">Monthly Assessments</h3>
                <div class="flex space-x-2">
                    <button class="text-gray-400 hover:text-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="19" cy="12" r="1"></circle>
                            <circle cx="5" cy="12" r="1"></circle>
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="h-64 flex items-end space-x-2">
                <!-- Bar chart simulated with divs -->
                <div class="flex-1 flex flex-col justify-end items-center">
                    <div class="w-full bg-blue-500 rounded-t-md" style="height: 40%"></div>
                    <span class="text-xs text-gray-500 mt-2">Jan</span>
                </div>
                <div class="flex-1 flex flex-col justify-end items-center">
                    <div class="w-full bg-blue-500 rounded-t-md" style="height: 65%"></div>
                    <span class="text-xs text-gray-500 mt-2">Feb</span>
                </div>
                <div class="flex-1 flex flex-col justify-end items-center">
                    <div class="w-full bg-blue-500 rounded-t-md" style="height: 50%"></div>
                    <span class="text-xs text-gray-500 mt-2">Mar</span>
                </div>
                <div class="flex-1 flex flex-col justify-end items-center">
                    <div class="w-full bg-blue-500 rounded-t-md" style="height: 60%"></div>
                    <span class="text-xs text-gray-500 mt-2">Apr</span>
                </div>
                <div class="flex-1 flex flex-col justify-end items-center">
                    <div class="w-full bg-blue-500 rounded-t-md" style="height: 45%"></div>
                    <span class="text-xs text-gray-500 mt-2">May</span>
                </div>
                <div class="flex-1 flex flex-col justify-end items-center">
                    <div class="w-full bg-blue-500 rounded-t-md" style="height: 55%"></div>
                    <span class="text-xs text-gray-500 mt-2">Jun</span>
                </div>
                <div class="flex-1 flex flex-col justify-end items-center">
                    <div class="w-full bg-blue-500 rounded-t-md" style="height: 35%"></div>
                    <span class="text-xs text-gray-500 mt-2">Jul</span>
                </div>
                <div class="flex-1 flex flex-col justify-end items-center">
                    <div class="w-full bg-blue-500 rounded-t-md" style="height: 45%"></div>
                    <span class="text-xs text-gray-500 mt-2">Aug</span>
                </div>
                <div class="flex-1 flex flex-col justify-end items-center">
                    <div class="w-full bg-blue-500 rounded-t-md" style="height: 75%"></div>
                    <span class="text-xs text-gray-500 mt-2">Sep</span>
                </div>
                <div class="flex-1 flex flex-col justify-end items-center">
                    <div class="w-full bg-blue-500 rounded-t-md" style="height: 60%"></div>
                    <span class="text-xs text-gray-500 mt-2">Oct</span>
                </div>
                <div class="flex-1 flex flex-col justify-end items-center">
                    <div class="w-full bg-blue-500 rounded-t-md" style="height: 25%"></div>
                    <span class="text-xs text-gray-500 mt-2">Nov</span>
                </div>
                <div class="flex-1 flex flex-col justify-end items-center">
                    <div class="w-full bg-blue-500 rounded-t-md" style="height: 15%"></div>
                    <span class="text-xs text-gray-500 mt-2">Dec</span>
                </div>
            </div>
        </div>
        
        <!-- Monthly Target Chart -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
            <h3 class="text-lg font-medium text-gray-700 mb-4">Monthly Target</h3>
            
            <div class="mb-6 text-center">
                <div class="relative inline-block">
                    <!-- Circular progress indicator -->
                    <svg class="w-48 h-48" viewBox="0 0 100 100">
                        <!-- Background circle -->
                        <circle cx="50" cy="50" r="45" fill="none" stroke="#f3f4f6" stroke-width="8"/>
                        <!-- Progress arc (75.55% of the way around) -->
                        <circle cx="50" cy="50" r="45" fill="none" stroke="#4f46e5" stroke-width="8" stroke-dasharray="283" stroke-dashoffset="70" transform="rotate(-90 50 50)"/>
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center flex-col">
                        <span class="text-4xl font-bold">75.5%</span>
                        <span class="text-green-500 text-sm flex items-center mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                            </svg>
                            10%
                        </span>
                    </div>
                </div>
            </div>
            
            <p class="text-center text-gray-600 mb-6">You have completed 75.5% of your monthly assessment target. Keep up the good work!</p>
            
            <div class="grid grid-cols-3 gap-4 mt-4">
                <div class="text-center">
                    <p class="text-xs text-gray-500">Target</p>
                    <p class="text-lg font-semibold text-gray-800 flex items-center justify-center">
                        100
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </p>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500">Completed</p>
                    <p class="text-lg font-semibold text-gray-800 flex items-center justify-center">
                        75
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                    </p>
                </div>
                <div class="text-center">
                    <p class="text-xs text-gray-500">This Week</p>
                    <p class="text-lg font-semibold text-gray-800 flex items-center justify-center">
                        15
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Additional Charts and Tables -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Statistics Chart -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-medium text-gray-700">Statistics</h3>
                
                <div class="flex space-x-2">
                    <div class="inline-flex rounded-md shadow-sm" role="group">
                        <button type="button" class="px-4 py-2 text-sm font-medium text-primary bg-white border border-primary rounded-l-lg hover:bg-primary hover:text-white">
                            Overview
                        </button>
                        <button type="button" class="px-4 py-2 text-sm font-medium text-gray-600 bg-white border-t border-b border-gray-300 hover:bg-gray-100">
                            Progress
                        </button>
                        <button type="button" class="px-4 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100">
                            Results
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="h-64 relative">
                <!-- Line chart visualization with SVG -->
                <svg viewBox="0 0 600 200" class="w-full h-full">
                    <!-- Light grid lines -->
                    <line x1="0" y1="40" x2="600" y2="40" stroke="#f3f4f6" stroke-width="1" />
                    <line x1="0" y1="80" x2="600" y2="80" stroke="#f3f4f6" stroke-width="1" />
                    <line x1="0" y1="120" x2="600" y2="120" stroke="#f3f4f6" stroke-width="1" />
                    <line x1="0" y1="160" x2="600" y2="160" stroke="#f3f4f6" stroke-width="1" />
                    
                    <!-- Chart lines -->
                    <path d="M0,150 C50,120 100,110 150,90 C200,70 250,80 300,100 C350,120 400,80 450,60 C500,40 550,60 600,30" 
                        fill="none" stroke="#4f46e5" stroke-width="3" />
                    
                    <!-- Fill under the line -->
                    <path d="M0,150 C50,120 100,110 150,90 C200,70 250,80 300,100 C350,120 400,80 450,60 C500,40 550,60 600,30 L600,200 L0,200 Z" 
                        fill="url(#blue-gradient)" fill-opacity="0.2" />
                    
                    <!-- Gradient definition -->
                    <defs>
                        <linearGradient id="blue-gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%" stop-color="#4f46e5" stop-opacity="0.5" />
                            <stop offset="100%" stop-color="#4f46e5" stop-opacity="0.1" />
                        </linearGradient>
                    </defs>
                </svg>
                
                <!-- Month labels -->
                <div class="flex justify-between text-xs text-gray-500 absolute bottom-0 w-full px-2">
                    <span>Jan</span>
                    <span>Feb</span>
                    <span>Mar</span>
                    <span>Apr</span>
                    <span>May</span>
                    <span>Jun</span>
                    <span>Jul</span>
                    <span>Aug</span>
                    <span>Sep</span>
                    <span>Oct</span>
                    <span>Nov</span>
                    <span>Dec</span>
                </div>
            </div>
        </div>
        
        <!-- Recent Assessments Table -->
        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-medium text-gray-700">Recent Assessments</h3>
                <div class="flex space-x-2">
                    <button class="px-4 py-2 flex items-center text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        Filter
                    </button>
                    <a href="#" class="text-sm text-primary hover:underline">See all</a>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Candidate</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-sm font-semibold text-gray-700">JD</div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">John Doe</p>
                                        <p class="text-xs text-gray-500">English Test</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900">85/100</span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="text-sm text-gray-500">Today, 12:42 PM</span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Completed</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-sm font-semibold text-gray-700">AS</div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Alice Smith</p>
                                        <p class="text-xs text-gray-500">Math Assessment</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900">92/100</span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="text-sm text-gray-500">Today, 10:23 AM</span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Completed</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-sm font-semibold text-gray-700">RJ</div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Robert Johnson</p>
                                        <p class="text-xs text-gray-500">Science Quiz</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900">78/100</span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="text-sm text-gray-500">Yesterday, 3:15 PM</span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Completed</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-sm font-semibold text-gray-700">MP</div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Maria Parker</p>
                                        <p class="text-xs text-gray-500">History Exam</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900">88/100</span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="text-sm text-gray-500">Yesterday, 1:30 PM</span>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Completed</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>