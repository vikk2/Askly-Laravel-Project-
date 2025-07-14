@extends('layouts.app')

@section('title', 'Terms of Use')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-slate-700 mb-2 text-center">Terms of use</h1>
    <p class="text-gray-400 text-center mb-20">Last Updated: May 17, 2025</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">1. Acceptance of Terms</h2>
    <p class="text-gray-700 mb-4">
        By accessing or using our services, you agree to comply with these terms. If you do not agree, you may not use the site.
    </p>

    <h2 class="text-xl font-semibold mt-6 mb-2">2. User Accounts</h2>
    <p class="text-gray-700 mb-4">
        You are responsible for maintaining the confidentiality of your account and password. You agree to accept responsibility for all activities under your account.
    </p>

    <h2 class="text-xl font-semibold mt-6 mb-2">3. Content</h2>
    <p class="text-gray-700 mb-4">
        You retain ownership of the content you submit but grant us a license to display it on our platform. You agree not to post illegal or harmful content.
    </p>

    <h2 class="text-xl font-semibold mt-6 mb-2">4. Prohibited Conduct</h2>
    <p class="text-gray-700 mb-4">
        You agree not to use the service for any unlawful purpose, spam, or to attempt to breach security or disrupt our platform.
    </p>

    <h2 class="text-xl font-semibold mt-6 mb-2">5. Termination</h2>
    <p class="text-gray-700 mb-4">
        We reserve the right to suspend or terminate your access to the service at any time, without notice, for conduct that we believe violates these terms.
    </p>

    <h2 class="text-xl font-semibold mt-6 mb-2">6. Changes to Terms</h2>
    <p class="text-gray-700 mb-4">
        We may modify these terms at any time. Continued use of the site after changes are posted means you accept the updated terms.
    </p>

    <h2 class="text-xl font-semibold mt-6 mb-2">7. Contact Us</h2>
    <p class="text-gray-700 mb-4">
        If you have any questions about these Terms, please contact us at <a href="mailto:askly.heaven@gmail.com" class="text-blue hover:underline">support@example.com</a>.
    </p>

    <p class="text-sm text-gray-500 mt-8">Last Updated: {{ now()->format('F j, Y') }}</p>
</div>
@endsection