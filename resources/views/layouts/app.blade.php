<!DOCTYPE html>
<html>

<head>
<title>Task List App</title>
<script src="https://cdn.tailwindcss.com"></script>
<style type="text/tailwindcss">
.btn {
    @apply rounded-md px-2 py-1 text-center text-slate-800 font-medium shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50}
.link {
    @apply font-medium text-gray-700 underline decoration-pink-500}
label {
    @apply block uppercase text-slate-700 mb-2}
input,textarea {
    @apply border-slate-700 shadow-sm appearance-none border w-full py-2 px-3 leading-tight focus:outline-none}
.error {
    @apply text-red-500 text-sm}

</style>
@yield('styles')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
<h1 class="mb-4 text-3xl">@yield('title')</h1>
<div x-data="{ flash: true }">
@if (session()->has('success'))
<div>{{ session('success') }}</div>
@endif
@yield('content')
</div>
</body>

</html>
