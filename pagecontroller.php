<?php
// ================================================================
// app/Controllers/PageController.php
// Falhan EMS - Page Controller
// ================================================================
// Kazi: Kudhibiti kurasa za umma (splash, landing, about, contact, n.k)
// ================================================================

namespace App\Controllers;

class PageController
{
    /**
     * SPLASH PAGE - Ukurasa wa kwanza unaoonekana
     * Ina video background, loading animation, auto-redirect
     */
    public function splash()
    {
        // If user already logged in, go to dashboard
        if (isLoggedIn()) {
            header('Location: ' . url('/dashboard'));
            exit;
        }
        
        // Include splash view
        include VIEWS_PATH . '/splash.php';
    }
    
    /**
     * LANDING PAGE - Ukurasa wa kukaribisha wageni
     * Ina hero section, features, stats, CTA
     */
    public function landing()
    {
        // If user already logged in, go to dashboard
        if (isLoggedIn()) {
            header('Location: ' . url('/dashboard'));
            exit;
        }
        
        // Include landing view
        include VIEWS_PATH . '/landing.php';
    }
    
    /**
     * ABOUT PAGE - Kuhusu mfumo
     * Inaelezea historia, maono, na lengo la Falhan EMS
     */
    public function about()
    {
        $data = [
            'page_title' => 'Kuhusu Falhan EMS',
            'description' => 'Falhan EMS ni mfumo wa usimamizi wa elimu uliotengenezwa Tanzania.'
        ];
        
        include VIEWS_PATH . '/about.php';
    }
    
    /**
     * CONTACT PAGE - Wasiliana nasi
     * Ina maelezo ya mawasiliano: simu, barua pepe, anwani
     */
    public function contact()
    {
        $data = [
            'page_title' => 'Wasiliana Nasi',
            'phone' => '+255 712 345 678',
            'email' => 'info@falhan.com',
            'address' => 'Dar es Salaam, Tanzania'
        ];
        
        include VIEWS_PATH . '/contact.php';
    }
    
    /**
     * FEATURES PAGE - Vipengele vyetu
     * Inaorodhesha vipengele vyote vya mfumo
     */
    public function features()
    {
        $features = [
            [
                'icon' => 'fa-school',
                'title' => 'Usimamizi wa Shule',
                'desc' => 'Simamia wanafunzi, walimu, madarasa, mahudhurio na alama zote kwa urahisi.'
            ],
            [
                'icon' => 'fa-chart-line',
                'title' => 'Ripoti na Takwimu',
                'desc' => 'Pata ripoti za kina za matokeo, mahudhurio, na utendaji wa shule zako.'
            ],
            [
                'icon' => 'fa-bolt',
                'title' => 'Falhan Entry System',
                'desc' => 'Ingiza alama kwa haraka kwa kutumia mfumo wetu wa kipekee wa kuingiza kwa koma.'
            ],
            [
                'icon' => 'fa-shield-alt',
                'title' => 'Usalama wa Data',
                'desc' => 'Data zako zinalindwa kwa viwango vya juu vya usalama na backup za mara kwa mara.'
            ],
            [
                'icon' => 'fa-mobile-alt',
                'title' => 'Inafanya Kazi Simu',
                'desc' => 'Fikia mfumo kutoka simu, kompyuta, au kompyuta kibao popote ulipo.'
            ],
            [
                'icon' => 'fa-handshake',
                'title' => 'Imetengenezwa Tanzania',
                'desc' => 'Mfumo umeundwa mahsusi kukidhi mahitaji ya mfumo wa elimu wa Tanzania.'
            ]
        ];
        
        include VIEWS_PATH . '/features.php';
    }
    
    /**
     * PRICING PAGE - Bei na Mpango
     * Inaonyesha bei za mipango mbalimbali
     */
    public function pricing()
    {
        $plans = [
            [
                'name' => 'Basic',
                'price' => 'TSh 50,000',
                'period' => 'kwa mwezi',
                'features' => ['Shule 1', 'Wanafunzi 500', 'Walimu 50', 'Ripoti za Msingi'],
                'is_featured' => false,
                'button_text' => 'Anza Sasa'
            ],
            [
                'name' => 'Standard',
                'price' => 'TSh 150,000',
                'period' => 'kwa mwezi',
                'features' => ['Shule 3', 'Wanafunzi 2,000', 'Walimu 100', 'Ripoti za Kina', 'SMS'],
                'is_featured' => true,
                'button_text' => 'Anza Sasa'
            ],
            [
                'name' => 'Premium',
                'price' => 'TSh 300,000',
                'period' => 'kwa mwezi',
                'features' => ['Shule 10', 'Wanafunzi 10,000', 'Walimu 500', 'Ripoti za Juu', 'SMS + API'],
                'is_featured' => false,
                'button_text' => 'Anza Sasa'
            ],
            [
                'name' => 'Enterprise',
                'price' => 'TSh 1,000,000',
                'period' => 'kwa mwezi',
                'features' => ['Shule Zote', 'Wanafunzi Wote', 'Walimu Wote', 'Ripoti Maalum', 'Kila Kitu'],
                'is_featured' => false,
                'button_text' => 'Wasiliana'
            ]
        ];
        
        include VIEWS_PATH . '/pricing.php';
    }
    
    /**
     * TERMS PAGE - Masharti na Sheria
     */
    public function terms()
    {
        include VIEWS_PATH . '/terms.php';
    }
    
    /**
     * PRIVACY PAGE - Sera ya Faragha
     */
    public function privacy()
    {
        include VIEWS_PATH . '/privacy.php';
    }
    
    /**
     * HELP PAGE - Msaada na Maelekezo
     */
    public function help()
    {
        include VIEWS_PATH . '/help.php';
    }
    
    /**
     * DOCS PAGE - Maelekezo ya Matumizi
     */
    public function docs()
    {
        include VIEWS_PATH . '/docs.php';
    }
    
    /**
     * 404 PAGE - Ukurasa Haupatikani
     */
    public function notFound()
    {
        http_response_code(404);
        include VIEWS_PATH . '/errors/404.php';
    }
}

// ================================================================
// MWISHO WA FAILI
// ================================================================
?>