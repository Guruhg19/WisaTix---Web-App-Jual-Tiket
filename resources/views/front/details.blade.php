    <!doctype html>
    <html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('output.css') }}" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    </head>
    <body>
        <div class="relative flex flex-col w-full min-h-screen max-w-[640px] mx-auto bg-white">
            <header class="relative h-[480px] mb-[44px]">
                <div id="Absolute-Top-Nav" class="absolute flex items-center justify-between w-full px-4 mt-[60px] z-10">
                    <a href="{{ route('front.index') }}">
                        <img src="{{asset('assets/images/icons/back.svg')}}" class="w-12 h-12" alt="icon">
                    </a>
                    <a href="#">
                        <img src="{{asset('assets/images/icons/heart.svg')}}" class="w-12 h-12" alt="icon">
                    </a>
                </div>
                <div id="Title" class="absolute bottom-0 w-full p-4 pt-0 z-10">
                    <div class="flex items-center justify-between w-full h-fit rounded-[17px] border border-white/40 p-[8px_10px] bg-[#94959966] backdrop-blur-sm z-10">
                        <div>
                            <h1 class="font-bold text-white line-clamp-2">{{ $ticket->name }}</h1>
                            <div class="flex items-center gap-[6px]">
                                <img src="{{Storage::url($ticket->category->icon)}}" class="w-[22px] h-[22px]" alt="icon">
                                <p class="text-sm leading-[18px] text-white">{{ $ticket->category->name }}</p>
                            </div>
                        </div>
                        <p class="w-fit flex shrink-0 items-center gap-[2px] rounded-full p-[6px_8px] bg-white">
                            <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="w-4 h-4" alt="star">
                            <span class="font-semibold text-xs leading-[18px]">4/5</span>
                        </p>
                    </div>
                </div>
                <div class="swiper-gallery w-full overflow-hidden">
                    <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="relative flex items-center w-full h-[480px] shrink-0 bg-[#13181D] overflow-hidden">
                                    <img src="{{Storage::url($ticket->thumbnail)}}" class="absolute w-full h-full object-cover" alt="thumbnail">
                                </div>
                            </div>
                        @forelse ($ticket->photos as $itemPhoto)
                            <div class="swiper-slide">
                                <div class="relative flex items-center w-full h-[480px] shrink-0 bg-[#13181D] overflow-hidden">
                                    <img src="{{Storage::url($itemPhoto->photo)}}" class="absolute w-full h-full object-cover" alt="thumbnail">
                                </div>
                            </div>
                        @empty
                            <p>Foto belum ditambahkan</p>
                        @endforelse

                        <div class="swiper-slide">
                            <div class="relative flex items-center w-full h-[480px] shrink-0 bg-[#13181D] overflow-hidden">
                                <div id="playBtn" class="absolute w-full h-full z-10 bg-transparent"></div>
                                <div class="plyr__video-embed" id="player" style="width: 100%; height: 100%;">
                                    <iframe
                                        src="https://www.youtube.com/embed/{{$ticket->path_video}}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                                        allowfullscreen
                                        allowtransparency
                                        allow="autoplay"
                                    ></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination !relative !bottom-auto flex items-center justify-center gap-[6px] py-5"></div>
                </div>
            </header>
            <main id="details" class="flex flex-col gap-5 px-4 pb-[116px]">
                <section id="Get-to-Know" class="flex flex-col gap-[6px]">
                    <h2 class="font-bold text-sm leading--[21px]">Get to Know</h2>
                    <p class="text-sm leading-[28px]">{!! $ticket->about !!}</p>
                </section>
                <section id="Time" class="flex flex-col gap-[6px]">
                    <h2 class="font-bold text-sm leading--[21px]">Time</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center rounded-3xl p-[14px_16px] gap-4 bg-[#F8F8F9]">
                            <img src="{{asset('assets/images/icons/timer.svg')}}" class="w-6 h-6" alt="icon">
                            <div class="text-left">
                                <p class="text-sm leading-[21px]">Open Time</p>
                                <p class="font-bold text-lg leading-[27px]">{{ $ticket->open_time_at }}</p>
                            </div>
                        </div>
                        <div class="flex items-center rounded-3xl p-[14px_16px] gap-4 bg-[#F8F8F9]">
                            <img src="{{asset('assets/images/icons/clock.svg')}}" class="w-6 h-6" alt="icon">
                            <div class="text-left">
                                <p class="text-sm leading-[21px]">Closed Time</p>
                                <p class="font-bold text-lg leading-[27px]">{{ $ticket->close_time_at }}</p>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="Travel-with-Juara" class="flex flex-col gap-[6px]">
                    <h2 class="font-bold text-sm leading-[21px]">Get to Know</h2>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="flex flex-col items-center rounded-3xl p-[14px_16px] gap-3 text-center bg-[#13181D]">
                            <img src="{{asset('assets/images/icons/security-card.svg')}}" class="w-9 h-9" alt="icon">
                            <div>
                                <h3 class="font-bold text-sm leading-[21px] text-white">Security</h3>
                                <p class="text-xs leading-[18px] text-white">24/7 Support</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center rounded-3xl p-[14px_16px] gap-3 text-center bg-[#13181D]">
                            <img src="{{asset('assets/images/icons/hospital.svg')}}" class="w-9 h-9" alt="icon">
                            <div>
                                <h3 class="font-bold text-sm leading-[21px] text-white">Insurance</h3>
                                <p class="text-xs leading-[18px] text-white">Available</p>
                            </div>
                        </div>
                        <div class="flex flex-col items-center rounded-3xl p-[14px_16px] gap-3 text-center bg-[#13181D]">
                            <img src="{{asset('assets/images/icons/lovely.svg')}}" class="w-9 h-9" alt="icon">
                            <div>
                                <h3 class="font-bold text-sm leading-[21px] text-white">Comfort</h3>
                                <p class="text-xs leading-[18px] text-white">Easy Refund</p>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="Management" class="flex flex-col gap-[6px]">
                    <h2 class="font-bold text-sm leading--[21px]">Management</h2>
                    <div class="flex items-center justify-between rounded-3xl p-[10px] pr-[14px] bg-[#F8F8F9]">
                        <div class="flex items-center gap-[14px]">
                            <div class="w-[60px] h-[60px] rounded-[20px] overflow-hidden">
                                <img src="{{Storage::url($ticket->seller->photo)}}" class="w-full h-full object-cover" alt="">
                            </div>
                            <div>
                                <p class="font-bold text-lg leading-[27px]">{{ $ticket->seller->name }}</p>
                                <p class="text-sm leading-[21px]">{{ $ticket->seller->tickets->count() }}</p>
                            </div>
                        </div>
                        <a href="#">
                            <img src="{{asset('assets/images/icons/call-orange.svg')}}" class="w-10 h-10" alt="">
                        </a>
                    </div>
                </section>
                <section id="Map" class="flex flex-col gap-[10px]">
                    <h2 class="font-bold text-sm leading--[21px]">Map & Address</h2>
                    <div class="w-full h-[200px] overflow-hidden">
                        <div id="embedded-map-display" class="w-full h-full">
                            <iframe class="w-full h-full" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q={{$ticket->address}}&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                        </div>
                    </div>
                    <p class="text-sm leading-[28px]">{{ $ticket->address }}</p>
                </section>
            </main>
            <nav id="Bottom-Nav-Book" class="fixed bottom-0 flex items-center justify-between w-full max-w-[640px] bg-white p-4 z-30">
                <div>
                    <p class="font-bold text-[22px] leading-[26px]">Rp. {{ number_format($ticket->price, 0, '.', ',')  }}</p>
                    <p class="text-sm leading-[26px] text-[#70758F]">/person</p>
                </div>
                <a href="booking.html">
                    <div class="flex items-center p-1 pl-5 w-fit gap-4 rounded-full bg-[#13181D]">
                        <p class="font-bold text-white">Book Now</p>
                        <img src="{{asset('assets/images/icons/coupon.svg')}}" class="w-[50px] h-[50px]" alt="icon">
                    </div>
                </a>
            </nav>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
        <script defer src="{{ asset('js/details.js') }}"></script>
        <script>
            const player = new Plyr('#player', {
                controls: ['play-large'],
                speed: {selected: 1}
            });

            const playBtn = document.getElementById("playBtn");
            let played = false

            playBtn.addEventListener("click", () => {
                if(!played){
                    player.play();
                    played = true;
                }
                else{
                    player.pause();
                    played = false;
                }
            });
        </script>

    </body>
    </html>