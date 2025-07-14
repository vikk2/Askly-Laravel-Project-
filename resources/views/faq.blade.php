@extends('layouts.app')

@section('title', 'FAQ')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    <h1 class="text-4xl font-bold text-slate-700 mb-3">Frequently Asked Questions (FAQ)</h1>
    <p class="text-slate-500 mb-20 text-lg">Find answers to common questions about using our platform</p>

    <div class="faq-item border border-gray-300 rounded-lg mb-4">
        <button class="faq-question flex justify-between items-center w-full p-4 font-semibold text-left focus:outline-none">
            What is the main purpose of this platform?
            <svg class="faq-arrow w-5 h-5 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <div class="faq-answer px-4 pb-4 hidden text-gray-700 transition-all duration-300 ease-in-out">
            Our platform is designed to be a collaborative knowledge sharing community where users can ask questions...
        </div>
    </div>

    <div class="faq-item border border-gray-300 rounded-lg mb-4">
        <button class="faq-question flex justify-between items-center w-full p-4 font-semibold text-left focus:outline-none">
            How do I create an account?
            <svg class="faq-arrow w-5 h-5 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        <div class="faq-answer px-4 pb-4 hidden text-gray-700 transition-all duration-300 ease-in-out">
            You can create an account by clicking the sign up button and filling out the form...
        </div>
    </div>
</div>

@endsection