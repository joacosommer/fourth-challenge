<!doctype html>

<title>Fourth Challenge</title>
<link href="/css/app.css" rel="stylesheet">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
{{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}

<style>
    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .clamp.one-line {
        -webkit-line-clamp: 1;
    }
</style>
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-white">
    <!-- Header -->
    <div class="relative pb-32 bg-gray-800">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover" src="https://www.lufthansa.com/content/dam/lh/images/pixels_variations/c-26792747-1413254.transform/lh-dcep-transform-width-1440/img.jpg" alt="">
            <div class="absolute inset-0 bg-gray-800 mix-blend-multiply" aria-hidden="true"></div>
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white md:text-5xl lg:text-6xl">Light-it Airlines</h1>
        </div>
    </div>

    <!-- Overlapping cards -->
    <section class="-mt-32 max-w-7xl mx-auto relative z-10 pb-32 px-4 sm:px-6 lg:px-8" aria-labelledby="contact-heading">
        <h2 class="sr-only" id="contact-heading">Cities</h2>
        <div class="grid grid-cols-1 gap-y-20 lg:grid-cols-3 lg:gap-y-0 lg:gap-x-8">
            <div class="flex flex-col bg-white rounded-2xl shadow-xl">
                <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
                    <div class="absolute top-0 p-5 inline-block bg-indigo-600 rounded-xl shadow-lg transform -translate-y-1/2">
                        <!-- Heroicon name: outline/phone -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900">Cities</h3>
                </div>
                <div class="p-6 bg-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
                    <a href="/cities" class="text-base font-medium text-indigo-700 hover:text-indigo-600">Go<span aria-hidden="true"> &rarr;</span></a>
                </div>
            </div>

            <div class="flex flex-col bg-white rounded-2xl shadow-xl">
                <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
                    <div class="absolute top-0 p-5 inline-block bg-indigo-600 rounded-xl shadow-lg transform -translate-y-1/2">
                        <!-- Heroicon name: outline/support -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900">Airlines</h3>
                </div>
                <div class="p-6 bg-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
                    <a href="/airlines" class="text-base font-medium text-indigo-700 hover:text-indigo-600">Go<span aria-hidden="true"> &rarr;</span></a>
                </div>
            </div>

            <div class="flex flex-col bg-white rounded-2xl shadow-xl">
                <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
                    <div class="absolute top-0 p-5 inline-block bg-indigo-600 rounded-xl shadow-lg transform -translate-y-1/2">
                        <!-- Heroicon name: outline/newspaper -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900">Flights</h3>
                </div>
                <div class="p-6 bg-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
                    <a href="http://localhost:3000/" class="text-base font-medium text-indigo-700 hover:text-indigo-600">Go<span aria-hidden="true"> &rarr;</span></a>
                </div>
            </div>
        </div>
    </section>
</div>
