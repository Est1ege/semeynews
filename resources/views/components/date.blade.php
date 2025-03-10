{{-- resources/views/components/date.blade.php --}}
@props(['date', 'format' => 'full'])

@php
    if (! $date instanceof \Carbon\Carbon) {
        $date = \Carbon\Carbon::parse($date);
    }
    
    $locale = app()->getLocale();
    
    switch ($format) {
        case 'day_month':
            if ($locale === 'ru' || $locale === 'kk') {
                $formatted = $date->translatedFormat('j F');
            } else {
                $formatted = $date->format('M j');
            }
            break;
            
        case 'full':
            if ($locale === 'ru' || $locale === 'kk') {
                $formatted = $date->translatedFormat('j F Y');
            } else {
                $formatted = $date->format('M j, Y');
            }
            break;
            
        case 'time':
            $formatted = $date->format('H:i');
            break;
            
        case 'time_ago':
            $formatted = $date->diffForHumans();
            break;
            
        default:
            $formatted = $date->format($format);
    }
@endphp

<span {{ $attributes }}>{{ $formatted }}</span>

{{-- Использование: --}}
{{-- <x-date :date="$post->created_at" format="full" class="text-muted" /> --}}