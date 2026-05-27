<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" {{ $attributes }}>
    <defs>
        <!-- Luxury Gold Gradient -->
        <linearGradient id="gold-grad" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="#AA771C" />
            <stop offset="25%" stop-color="#FCF6BA" />
            <stop offset="50%" stop-color="#B38728" />
            <stop offset="75%" stop-color="#FBF5B7" />
            <stop offset="100%" stop-color="#AA771C" />
        </linearGradient>
        
        <!-- Soft Inner Glow -->
        <radialGradient id="glow" cx="50%" cy="50%" r="50%">
            <stop offset="0%" stop-color="#FCF6BA" stop-opacity="0.6" />
            <stop offset="100%" stop-color="#B38728" stop-opacity="0" />
        </radialGradient>
    </defs>

    <!-- Outer Golden Crest Circle -->
    <circle cx="50" cy="50" r="46" fill="none" stroke="url(#gold-grad)" stroke-width="2.5" />
    <circle cx="50" cy="50" r="41" fill="none" stroke="url(#gold-grad)" stroke-dasharray="2 3" stroke-width="1" opacity="0.8" />
    
    <!-- Subtle Inner Glow -->
    <circle cx="50" cy="50" r="40" fill="url(#glow)" opacity="0.3" />
    
    <!-- Piggy Bank & Gold Coin Path (Elegant & Modern Lines) -->
    <g stroke="url(#gold-grad)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" fill="none">
        <!-- Coin entering the slot -->
        <path d="M 50 20 L 50 30" stroke-width="2.5" />
        <circle cx="50" cy="15" r="5" fill="none" stroke-width="2" />
        
        <!-- Piggy Body -->
        <path d="M 32 38 C 25 38 21 45 21 52 C 21 62 29 68 38 68 L 38 73 C 38 75 42 75 42 73 L 42 68 L 58 68 L 58 73 C 58 75 62 75 62 73 L 62 68 C 71 67 79 61 79 52 C 79 49 77 47 75 46" />
                 
        <!-- Pig Snout -->
        <path d="M 79 52 C 82 52 83 49 81 47 C 79 46 79 44 76 44" />
        
        <!-- Ear -->
        <path d="M 68 39 L 72 28 C 73 26 75 27 75 29 L 73 40" />
        
        <!-- Tail -->
        <path d="M 21 52 C 17 51 16 54 18 56 C 20 58 18 60 16 59" />

        <!-- Piggy Eye -->
        <circle cx="64" cy="45" r="1.5" fill="url(#gold-grad)" stroke="none" />
    </g>

    <!-- Sparkles -->
    <path d="M 76 22 Q 80 22 80 18 Q 80 22 84 22 Q 80 22 80 26 Q 80 22 76 22 Z" fill="url(#gold-grad)" />
    <path d="M 18 66 Q 21 66 21 62 Q 21 66 24 66 Q 21 66 21 70 Q 21 66 18 66 Z" fill="url(#gold-grad)" />
</svg>
