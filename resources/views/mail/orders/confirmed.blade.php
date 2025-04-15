<x-mail::message>
Hi {{ $booking->name }}, terimakasih telah memesan tiket wisata di WisaTix. Kami sedang memeriksa pembayaran anda saat ini. Anda dapat memeriksa secara berkala pada website kami dan berikut adalah Booking Transaction ID Anda: {{ $booking->booking_trx_id }}

<x-mail::button :url="route('front.check_booking')">
Check booking
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>