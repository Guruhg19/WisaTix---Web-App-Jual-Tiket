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
                <img src="{{Storage::url($ticket->thumbnail)}}" class="w-full h-full object-cover" alt="background">
            </div>
            <div id="Top-Nav-Fixed" class="relative flex items-center justify-between w-full max-w-[640px] px-4 mt-[60px] z-20">
                <div class="fixed flex items-center justify-between w-full max-w-[640px] -ml-4 px-4 mx-auto">
                    <a href="details.html">
                        <img src="{{asset('assets/images/icons/back.svg')}}" class="w-12 h-12" alt="icon">
                    </a>
                    <a href="#">
                        <img src="{{asset('assets/images/icons/heart.svg')}}" class="w-12 h-12" alt="icon">
                    </a>
                </div>
                <div class="flex items-center justify-center h-12 w-full shrink-0">
                    <h1 class="font-bold text-lg leading-[27px] text-white text-center w-full">Book a Ticket</h1>
                </div>
            </div>
            <form action="{{ route('front.booking_store', $ticket->slug) }}" method="POST" class="relative flex flex-col w-full px-4 gap-[18px] mt-5 pb-[30px] overflow-x-hidden">
                @csrf
                <div class="flex items-center justify-between rounded-3xl p-[6px] pr-[14px] bg-white overflow-hidden">
                    <div class="flex items-center gap-[14px]">
                        <div class="flex w-[90px] h-[90px] shrink-0 rounded-3xl bg-[#D9D9D9] overflow-hidden">
                            <img src="{{Storage::url($ticket->thumbnail)}}" class="w-full h-full object-cover" alt="thumbnail">
                        </div>
                        <div class="flex flex-col gap-[6px]">
                            <h3 class="font-semibold">{{ $ticket->name }}</h3>
                            <div class="flex items-center gap-1">
                                <img src="{{asset('assets/images/icons/location.svg')}}" class="w-[18px] h-[18px]" alt="icon">
                                <p class="font-semibold text-xs leading-[18px]">{{ $ticket->seller->location }}</p>
                            </div>
                            <p class="font-bold text-sm leading-[21px] text-[#F97316]">Rp. {{ number_format($ticket->price, 0, ',', '.')  }}
                            </p>
                            <input type="hidden" name="realTicketPrice" id="realTicketPrice" value="{{$ticket->price}}">
                        </div>
                    </div>
                    <p class="w-fit flex shrink-0 items-center gap-[2px] rounded-full p-[6px_8px] bg-[#FFE5D3]">
                        <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="w-4 h-4" alt="star">
                        <span class="font-semibold text-xs leading-[18px] text-[#F97316]">4/5</span>
                    </p>
                </div>
                <div class="flex flex-col rounded-[30px] p-5 gap-[14px] bg-white">
                    <div class="flex flex-col gap-[6px]">
                        <label for="name" class="font-semibold text-sm leading-[21px]">Full Name</label>
                        <div class="flex items-center rounded-full px-5 gap-[10px] bg-[#F8F8F9] transition-all duration-300 focus-within:ring-1 focus-within:ring-[#F97316]">
                            <img src="{{asset('assets/images/icons/user-octagon.svg')}}" class="w-6 h-6" alt="icon">
                            <input type="text" name="name" id="name" class="appearance-none outline-none py-[14px] !bg-transparent w-full font-semibold text-sm leading-[21px] placeholder:font-normal placeholder:text-[#13181D]" placeholder="Write your complete name">
                        </div>
                    </div>
                    <div class="flex flex-col gap-[6px]">
                        <label for="email" class="font-semibold text-sm leading-[21px]">Email</label>
                        <div class="flex items-center rounded-full px-5 gap-[10px] bg-[#F8F8F9] transition-all duration-300 focus-within:ring-1 focus-within:ring-[#F97316]">
                            <img src="{{asset('assets/images/icons/sms.svg')}}" class="w-6 h-6" alt="icon">
                            <input type="email" name="email" id="email" class="appearance-none outline-none py-[14px] !bg-transparent w-full font-semibold text-sm leading-[21px] placeholder:font-normal placeholder:text-[#13181D]" placeholder="Write your email">
                        </div>
                    </div>
                    <div class="flex flex-col gap-[6px]">
                        <label for="phone" class="font-semibold text-sm leading-[21px]">Phone No.</label>
                        <div class="flex items-center rounded-full px-5 gap-[10px] bg-[#F8F8F9] transition-all duration-300 focus-within:ring-1 focus-within:ring-[#F97316]">
                            <img src="{{asset('assets/images/icons/mobile.svg')}}" class="w-6 h-6" alt="icon">
                            <input type="tel" name="phone_number" id="phone" class="appearance-none outline-none py-[14px] !bg-transparent w-full font-semibold text-sm leading-[21px] placeholder:font-normal placeholder:text-[#13181D]" placeholder="Give us your number">
                        </div>
                    </div>
                    <div class="flex flex-col gap-[6px]">
                        <label for="started_at" class="font-semibold text-sm leading-[21px]">Choose Date</label>
                        <div class="flex items-center rounded-full px-5 gap-[10px] bg-[#F8F8F9] transition-all duration-300 focus-within:ring-1 focus-within:ring-[#F97316]">
                            <img src="{{asset('assets/images/icons/timer.svg')}}" class="w-6 h-6" alt="icon">
                            <input type="date" name="started_at" id="started_at" class="appearance-none outline-none py-[14px] !bg-transparent w-full font-semibold text-sm leading-[21px] placeholder:font-normal placeholder:text-[#13181D]" placeholder="Give us your number">
                        </div>
                    </div>
                </div>
                <div class="flex flex-col rounded-[30px] p-5 gap-6 bg-white">
                    <div class="flex justify-between items-center">
                        <p class="font-bold">How Many <br>People Buying?</p>
                        <div id="counter" class="flex items-center justify-between w-fit min-w-[135px] rounded-full p-[14px_20px] gap-[14px] bg-[#F8F8F9]">
                            <button type="button" id="minus" class="w-6 h-6">
                                <img src="{{asset('assets/images/icons/minus.svg')}}" alt="minus">
                            </button>
                            <p id="count-text" class="font-bold">1</p>
                            <input type="number" name="total_participant" id="people" value="1" class="hidden">
                            <button type="button" id="plus" class="w-6 h-6">
                                <img src="{{asset('assets/images/icons/add.svg')}}" alt="plus">
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <p class="font-semibold text-sm leading-[21px]">Sub Total</p>
                        <p id="total-price" class="font-bold text-[22px] leading-[33px] text-[#F97316]"></p>
                    </div>
                    <input type="hidden" name="sub_total" id="subTotal">
                    <input type="hidden" name="total_ppn" id="totalPpn">
                    <input type="hidden" name="total_amount" id="totalAmount">
                    <button type="submit" class="flex items-center justify-between p-1 pl-5 w-full gap-4 rounded-full bg-[#13181D]">
                        <p class="font-bold text-white">Continue to Checkout</p>
                        <img src="{{asset('assets/images/icons/card.svg')}}" class="w-[50px] h-[50px]" alt="icon">
                    </button>
                </div>
            </form>
        </div>

        <script src="{{ asset('js/booking.js') }}"></script>
    </body>
    </html>