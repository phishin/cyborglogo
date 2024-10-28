<!-- Intended for Example Purposes Only -->
@foreach ($fAQs as $faq)
<div class="mb-4 pb-4 border-b-4 border-gray-200">
    <h1 class="text-xl font-semibold text-gray-700">Q: {{ $faq['question'] }}</h1>
    <p class="mt-2 text-base text-gray-500">A: {{ $faq['answer'] }}</p>
</div>
@endforeach