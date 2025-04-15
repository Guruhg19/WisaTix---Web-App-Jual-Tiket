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
                <img src="{{Storage::url($bookingTransaction->ticket->thumbnail)}}" class="w-full h-full object-cover" alt="background">
            </div>
            <div id="Top-Nav-Fixed" class="flex items-center justify-between w-full max-w-[640px] px-4 mt-[60px] z-20">
                <h1 class="font-bold text-lg leading-[27px] text-white text-center w-full">Success Booking</h1>
            </div>
            <div class="relative mt-5 flex flex-1 justify-center items-center p-4 w-full h-full">
                <div class="flex flex-col h-fit w-full max-w-[361px] rounded-[30px] p-5 gap-6 bg-white">
                    <img src="{{asset('assets/images/icons/ticket-star.svg')}}" class="w-20 h-20 mx-auto" alt="icon">
                    <h1 class="font-bold text-2xl leading-9 text-center">Booking Finished, <br>Well Done! 🤩</h1>
                    <a href="booking-details.html">
                        <div class="flex items-center w-full rounded-full transition-all duration-300 hover:ring-1 hover:ring-[#F97316] py-3 px-4 gap-4 bg-[#F8F8F9]">
                            <img src="{{asset('assets/images/icons/receipt-text.svg')}}" class="w-8 h-8 flex shrink-0" alt="icon">
                            <p>Booking ID <span class="font-bold text-[#07B704]">{{ $bookingTransaction->booking_trx_id }}</span></p>
                        </div>
                    </a>
                    <p class="leading-[28px] text-center">We will check the payment and update the status to your email address</p>
                    <div class="flex flex-col gap-3">
                        <a href="{{ route('front.index') }}" class="w-full rounded-full p-[14px_20px] text-white text-center bg-[#F97316] font-bold">
                            Explore More Tickets
                        </a>
                        <a href="{{ route('front.check_booking') }}" class="w-full rounded-full p-[14px_20px] text-white text-center bg-[#13181D] font-bold">
                            View My Booking
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </body>
    </html>