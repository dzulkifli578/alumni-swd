@php
    $header = "Dashboard";
@endphp

<div class="bg-base-300 rounded-xl shadow-xl p-6 m-6">
    <div class="flex justify-between items-center mb-2">
        <h1 class="text-xl font-semibold">{{ $header }}</h1>
        <ol class="breadcrumb flex space-x-2 text-sm">
            <li class="text-base-content">Home</li>
            <li class="text-base-content">/</li>
            <li class="text-accent"><a href="" class="text-blue-600 hover:underline">{{ $header }}</a></li>
        </ol>
    </div>
</div>