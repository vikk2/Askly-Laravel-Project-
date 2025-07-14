@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold text-slate-700 mb-2 text-center">Privacy Policy</h1>
    <p class="text-gray-400 text-center mb-20">Last Updated: May 17, 2025</p>
    <p class="text-gray-700 mb-4">
        At Askly, we respect your privacy and are committed to protecting your personal data. This privacy policy will inform you about how we look after your personal data when you visit our website and tell you about your privacy rights and how the law protects you.
    </p>
    <p class="text-gray-700 mb-4">
        Please read this privacy policy carefully before using our Services. By using our Services, you're accepting the practices described in this privacy policy.
    </p>

    <h2 class="text-xl font-semibold mt-6 mb-2">1. Information We Collect</h2>
    <p class="text-gray-700 mb-4">We may collect personal information such as your name, email address, and any data you provide during account registration or article creation.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">2. How We Use Your Information</h2>
    <p class="text-gray-700 mb-4">We use your information to operate and improve our website, communicate with you, and deliver services like article sharing and commenting.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">3. Sharing Your Information</h2>
    <p class="text-gray-700 mb-4">We do not share your personal information with third parties unless required by law.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">4. Data Security</h2>
    <p class="text-gray-700 mb-4">We implement standard security measures to protect your information from unauthorized access or disclosure.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">5. Changes to This Policy</h2>
    <p class="text-gray-700 mb-4">We may update this Privacy Policy from time to time. Updates will be posted on this page with a new effective date.</p>

    <h2 class="text-xl font-semibold mt-6 mb-2">6. Contact Us</h2>
    <p class="text-gray-700 mb-4">If you have any questions about this policy, please contact us at <a href="mailto:askly.heaven@gmail.com" class="text-blue hover:underline">support@example.com</a>.</p>

    <p class="text-sm text-gray-500 mt-8">Effective Date: {{ now()->format('F j, Y') }}</p>
</div>
@endsection