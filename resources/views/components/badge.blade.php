@props(['text', 'color' => 'slate'])

@php
$modernColors = [
    'slate' => 'bg-slate-100 text-slate-700',
    'neutral' => 'bg-neutral-100 text-neutral-700',
    'sky' => 'bg-sky-100 text-sky-700',
    'indigo' => 'bg-indigo-100 text-indigo-700',
    'emerald' => 'bg-emerald-100 text-emerald-700',
    'amber' => 'bg-amber-100 text-amber-700',
];

$classes = $modernColors[$color] ?? $modernColors['slate'];
@endphp

<span class="{{ $classes }} font-medium px-3 py-1 rounded-full text-sm font-geologica">
    {{ $text }}
</span>