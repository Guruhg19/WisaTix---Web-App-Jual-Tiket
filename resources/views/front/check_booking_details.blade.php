    <!doctype html>
    <html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('output.css') }}" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    </head>
    <body>
        <div class="relative flex flex-col w-full min-h-screen max-w-[640px] mx-auto bg-[#F8F8F9]">
            <div id="background" class="fixed w-full max-w-[640px] top-0 h-screen z-0">
                <div class="absolute z-0 w-full h-[459px] bg-[linear-gradient(180deg,#000000_12.61%,rgba(0,0,0,0)_70.74%)]"></div>
                <img src="{{Storage::url($bookingDetails->ticket->thumbnail )}}" class="w-full h-full object-cover" alt="background">
            </div>
            <div id="Top-Nav-Fixed" class="relative flex items-center justify-between w-full max-w-[640px] px-4 mt-[60px] z-20">
                <div class="fixed flex items-center justify-between w-full max-w-[640px] -ml-4 px-4 mx-auto">
                    <a href="{{ route('front.check_booking') }}">
                        <img src="{{asset('assets/images/icons/back.svg')}}" class="w-12 h-12" alt="icon">
                    </a>
                    <a href="#">
                        <img src="{{asset('assets/images/icons/heart.svg')}}" class="w-12 h-12" alt="icon">
                    </a>
                </div>
                <div class="flex items-center justify-center h-12 w-full shrink-0">
                    <h1 class="font-bold text-lg leading-[27px] text-white text-center w-full">Booking Details</h1>
                </div>
            </div>
            <main class="relative flex flex-col w-full px-4 gap-[18px] mt-5 pb-[30px] overflow-x-hidden">
                <div class="flex items-center justify-between rounded-3xl p-[6px] pr-[14px] bg-white overflow-hidden">
                    <div class="flex items-center gap-[14px]">
                        <div class="flex w-[90px] h-[90px] shrink-0 rounded-3xl bg-[#D9D9D9] overflow-hidden">
                            <img src="{{Storage::url($bookingDetails->ticket->thumbnail )}}" class="w-full h-full object-cover" alt="thumbnail">
                        </div>
                        <div class="flex flex-col gap-[6px]">
                            <h3 class="font-semibold">{{ $bookingDetails->ticket->name }}</h3>
                            <div class="flex items-center gap-1">
                                <img src="{{asset('assets/images/icons/location.svg')}}" class="w-[18px] h-[18px]" alt="icon">
                                <p class="font-semibold text-xs leading-[18px]">{{ $bookingDetails->ticket->seller->name }}</p>
                            </div>
                            <p class="font-bold text-sm leading-[21px] text-[#F97316]">Rp. {{ number_format($bookingDetails->ticket->price, 0, ',', '.')  }}</p>
                        </div>
                    </div>
                    <p class="w-fit flex shrink-0 items-center gap-[2px] rounded-full p-[6px_8px] bg-[#FFE5D3]">
                        <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="w-4 h-4" alt="star">
                        <span class="font-semibold text-xs leading-[18px] text-[#F97316]">4/5</span>
                    </p>
                </div>
                <div class="relative w-[361px] h-[504px] shrink-0 mx-auto overflow-hidden">
                    <img src="{{asset('assets/images/backgrounds/receipt.svg')}}" class="absolute w-full h-full object-contain" alt="background">
                    <div class="relative flex flex-col p-5 pb-[30px] gap-6">
                        <img src="{{asset('assets/images/icons/ticket-star.svg')}}" class="w-20 h-20 mx-auto" alt="icon">
                        <div class="flex flex-col gap-[14px] shrink-0 h-full">
                            <div class="flex items-center justify-between">
                                <p class="font-bold text-sm leading-[21px]">Booking TRX ID</p>
                                <p class="font-bold text-xl leading-[30px]">{{ $bookingDetails->booking_trx_id }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="font-bold text-sm leading-[21px]">Started At</p>
                                <p class="font-bold text-sm leading-[21px] text-[#FF1927]">{{ $bookingDetails->started_at->format('M d, Y') }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="font-bold text-sm leading-[21px]">Total People</p>
                                <p class="font-bold text-sm leading-[21px]">{{ $bookingDetails->total_participant }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="font-bold text-sm leading-[21px]">Insurance</p>
                                <p class="font-bold text-sm leading-[21px]">Included 100%</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="font-bold text-sm leading-[21px]">Grand Total</p>
                                <p class="font-bold text-[22px] leading-[33px] text-[#F97316]">Rp. {{ number_format($bookingDetails->total_amount, 0, ',', '.')  }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <p class="font-bold text-sm leading-[21px]">Payment Status</p>
                                @if ($bookingDetails->is_paid)
                                    <p class="w-fit rounded-full p-[6px_12px] bg-[#07B704] font-bold text-xs leading-[18px] text-white">SUCCESS</p>
                                @else
                                    <p class="w-fit rounded-full p-[6px_12px] bg-[#13181D] font-bold text-xs leading-[18px] text-white">PENDING</p>
                                @endif
                            </div>
                        </div>
                        <hr class="w-[321px] mx-auto border border-[#D0D5DC] border-dashed">
                        <div class="flex items-center rounded-[20px] p-[10px] gap-[10px] bg-[#F8F8F9]">
                            <img src="{{asset('assets/images/icons/ticket-star-black.svg')}}" class="w-8 h-8" alt="icon">
                            <p class="leading-[28px]">Gunakan kode <span class="font-bold">{{ $bookingDetails->booking_trx_id }}</span> ketika menukarkan dengan tiket asli</p>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </body>
    </html>