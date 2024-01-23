<div class="socials flex flex-column md:flex hidden">
    <button type="button" class="text-white  font-medium  text-sm  text-center inline-flex items-center" id="social">
        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" fill="none">
            <g filter="url(#filter0_d_312_1281)">
                <circle cx="19" cy="18" r="18" fill="#F7F7F7"/>
                <path d="M28 18.5C28.0034 19.8199 27.6951 21.1219 27.1 22.3C26.3944 23.7118 25.3098 24.8992 23.9674 25.7293C22.6251 26.5594 21.0782 26.9994 19.5 27C18.1801 27.0035 16.8781 26.6951 15.7 26.1L10 28L11.9 22.3C11.3049 21.1219 10.9966 19.8199 11 18.5C11.0006 16.9218 11.4406 15.3749 12.2707 14.0326C13.1008 12.6903 14.2883 11.6056 15.7 10.9C16.8781 10.305 18.1801 9.99659 19.5 10H20C22.0843 10.115 24.053 10.9948 25.5291 12.4709C27.0052 13.947 27.885 15.9157 28 18V18.5Z" stroke="#A1A1A1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
                <filter id="filter0_d_312_1281" x="0" y="0" width="38" height="38" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="1"/>
                    <feGaussianBlur stdDeviation="0.5"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_312_1281"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_312_1281" result="shape"/>
                </filter>
            </defs>
        </svg>
        <span class="sr-only">Icon description</span>
    </button>
    <button type="button" id="zalo" class="text-white bg-white font-medium  text-sm  text-center inline-flex items-center hidden">
        <img class="w-[25px]" src="{{ asset('assets/images/icons/icon_zalo.png') }}" alt="{{ 'social.zalo' }}">
    </button>
    <button type="button" id="messenger" class="text-white bg-white font-medium  text-sm  text-center inline-flex items-center hidden">
        <img class="w-[35px]" src="{{ asset('assets/images/icons/icon_messenger.png') }}" alt="{{ 'social.message' }}">
    </button>
    <button type="button" id="close_social" class="text-white bg-white font-medium text-sm  text-center inline-flex items-center hidden">
        <svg class="w-3 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">Icon description</span>
    </button>
</div>
