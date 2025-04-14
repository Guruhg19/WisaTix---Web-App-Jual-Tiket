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
            <div id="background" class="absolute w-full top-0 bg-[#13181D] h-[430px] rounded-b-[50px]">
            </div>
            <div id="Top-Nav" class="relative flex items-center justify-between w-full px-4 mt-[60px]">
                <a href="{{ route('front.index') }}">
                    <img src="{{asset('assets/images/icons/back.svg')}}" class="w-12 h-12" alt="icon">
                </a>
                <h1 class="font-bold text-lg leading-[27px] text-white text-center w-full">Category</h1>
                <img src="{{asset('assets/images/icons/Ellipse 3.svg')}}" class="absolute transform -translate-x-1/2 left-1/2" alt="background">
                <a href="#">
                    <img src="{{asset('assets/images/icons/heart.svg')}}" class="w-12 h-12" alt="icon">
                </a>
            </div>
            <main class="relative flex flex-col w-full gap-[30px] mt-[30px] overflow-x-hidden">
                <div class="flex flex-col gap-2 px-4">
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ Storage::url($category->icon_white) }}" class="w-[22px] h-[22px]" alt="icon">
                        <p class="font-semibold text-sm leading-[21px] text-white">{{ $category->name }}</p>
                    </div>
                    <p class="font-bold text-xl leading-[30px] text-white">
                        Browse <span class="text-[#F97316]">{{ $category->tickets->count() }}</span> Places <br>
                        Available Worth to Visit
                    </p>
                </div>
                <section id="Places" class="flex flex-col gap-3 px-4 pb-10">
                    @forelse ($category->tickets as $item)
                        <a href="{{ route('front.details', $item->slug) }}" class="card">
                            <div class="flex items-center justify-between rounded-3xl p-[6px] pr-[14px] bg-white overflow-hidden">
                                <div class="flex items-center gap-[14px]">
                                    <div class="flex w-[90px] h-[90px] shrink-0 rounded-3xl bg-[#D9D9D9] overflow-hidden">
                                        <img src="{{ Storage::url($item->thumbnail) }}" class="w-full h-full object-cover" alt="thumbnail">
                                    </div>
                                    <div class="flex flex-col gap-[6px]">
                                        <h3 class="font-semibold">{{ $item->name }}</h3>
                                        <div class="flex items-center gap-1">
                                            <img src="{{asset('assets/images/icons/location.svg')}}" class="w-[18px] h-[18px]" alt="icon">
                                            <p class="font-semibold text-xs leading-[18px]">{{ $item->seller->name }}</p>
                                        </div>
                                        <p class="font-bold text-sm leading-[21px] text-[#F97316]">Rp. {{ number_format($item->price, 0, '.', ',')  }}</p>
                                    </div>
                                </div>
                                <p class="w-fit flex shrink-0 items-center gap-[2px] rounded-full p-[6px_8px] bg-[#FFE5D3]">
                                    <img src="{{asset('assets/images/icons/Star 1.svg')}}" class="w-4 h-4" alt="star">
                                    <span class="font-semibold text-xs leading-[18px] text-[#F97316]">4/5</span>
                                </p>
                            </div>
                        </a>
                    @empty
                        <p>Belum ada Category.</p>
                    @endforelse

                </section>
            </main>
        </div>

    </body>
    </html>