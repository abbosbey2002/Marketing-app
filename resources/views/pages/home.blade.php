@extends('layouts.main')

@section('title', 'Маркетинговая Ассоциация Узбекистана')
@section('description', 'Маркетинговая Ассоциация Узбекистана. Цель Ассоциации: объединение юридических лиц и экспертов, заинтересованных в развитии маркетинга в Узбекистане, представление профессиональных интересов, совершенствование профессиональных норм и развитие кадрового потенциала маркетинговой отрасли.')


@section('content')
    <main class="main">
        <section class="section-box">
            <div class="banner-hero hero-5">
                <div class="banner-image-main">
                    <div class="img-bg"></div>
                    <div class="blur-bg blur-move"></div>
                </div>
                <div class="banner-inner-top">
                    <div class="container">
                        <div class="box-banner-left">
                            <h1 class="display-2 mb-30 mt-25 neutral-0">Find the perfect service provider</h1>
                            <p class="text-lg neutral-500 mb-55">
                                Welcome to the largest business community in Central Asia! We unite those who are developing business in Uzbekistan with the help of marketing.
                            </p>
                        </div>
                    </div>
                </div>
                {{--          <div class="banner-inner-bottom">--}}
                {{--            <div class="container">--}}
                {{--              <div class="box-joined">--}}
                {{--                <div class="box-authors"><span class="item-author"><img src="assets/imgs/page/homepage1/author.png" alt="Nivia"></span><span class="item-author"><img src="assets/imgs/page/homepage1/author2.png" alt="Nivia"></span><span class="item-author"><img src="assets/imgs/page/homepage1/author3.png" alt="Nivia"></span><span class="item-author"><span class="text-num-author text-md-bold color-brand-2">+2k</span></span></div><span class="text-lg d-inline-block">Join thousands of users in using<br class="d-none d-md-block">the Marketing platform!</span>--}}
                {{--              </div>--}}
                {{--            </div>--}}
                {{--          </div>--}}
            </div>
        </section>
        <section class="section-box wow animate__animated animate__fadeIn box-logos-2">
            <div class="container">
                <div class="carouselTickerLogos2 carouselTicker_vertical" id="slide-logos">
                    <ul class="carouselTicker__list list-logos">
                        @if ($partners->isNotEmpty())
                            @foreach($partners as $partner)
                                <li class="carouselTicker__item">
                                    <div class="item-logo"><img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}"></div>
                                </li>
                            @endforeach
                        @else
                            <p>No partners logos available</p>
                        @endif
                        <li class="carouselTicker__item">
                            <div class="item-logo"><img src="/storage/logos/x-partner.png" alt="chevrolet"></div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-logo"><img src="/storage/logos/chevrolet.png" alt="chevrolet"></div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-logo"><img src="/storage/logos/media.png" alt="chevrolet"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="section-box wow animate__animated animate__fadeIn box-how-it-work">
            <div class="container">
                {{--                <a class="btn btn-brand-4-sm" href="#">How It Works</a>--}}
                <h2 class="mt-35 mb-15 text-center">Direct access to verified service<br class="d-none d-lg-block">providers in 1000+ services.</h2>
                <p class="text-lg neutral-500 mb-45 text-center">Discover the most relevant providers for your project based on your own specific requirements.</p>
                <div class="row">
                    @if ($categories->isNotEmpty())
                        @foreach($categories as $category)
                            <div class="col-lg-4">
                                <div class="box-border-rounded">
                                    <div class="card-casestudy">
                                        <div class="card-title mb-30">
                                            <h6 style="font-size: 22px !important;">
                                                <span class="number">{{ $loop->iteration }}</span>
                                                {{ $category->name }}
                                            </h6>
                                        </div>
                                        <div class="card-desc">
                                            @if ($category->services->isNotEmpty())
                                                @foreach ($category->services as $service)
                                                    <a href="#"><span>{{ $service->name_en }} </span><i class="fa-solid fa-arrow-right"></i></a>
                                                @endforeach
                                            @else
                                                <p>No services available</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No categories available</p>
                    @endif
                </div>
            </div>
            <div class="container mt-25">
                <div class="box-newsletter mb-0"
                     style="background-image: url(https://marketing.uz/uploads/sections/846/original.jpg); background-size: cover; height: 347px;">
                </div>
            </div>
        </section>
        {{--      <section class="section-box wow animate__animated animate__fadeIn box-preparing-2">--}}
        {{--        <div class="container">--}}
        {{--          <div class="text-center">--}}
        {{--            <h2 class="mb-15">Preparing For Your Success,<br class="d-none d-lg-block">We Provide Truly Prominent IT Solutions</h2>--}}
        {{--            <p class="text-lg neutral-700">Nivia is an independent web design studio with a rich history.<br>Founded in 1999, it gathered the best web designers & developers.</p>--}}
        {{--          </div>--}}
        {{--          <div class="row mt-90">--}}
        {{--            <div class="col-lg-4 col-md-6">--}}
        {{--              <div class="card-preparing">--}}
        {{--                <div class="card-image"><img class="wow fadeInUp" src="assets/imgs/page/homepage1/img-prepare.png" alt="Nivia"></div>--}}
        {{--                <div class="card-info">--}}
        {{--                  <h5>Easy Control Panel</h5>--}}
        {{--                  <p class="text-lg neutral-700 w-85 mx-auto">Mastering Your Domain with Effortless Control: Elevate Your Management Experience to New Heights of Ease and Efficiency.</p>--}}
        {{--                </div>--}}
        {{--              </div>--}}
        {{--            </div>--}}
        {{--            <div class="col-lg-4 col-md-6">--}}
        {{--              <div class="card-preparing">--}}
        {{--                <div class="card-image"><img class="wow fadeInUp" src="assets/imgs/page/homepage1/img-prepare2.png" alt="Nivia"></div>--}}
        {{--                <div class="card-info">--}}
        {{--                  <h5>Details Reporting</h5>--}}
        {{--                  <p class="text-lg neutral-700 w-85 mx-auto">Achieve Business Excellence with Comprehensive Details Reporting: The Key to Informed Decision-Making and Strategic Growth</p>--}}
        {{--                </div>--}}
        {{--              </div>--}}
        {{--            </div>--}}
        {{--            <div class="col-lg-4 col-md-6">--}}
        {{--              <div class="card-preparing">--}}
        {{--                <div class="card-image"><img class="wow fadeInUp" src="assets/imgs/page/homepage1/img-prepare3.png" alt="Nivia"></div>--}}
        {{--                <div class="card-info">--}}
        {{--                  <h5>Sales Comparison</h5>--}}
        {{--                  <p class="text-lg neutral-700 w-85 mx-auto">Maximizing Your Data Potential: A Deep Dive into the World of Detailed Reporting for Informed, Strategic Decision-Making</p>--}}
        {{--                </div>--}}
        {{--              </div>--}}
        {{--            </div>--}}
        {{--          </div>--}}
        {{--        </div>--}}
        {{--      </section>--}}
        {{--      <section class="section-box wow animate__animated animate__fadeIn box-our-track-2">--}}
        {{--        <div class="container">--}}
        {{--          <div class="row align-items-center">--}}
        {{--            <div class="col-lg-6 mb-40">--}}
        {{--              <div class="strate-icon"><span></span> Strategies that work</div>--}}
        {{--              <h2 class="heading-2 mb-20">Track the progress towards objectives with key results</h2>--}}
        {{--              <p class="text-lg neutral-700">Nivia is an independent web design studio with a rich history. Founded in 1999, it gathered the best web designers & developers.</p>--}}
        {{--              <div class="row mt-50">--}}
        {{--                <div class="col-lg-12">--}}
        {{--                  <div class="card-feature-2">--}}
        {{--                    <div class="card-image"><img src="assets/imgs/page/homepage3/discover.svg"></div>--}}
        {{--                    <div class="card-info"><a href="#">--}}
        {{--                        <h3 class="text-22-bold">Discover your best and worst performing audiences</h3></a>--}}
        {{--                      <p class="text-md neutral-700">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, iste</p>--}}
        {{--                    </div>--}}
        {{--                  </div>--}}
        {{--                </div>--}}
        {{--                <div class="col-lg-12">--}}
        {{--                  <div class="card-feature-2">--}}
        {{--                    <div class="card-image"><img src="assets/imgs/page/homepage3/keep.svg"></div>--}}
        {{--                    <div class="card-info"><a href="#">--}}
        {{--                        <h3 class="text-22-bold">Keep your team in the loop</h3></a>--}}
        {{--                      <p class="text-md neutral-700">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, iste</p>--}}
        {{--                    </div>--}}
        {{--                  </div>--}}
        {{--                </div>--}}
        {{--              </div>--}}
        {{--              <div class="box-buttons-feature-4"><a class="btn btn-brand-4-medium mr-20" href="#">Subscribe--}}
        {{--                  <svg width="22" height="8" viewbox="0 0 22 8" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
        {{--                    <path d="M22 3.99934L18.4791 0.478516V3.30642H0V4.69236H18.4791V7.52031L22 3.99934Z" fill=""></path>--}}
        {{--                  </svg></a><a class="btn btn-learmore-2" href="#"><span>--}}
        {{--                    <svg width="39" height="38" viewbox="0 0 39 38" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
        {{--                      <rect x="0.5" width="38" height="38" rx="19" fill="#191919"></rect>--}}
        {{--                      <g clip-path="url(#clip0_1_376)">--}}
        {{--                        <path d="M24.1537 16.8139L15.218 25.7497L13.75 24.2817L22.6847 15.3459H14.81V13.2695H26.2301V24.6897H24.1537V16.8139Z" fill="#C5FF55"></path>--}}
        {{--                      </g>--}}
        {{--                      <defs>--}}
        {{--                        <clippath id="clip0_1_376">--}}
        {{--                          <rect width="13" height="13" fill="white" transform="translate(13.5 13)"></rect>--}}
        {{--                        </clippath>--}}
        {{--                      </defs>--}}
        {{--                    </svg></span>Learn More</a></div>--}}
        {{--            </div>--}}
        {{--            <div class="col-lg-6 text-center mb-40">--}}
        {{--              <div class="box-border-image">--}}
        {{--                <div class="box-image-line-1">--}}
        {{--                  <div class="wow fadeInDown img-1" data-wow-delay="0"><img src="assets/imgs/new/marketing_forum.png" alt="Nivia"></div>--}}
        {{--                  <div class="wow fadeInDown img-1" data-wow-delay="0.3s"><img src="assets/imgs/new/tawkent_forum.png" alt="Nivia"></div>--}}
        {{--                </div>--}}
        {{--                <div class="box-image-line-2">--}}
        {{--                  <div class="wow fadeInLeft img-1" data-wow-delay="0"><img src="assets/imgs/new/taf_1.png" alt="Nivia"></div>--}}
        {{--                  <div class="wow fadeInRight img-1" data-wow-delay="0.2s"><img src="assets/imgs/new/yil_brend.png" alt="Nivia"></div>--}}
        {{--                </div>--}}
        {{--                <div class="box-image-line-3">--}}
        {{--                  <div class="wow fadeInUp img-1" data-wow-delay="0"><img src="assets/imgs/new/taf_2.png" alt="Nivia"></div>--}}
        {{--                  <div class="wow fadeInUp img-2" data-wow-delay="0.2s"><img src="assets/imgs/new/d_marketing.png" alt="Nivia"></div>--}}
        {{--                  <div class="wow fadeInUp img-3" data-wow-delay="0.4s"><img src="assets/imgs/page/homepage1/img-track2-chevrolet.png" alt="Nivia"></div>--}}
        {{--                </div>--}}
        {{--              </div>--}}
        {{--            </div>--}}
        {{--          </div>--}}
        {{--        </div>--}}
        {{--      </section>--}}
        <section class="section-box wow animate__animated animate__fadeIn box-preparing-3">
            <div class="container">
                <div class="text-center">
                    <h2 class="neutral-0 mb-20">Why our customers enjoy Sortlist.</h2>
                    <p class="text-lg neutral-700">We help them make the right decision with confidence.</p>
                </div>
                <div class="row mt-90">
                    <div class="col-lg-6 col-md-6">
                        <div class="card-preparing-2"><a class="card-image" href="#">
                                <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium text-client-500 bg-client-200 p-8 rounded-lg css-vubbuv" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="EmojiObjectsTwoToneIcon" style="font-size:2.5rem">
                                    <path d="M10 18h4v1h-4zm0-2h4v1h-4z" opacity=".3"></path>
                                    <path d="M12 3c-.46 0-.93.04-1.4.14-2.76.53-4.96 2.76-5.48 5.52-.48 2.61.48 5.01 2.22 6.56.43.38.66.91.66 1.47V19c0 1.1.9 2 2 2h.28c.35.6.98 1 1.72 1s1.38-.4 1.72-1H14c1.1 0 2-.9 2-2v-2.31c0-.55.22-1.09.64-1.46C18.09 13.95 19 12.08 19 10c0-3.87-3.13-7-7-7zm2 16h-4v-1h4v1zm0-2h-4v-1h4v1zm1.31-3.26c-.09.08-.16.18-.24.26H8.92c-.08-.09-.15-.19-.24-.27-1.32-1.18-1.91-2.94-1.59-4.7.36-1.94 1.96-3.55 3.89-3.93.34-.07.68-.1 1.02-.1 2.76 0 5 2.24 5 5 0 1.43-.61 2.79-1.69 3.74z"></path>
                                    <path d="M11.5 11h1v3h-1z"></path>
                                    <path d="m9.6724 9.5808.7071-.7071 2.1214 2.1213-.7071.7071z"></path>
                                    <path d="m12.2081 11.7124-.707-.7071 2.1212-2.1214.7071.7072z"></path>
                                </svg></a>
                            <div class="card-info"><a href="#">
                                    <h5 class="text-22-bold">The best of data & AI</h5></a>
                                <p class="text-md neutral-700">Our accurate market data helps them make the most informed decision possible. That means they find the provider that suits them best.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card-preparing-2"><a class="card-image" href="#">
                                <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium text-client-500 bg-client-200 p-8 rounded-lg css-vubbuv" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="HandshakeTwoToneIcon" style="font-size:2.5rem"><path d="M12.22 19.85c-.18.18-.5.21-.71 0-.18-.18-.21-.5 0-.71l3.39-3.39-1.41-1.41-3.39 3.39c-.19.2-.51.19-.71 0-.21-.21-.18-.53 0-.71l3.39-3.39-1.41-1.41-3.39 3.39c-.18.18-.5.21-.71 0-.19-.19-.19-.51 0-.71l3.39-3.39-1.42-1.41-3.39 3.39c-.18.18-.5.21-.71 0-.19-.2-.19-.51 0-.71L9.52 8.4l1.87 1.86c.95.95 2.59.94 3.54 0 .98-.98.98-2.56 0-3.54l-1.86-1.86.28-.28c.78-.78 2.05-.78 2.83 0l4.24 4.24c.78.78.78 2.05 0 2.83l-8.2 8.2z" opacity=".3"></path><path d="M12.22 19.85c-.18.18-.5.21-.71 0-.18-.18-.21-.5 0-.71l3.39-3.39-1.41-1.41-3.39 3.39c-.19.2-.51.19-.71 0-.21-.21-.18-.53 0-.71l3.39-3.39-1.41-1.41-3.39 3.39c-.18.18-.5.21-.71 0-.19-.19-.19-.51 0-.71l3.39-3.39-1.42-1.41-3.39 3.39c-.18.18-.5.21-.71 0-.19-.2-.19-.51 0-.71L9.52 8.4l1.87 1.86c.95.95 2.59.94 3.54 0 .98-.98.98-2.56 0-3.54l-1.86-1.86.28-.28c.78-.78 2.05-.78 2.83 0l4.24 4.24c.78.78.78 2.05 0 2.83l-8.2 8.2zm9.61-6.78c1.56-1.56 1.56-4.09 0-5.66l-4.24-4.24c-1.56-1.56-4.09-1.56-5.66 0l-.28.28-.28-.28c-1.56-1.56-4.09-1.56-5.66 0L2.17 6.71C.75 8.13.62 10.34 1.77 11.9l1.45-1.45c-.39-.75-.26-1.7.37-2.33l3.54-3.54c.78-.78 2.05-.78 2.83 0l3.56 3.56c.18.18.21.5 0 .71-.21.21-.53.18-.71 0L9.52 5.57l-5.8 5.79c-.98.97-.98 2.56 0 3.54.39.39.89.63 1.42.7.07.52.3 1.02.7 1.42.4.4.9.63 1.42.7.07.52.3 1.02.7 1.42.4.4.9.63 1.42.7.07.54.31 1.03.7 1.42.47.47 1.1.73 1.77.73.67 0 1.3-.26 1.77-.73l8.21-8.19z"></path></svg></a>
                            <div class="card-info"><a href="#">
                                    <h5 class="text-22-bold">Proven to be efficient</h5></a>
                                <p class="text-md neutral-700">
                                    Every day, thousands of businesses all around the world are writing new business stories with our providers. A powerful and seamless process.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card-preparing-2"><a class="card-image" href="#">
                                <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium text-client-500 bg-client-200 p-8 rounded-lg css-vubbuv" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="BoltTwoToneIcon" style="font-size:2.5rem"><path d="M11 21h-1l1-7H7.5c-.88 0-.33-.75-.31-.78C8.48 10.94 10.42 7.54 13.01 3h1l-1 7h3.51c.4 0 .62.19.4.66C12.97 17.55 11 21 11 21z"></path></svg></a>
                            <div class="card-info">
                                <a href="#">
                                    <h5 class="text-22-bold">Simple, quick & agile process</h5>
                                </a>
                                <p class="text-md neutral-700">
                                    In minutes, you can access a tailor-made selection of providers that fit your needs and criteria.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card-preparing-2"><a class="card-image" href="#">
                                <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium text-client-500 bg-client-200 p-8 rounded-lg css-vubbuv" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="EmojiPeopleTwoToneIcon" style="font-size:40px"><circle cx="12" cy="4" r="2"></circle><path d="M15.89 8.11C15.5 7.72 14.83 7 13.53 7h-2.54C8.24 6.99 6 4.75 6 2H4c0 3.16 2.11 5.84 5 6.71V22h2v-6h2v6h2V10.05L18.95 14l1.41-1.41-4.47-4.48z"></path></svg>
                            </a>
                            <div class="card-info"><a href="#">
                                    <h5 class="text-22-bold">A human touch</h5></a>
                                <p class="text-md neutral-700">Customers can count on our team of experts throughout the process, available whenever they need. That combines the performance of data, and the irreplaceable human touch: efficiency with a human face.

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box wow animate__animated animate__fadeIn box-discover" style="background-color: #e7f4ee">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 mt-60 mb-45">
                        <h2 class="text-center p-16">Join the greatest community of service providers</h2>
                        {{--                  <p class="text-lg neutral-500">Bole nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo conididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>--}}
                        {{--              <div class="box-buttons-feature-4"><a class="btn btn-brand-4-medium mr-20" href="#">Subscribe--}}
                        {{--                  <svg width="22" height="8" viewbox="0 0 22 8" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                        {{--                    <path d="M22 3.99934L18.4791 0.478516V3.30642H0V4.69236H18.4791V7.52031L22 3.99934Z" fill=""></path>--}}
                        {{--                  </svg></a><a class="btn btn-learmore-2" href="#"><span>--}}
                        {{--                    <svg width="39" height="38" viewbox="0 0 39 38" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                        {{--                      <rect x="0.5" width="38" height="38" rx="19" fill="#191919"></rect>--}}
                        {{--                      <g clip-path="url(#clip0_1_376)">--}}
                        {{--                        <path d="M24.1537 16.8139L15.218 25.7497L13.75 24.2817L22.6847 15.3459H14.81V13.2695H26.2301V24.6897H24.1537V16.8139Z" fill="#C5FF55"></path>--}}
                        {{--                      </g>--}}
                        {{--                      <defs>--}}
                        {{--                        <clippath id="clip0_1_376">--}}
                        {{--                          <rect width="13" height="13" fill="white" transform="translate(13.5 13)"></rect>--}}
                        {{--                        </clippath>--}}
                        {{--                      </defs>--}}
                        {{--                    </svg></span>Learn More</a>--}}
                        {{--              </div>--}}
                        {{--              <div class="box-reviews-home5">--}}
                        {{--                <div class="box-swiper">--}}
                        {{--                  <div class="swiper-container swiper-group-1">--}}
                        {{--                    <div class="swiper-wrapper">--}}
                        {{--                      <div class="swiper-slide">--}}
                        {{--                        <div class="item-review-discover">--}}
                        {{--                          <p class="text-lg">I've been working with this digital marketing agency for several months now, and I'm genuinely thrilled with the results. Their team has a deep understanding of SEO and social media marketing.</p>--}}
                        {{--                          <div class="box-author-review">--}}
                        {{--                            <div class="box-author"><a href="#"><img src="assets/imgs/page/homepage1/author.png" alt="Nivia"></a>--}}
                        {{--                              <div class="author-info"><a href="#"><span class="author-name">Guy Hawkins</span></a><span class="text-sm color-600 department">Apple JSC</span></div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="author-brand"><a href="#"><img src="assets/imgs/page/homepage1/mint.png" alt="Nivia"></a></div>--}}
                        {{--                          </div>--}}
                        {{--                        </div>--}}
                        {{--                      </div>--}}
                        {{--                      <div class="swiper-slide">--}}
                        {{--                        <div class="item-review-discover">--}}
                        {{--                          <p class="text-lg">Their communication is exceptional; they keep me informed about progress and collaborate closely to ensure the best outcomes. If you're looking for a digital marketing agency, these folks are the real deal.</p>--}}
                        {{--                          <div class="box-author-review">--}}
                        {{--                            <div class="box-author"><a href="#"><img src="assets/imgs/page/homepage1/author2.png" alt="Nivia"></a>--}}
                        {{--                              <div class="author-info"><a href="#"><span class="author-name">Rosie Jane</span></a><span class="text-sm color-600 department">Apple JSC</span></div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="author-brand"><a href="#"><img src="assets/imgs/page/homepage1/logo6.png" alt="Nivia"></a></div>--}}
                        {{--                          </div>--}}
                        {{--                        </div>--}}
                        {{--                      </div>--}}
                        {{--                    </div>--}}
                        {{--                  </div>--}}
                        {{--                </div>--}}
                        {{--              </div>--}}
                    </div>
                    <div class="row align-items-center texts">
                        <div class="col-lg-6 mb-30">
                            <h2 class="mt-80">Drive revenue like never before.</h2>
                            <p class="text-lg neutral-500">Every month, more than 300k people search, compare, and hire service providers like yours on Sortlist.</p>
                            <div class="box-buttons-feature-4">
                                {{--                          <a class="btn btn-brand-4-medium mr-20" href="#">Subscribe--}}
                                {{--                              <svg width="22" height="8" viewbox="0 0 22 8" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                                {{--                                  <path d="M22 3.99934L18.4791 0.478516V3.30642H0V4.69236H18.4791V7.52031L22 3.99934Z" fill=""></path>--}}
                                {{--                              </svg>--}}
                                {{--                          </a>--}}
                                <a class="btn btn-learmore-2" href="/providers">
                              <span>
                                  <svg width="39" height="38" viewbox="0 0 39 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <rect x="0.5" width="38" height="38" rx="19" fill="#191919"></rect>
                                      <g clip-path="url(#clip0_1_376)">
                                        <path d="M24.1537 16.8139L15.218 25.7497L13.75 24.2817L22.6847 15.3459H14.81V13.2695H26.2301V24.6897H24.1537V16.8139Z" fill="#C5FF55"></path>
                                      </g>
                                      <defs>
                                        <clippath id="clip0_1_376">
                                          <rect width="13" height="13" fill="white" transform="translate(13.5 13)"></rect>
                                        </clippath>
                                      </defs>
                                    </svg>
                              </span>Learn More
                                </a>
                            </div>
                            <div class="box-reviews-home5">
                                <div class="box-swiper">
                                    <div class="swiper-container swiper-group-1">
                                        <div class="swiper-wrapper">
                                            {{--                                      <div class="swiper-slide">--}}
                                            {{--                                          <div class="item-review-discover">--}}
                                            {{--                                              <p class="text-lg">I've been working with this digital marketing agency for several months now, and I'm genuinely thrilled with the results. Their team has a deep understanding of SEO and social media marketing.</p>--}}
                                            {{--                                              <div class="box-author-review">--}}
                                            {{--                                                  <div class="box-author"><a href="#"><img src="assets/imgs/page/homepage1/author.png" alt="Nivia"></a>--}}
                                            {{--                                                      <div class="author-info"><a href="#"><span class="author-name">Guy Hawkins</span></a><span class="text-sm color-600 department">Apple JSC</span></div>--}}
                                            {{--                                                  </div>--}}
                                            {{--                                                  <div class="author-brand"><a href="#"><img src="assets/imgs/page/homepage1/mint.png" alt="Nivia"></a></div>--}}
                                            {{--                                              </div>--}}
                                            {{--                                          </div>--}}
                                            {{--                                      </div>--}}
                                            {{--                                      <div class="swiper-slide">--}}
                                            {{--                                          <div class="item-review-discover">--}}
                                            {{--                                              <p class="text-lg">Their communication is exceptional; they keep me informed about progress and collaborate closely to ensure the best outcomes. If you're looking for a digital marketing agency, these folks are the real deal.</p>--}}
                                            {{--                                              <div class="box-author-review">--}}
                                            {{--                                                  <div class="box-author"><a href="#"><img src="assets/imgs/page/homepage1/author2.png" alt="Nivia"></a>--}}
                                            {{--                                                      <div class="author-info"><a href="#"><span class="author-name">Rosie Jane</span></a><span class="text-sm color-600 department">Apple JSC</span></div>--}}
                                            {{--                                                  </div>--}}
                                            {{--                                                  <div class="author-brand"><a href="#"><img src="assets/imgs/page/homepage1/logo6.png" alt="Nivia"></a></div>--}}
                                            {{--                                              </div>--}}
                                            {{--                                          </div>--}}
                                            {{--                                      </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-30">
                            <div class="box-image-neutral-1000">
                                <img src="/assets/imgs/page/homepage1/marketing.webp" alt="marketing" style="width: 100%;height: 100%;border-radius: 20px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--      <section class="section-box box-why-trusted box-why-trusted-black">--}}
        {{--        <div class="container">--}}
        {{--          <div class="row align-items-end">--}}
        {{--            <div class="col-lg-4 mb-30">--}}
        {{--              <h2 class="text-32-bold">See why we are<br class="d-none d-lg-block"> trusted the world over</h2>--}}
        {{--            </div>--}}
        {{--            <div class="col-lg-8 mb-30">--}}
        {{--              <div class="box-numbers">--}}
        {{--                <div class="item-number">--}}
        {{--                  <h3 class="heading-2"><span class="count">469</span><span>k</span></h3>--}}
        {{--                  <p class="text-xl neutral-700">Social followers</p>--}}
        {{--                </div>--}}
        {{--                <div class="item-number">--}}
        {{--                  <h3 class="heading-2"><span class="count">25</span><span>k+</span></h3>--}}
        {{--                  <p class="text-xl neutral-700">Happy Clients</p>--}}
        {{--                </div>--}}
        {{--                <div class="item-number">--}}
        {{--                  <h3 class="heading-2"><span class="count">756</span><span>+</span></h3>--}}
        {{--                  <p class="text-xl neutral-700">Projects Done</p>--}}
        {{--                </div>--}}
        {{--                <div class="item-number">--}}
        {{--                  <h3 class="heading-2"><span class="count">100</span><span>+</span></h3>--}}
        {{--                  <p class="text-xl neutral-700">Global branches</p>--}}
        {{--                </div>--}}
        {{--              </div>--}}
        {{--            </div>--}}
        {{--          </div>--}}
        {{--        </div>--}}
        {{--      </section>--}}
        {{--      <section class="section-box wow animate__animated animate__fadeIn box-testimonials-3">--}}
        {{--        <div class="container">--}}
        {{--          <div class="row">--}}
        {{--            <div class="col-lg-6 mb-30"><img src="assets/imgs/page/homepage1/img-testimonial.png" alt="Nivia"></div>--}}
        {{--            <div class="col-lg-6 mb-30">--}}
        {{--              <div class="row align-items-end">--}}
        {{--                <div class="col-lg-8 mb-50"><a class="btn btn-brand-4-sm" href="#">Testimonials</a>--}}
        {{--                  <h3 class="mt-20 neutral-0">Here’s Why Our Customers Love Us</h3>--}}
        {{--                </div>--}}
        {{--                <div class="col-lg-4 mb-50">--}}
        {{--                  <div class="box-button-slider box-button-slider-black">--}}
        {{--                    <div class="swiper-button-prev swiper-button-prev-testimonials swiper-button-prev-3">--}}
        {{--                      <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
        {{--                        <path d="M6.66667 3.33398L2 8.00065M2 8.00065L6.66667 12.6673M2 8.00065H14" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>--}}
        {{--                      </svg>--}}
        {{--                    </div>--}}
        {{--                    <div class="swiper-button-next swiper-button-next-testimonials swiper-button-next-3">--}}
        {{--                      <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
        {{--                        <path d="M9.33333 3.33398L14 8.00065M14 8.00065L9.33333 12.6673M14 8.00065H2" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>--}}
        {{--                      </svg>--}}
        {{--                    </div>--}}
        {{--                  </div>--}}
        {{--                </div>--}}
        {{--              </div>--}}
        {{--              <div class="box-swiper mt-30">--}}
        {{--                <div class="swiper-container swiper-group-1">--}}
        {{--                  <div class="swiper-wrapper">--}}
        {{--                    <div class="swiper-slide">--}}
        {{--                      <div class="card-testimonial-3">--}}
        {{--                        <div class="card-image"><img src="assets/imgs/page/homepage1/img-review.png" alt="Nivia"></div>--}}
        {{--                        <div class="card-info">--}}
        {{--                          <p class="text-md neutral-500">“As a long-time user of Nivia Platform's digital marketing, I can confidently attest to the outstanding quality and reliability they offer. ”</p>--}}
        {{--                          <div class="card-author-review">--}}
        {{--                            <div class="card-author-info"><span class="author-name">ROBERT FOX</span><span class="author-tag">@Amazon</span></div>--}}
        {{--                            <div class="card-rate"><img src="assets/imgs/page/homepage1/star.svg" alt="Nivia"><img src="assets/imgs/page/homepage1/star.svg" alt="Nivia"><img src="assets/imgs/page/homepage1/star.svg" alt="Nivia"><img src="assets/imgs/page/homepage1/star.svg" alt="Nivia"><img src="assets/imgs/page/homepage1/star.svg" alt="Nivia"></div>--}}
        {{--                          </div>--}}
        {{--                        </div>--}}
        {{--                      </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="swiper-slide">--}}
        {{--                      <div class="card-testimonial-3">--}}
        {{--                        <div class="card-image"><img src="assets/imgs/page/homepage1/img-review-ishonch.png" alt="Nivia"></div>--}}
        {{--                        <div class="card-info">--}}
        {{--                          <p class="text-md neutral-500">“I recently started using Nivia Platform, and the experience has been nothing short of exceptional. From the moment I made my first inquiry, their team has been consistently accommodating and attentive. ”</p>--}}
        {{--                          <div class="card-author-review">--}}
        {{--                            <div class="card-author-info"><span class="author-name">ALAN WALKER</span><span class="author-tag">@Facetime</span></div>--}}
        {{--                            <div class="card-rate"><img src="assets/imgs/page/homepage1/star.svg" alt="Nivia"><img src="assets/imgs/page/homepage1/star.svg" alt="Nivia"><img src="assets/imgs/page/homepage1/star.svg" alt="Nivia"><img src="assets/imgs/page/homepage1/star.svg" alt="Nivia"><img src="assets/imgs/page/homepage1/star.svg" alt="Nivia"></div>--}}
        {{--                          </div>--}}
        {{--                        </div>--}}
        {{--                      </div>--}}
        {{--                    </div>--}}
        {{--                  </div>--}}
        {{--                </div>--}}
        {{--              </div>--}}
        {{--            </div>--}}
        {{--          </div>--}}
        {{--        </div>--}}
        {{--      </section>--}}
        {{--      <section class="section-box box-latest-news box-latest-news-2">--}}
        {{--        <div class="container">--}}
        {{--          <div class="row align-items-end">--}}
        {{--            <div class="col-lg-8 mb-30">--}}
        {{--              <h2 class="heading-2 mb-10">Latest News &amp; Stories</h2>--}}
        {{--              <p class="text-lg neutral-700">Pellentesque at posuere tellus. Ut sed dui justo. Phasellus</p>--}}
        {{--            </div>--}}
        {{--            <div class="col-lg-4 mb-30">--}}
        {{--              <div class="box-button-slider box-button-slider-team justify-content-end">--}}
        {{--                <div class="swiper-button-prev swiper-button-prev-testimonials swiper-button-prev-3">--}}
        {{--                  <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
        {{--                    <path d="M6.66667 3.33398L2 8.00065M2 8.00065L6.66667 12.6673M2 8.00065H14" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>--}}
        {{--                  </svg>--}}
        {{--                </div>--}}
        {{--                <div class="swiper-button-next swiper-button-next-testimonials swiper-button-next-3">--}}
        {{--                  <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
        {{--                    <path d="M9.33333 3.33398L14 8.00065M14 8.00065L9.33333 12.6673M14 8.00065H2" stroke="" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>--}}
        {{--                  </svg>--}}
        {{--                </div>--}}
        {{--              </div>--}}
        {{--            </div>--}}
        {{--          </div>--}}
        {{--          <div class="box-swiper mt-30">--}}
        {{--            <div class="swiper-container swiper-group-3">--}}
        {{--              <div class="swiper-wrapper">--}}
        {{--                <div class="swiper-slide">--}}
        {{--                  <div class="card-news">--}}
        {{--                    <div class="card-image"><a href="blog-post.html"><img src="assets/imgs/page/homepage1/img-news.png" alt="Nivia"></a></div>--}}
        {{--                    <div class="card-info"><a class="heading-4" href="blog-post.html">Now the pain is very important, and the teaching is consistent.</a>--}}
        {{--                      <p class="text-md neutral-700 mt-15 mb-35">Pellentesque at posuere tellus. Ut sed dui justo. Phasellus is scelerisque turpis arcu, ut pulvinar lectus tristique non. Nam laoreet, risus vel laoreet laoreet, mauris</p><a class="btn btn-learmore-2" href="blog-post.html"><span>--}}
        {{--                          <svg width="13" height="13" viewbox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
        {{--                            <g clip-path="url(#clip0_24_999)">--}}
        {{--                              <path d="M10.6557 3.81393L1.71996 12.7497L0.251953 11.2817L9.18664 2.34592H1.31195V0.269531H12.7321V11.6897H10.6557V3.81393Z" fill="#191919"></path>--}}
        {{--                            </g>--}}
        {{--                            <defs>--}}
        {{--                              <clippath id="clip0_24_999">--}}
        {{--                                <rect width="13" height="13" fill="white"></rect>--}}
        {{--                              </clippath>--}}
        {{--                            </defs>--}}
        {{--                          </svg></span>Learn More</a>--}}
        {{--                    </div>--}}
        {{--                  </div>--}}
        {{--                </div>--}}
        {{--                <div class="swiper-slide">--}}
        {{--                  <div class="card-news">--}}
        {{--                    <div class="card-image"><a href="blog-post.html"><img src="assets/imgs/page/homepage1/img-news2.png" alt="Nivia"></a></div>--}}
        {{--                    <div class="card-info"><a class="heading-4" href="blog-post.html">The behavior of the pain itself is important, consistent with</a>--}}
        {{--                      <p class="text-md neutral-700 mt-15 mb-35">Pellentesque at posuere tellus. Ut sed dui justo. Phasellus is scelerisque turpis arcu, ut pulvinar lectus tristique non. Nam laoreet, risus vel laoreet laoreet, mauris</p><a class="btn btn-learmore-2" href="blog-post.html"><span>--}}
        {{--                          <svg width="13" height="13" viewbox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
        {{--                            <g clip-path="url(#clip0_24_999)">--}}
        {{--                              <path d="M10.6557 3.81393L1.71996 12.7497L0.251953 11.2817L9.18664 2.34592H1.31195V0.269531H12.7321V11.6897H10.6557V3.81393Z" fill="#191919"></path>--}}
        {{--                            </g>--}}
        {{--                            <defs>--}}
        {{--                              <clippath id="clip0_24_999">--}}
        {{--                                <rect width="13" height="13" fill="white"></rect>--}}
        {{--                              </clippath>--}}
        {{--                            </defs>--}}
        {{--                          </svg></span>                                            Learn More</a>--}}
        {{--                    </div>--}}
        {{--                  </div>--}}
        {{--                </div>--}}
        {{--                <div class="swiper-slide">--}}
        {{--                  <div class="card-news">--}}
        {{--                    <div class="card-image"><a href="blog-post.html"><img src="assets/imgs/page/homepage1/img-news3.png" alt="Nivia"></a></div>--}}
        {{--                    <div class="card-info"><a class="heading-4" href="blog-post.html">How startups can improve their chances of getting financing</a>--}}
        {{--                      <p class="text-md neutral-700 mt-15 mb-35">Pellentesque at posuere tellus. Ut sed dui justo. Phasellus is scelerisque turpis arcu, ut pulvinar lectus tristique non. Nam laoreet, risus vel laoreet laoreet, mauris</p><a class="btn btn-learmore-2" href="blog-post.html"><span>--}}
        {{--                          <svg width="13" height="13" viewbox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
        {{--                            <g clip-path="url(#clip0_24_999)">--}}
        {{--                              <path d="M10.6557 3.81393L1.71996 12.7497L0.251953 11.2817L9.18664 2.34592H1.31195V0.269531H12.7321V11.6897H10.6557V3.81393Z" fill="#191919"></path>--}}
        {{--                            </g>--}}
        {{--                            <defs>--}}
        {{--                              <clippath id="clip0_24_999">--}}
        {{--                                <rect width="13" height="13" fill="white"></rect>--}}
        {{--                              </clippath>--}}
        {{--                            </defs>--}}
        {{--                          </svg></span>                                            Learn More</a>--}}
        {{--                    </div>--}}
        {{--                  </div>--}}
        {{--                </div>--}}
        {{--              </div>--}}
        {{--            </div>--}}
        {{--          </div>--}}
        {{--        </div>--}}
        {{--      </section>--}}
    </main>
@endsection
