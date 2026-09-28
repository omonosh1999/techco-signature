<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use App\Models\SiteItem;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->content();
        $this->items();

        SiteContent::flush();
        SiteItem::flush();
    }

    /**
     * Single editable strings, grouped by the section of the page they appear in.
     */
    private function content(): void
    {
        $fields = [
            // -- Brand / global ------------------------------------------------
            ['brand.name', 'brand', 'Company name', 'text', 'TechCo Signature'],
            ['brand.tagline', 'brand', 'Tagline', 'text', 'Trained first. Then hired.'],

            // -- Navigation ----------------------------------------------------
            ['nav.link_1', 'nav', 'Menu item 1', 'text', 'How it works'],
            ['nav.link_2', 'nav', 'Menu item 2', 'text', 'What we do'],
            ['nav.link_3', 'nav', 'Menu item 3', 'text', 'Programmes'],
            ['nav.link_4', 'nav', 'Menu item 4', 'text', 'Join us'],
            ['nav.login', 'nav', 'Log in button', 'text', 'Log in'],
            ['nav.signup', 'nav', 'Sign up button', 'text', 'Get started'],

            // -- Hero ----------------------------------------------------------
            ['hero.eyebrow', 'hero', 'Small label above headline', 'text', 'Recruitment · Training · Branding · Digital media'],
            ['hero.line1', 'hero', 'Headline line 1', 'text', 'TRAINED'],
            ['hero.line2', 'hero', 'Headline line 2', 'text', 'FIRST.'],
            ['hero.line3', 'hero', 'Headline line 3', 'text', 'THEN HIRED.'],
            ['hero.body', 'hero', 'Paragraph under the headline', 'textarea', 'Most agencies send your CV and hope. We rebuild it with you, put you through a real interview first, and only then introduce you to an employer.'],
            ['hero.cta_primary', 'hero', 'Main button', 'text', 'I want a job'],
            ['hero.cta_secondary', 'hero', 'Second button', 'text', 'I want to refer people'],

            // -- Trust strip ---------------------------------------------------
            ['trust.label', 'trust', 'Strip text', 'text', 'We work with ministries, schools, non-profits and growing businesses across Nigeria'],

            // -- Process -------------------------------------------------------
            ['process.eyebrow', 'process', 'Small label', 'text', 'How it works'],
            ['process.heading', 'process', 'Heading', 'text', 'FOUR STEPS. NO GUESSWORK.'],
            ['process.body', 'process', 'Paragraph beside heading', 'textarea', 'You always know where you stand and what happens next. Nobody is left waiting in the dark.'],

            // -- Services ------------------------------------------------------
            ['services.eyebrow', 'services', 'Small label', 'text', 'What we do'],
            ['services.heading', 'services', 'Heading', 'text', 'FOUR THINGS. ONE ROOF.'],
            ['services.body', 'services', 'Paragraph beside heading', 'textarea', 'Most people come to us for one of these. Many stay for three.'],

            // -- Programmes ----------------------------------------------------
            ['programmes.eyebrow', 'programmes', 'Small label', 'text', 'Where to begin'],
            ['programmes.heading', 'programmes', 'Heading', 'text', 'TWO WAYS TO START'],
            ['programmes.link_label', 'programmes', 'Link on each programme card', 'text', 'See what it costs'],

            // -- Fees / trust --------------------------------------------------
            ['fees.heading', 'fees', 'Heading', 'text', 'NO HIDDEN FEES. EVER.'],
            ['fees.body', 'fees', 'Paragraph', 'textarea', 'You see every fee in writing before you pay anything. We charge for training you receive, not for a promise. We never ask a job seeker for a bank account number, a BVN or a card.'],
            ['fees.note', 'fees', 'Small print under the paragraph', 'text', 'Prices are shown when you choose a programme during registration.'],

            // -- Mid band ------------------------------------------------------
            ['band.line1', 'band', 'Big line 1', 'text', 'BE READY.'],
            ['band.line2', 'band', 'Big line 2', 'text', 'BE CHOSEN.'],
            ['band.cta', 'band', 'Button', 'text', 'Start now'],

            // -- Sign-up paths -------------------------------------------------
            ['paths.eyebrow', 'paths', 'Small label', 'text', 'Choose your path'],
            ['paths.heading', 'paths', 'Heading', 'text', 'WHICH ONE ARE YOU?'],

            ['paths.candidate_title', 'paths', 'Job seeker card — title', 'text', 'I am looking for a job'],
            ['paths.candidate_body', 'paths', 'Job seeker card — paragraph', 'textarea', 'Join the Job Readiness Programme. We get you ready, then we introduce you to employers who are hiring.'],
            ['paths.candidate_points', 'paths', 'Job seeker card — list (one per line)', 'textarea', "Your CV rebuilt with you by a real person\nA real mock interview, with honest feedback\nA certificate that is yours to keep\nWe never promise a job. We promise you will be ready."],
            ['paths.candidate_cta', 'paths', 'Job seeker card — button', 'text', 'Start my application'],

            ['paths.agent_title', 'paths', 'Agent card — title', 'text', 'I want to refer people'],
            ['paths.agent_body', 'paths', 'Agent card — paragraph', 'textarea', 'Bring us people who are looking for work. When we place them, you get paid.'],
            ['paths.agent_points', 'paths', 'Agent card — list (one per line)', 'textarea', "Earn commission on every successful placement\nTrack every referral in your own dashboard\nPaid by bank transfer, with a statement each time\nFree to join"],
            ['paths.agent_cta', 'paths', 'Agent card — button', 'text', 'Become an agent'],

            // -- Team ----------------------------------------------------------
            ['team.eyebrow', 'team', 'Small label', 'text', 'Who you deal with'],
            ['team.heading', 'team', 'Heading', 'text', 'THE PEOPLE BEHIND THIS'],

            // -- Testimonials --------------------------------------------------
            ['testimonials.eyebrow', 'testimonials', 'Small label', 'text', 'In their words'],
            ['testimonials.heading', 'testimonials', 'Heading', 'text', 'WHAT PEOPLE SAY'],

            // -- Closing CTA ---------------------------------------------------
            ['cta.heading', 'cta', 'Heading', 'text', 'READY WHEN YOU ARE.'],
            ['cta.body', 'cta', 'Paragraph', 'textarea', 'One conversation. No cost, and no obligation.'],
            ['cta.button', 'cta', 'Button', 'text', 'Get started'],

            // -- Footer / contact ----------------------------------------------
            ['contact.email', 'contact', 'Email address', 'text', 'techco979@gmail.com'],
            ['contact.phone', 'contact', 'Phone / WhatsApp', 'text', '+234 704 484 0134'],
            ['contact.address', 'contact', 'Address', 'text', 'Abuja, Federal Capital Territory, Nigeria'],
            ['contact.hours', 'contact', 'Office hours', 'text', 'Monday to Friday, 9:00am – 5:00pm WAT'],
            ['contact.rc', 'contact', 'RC number', 'text', 'RC 9592495'],
            ['contact.tin', 'contact', 'Tax Identification Number', 'text', 'TIN 2623700950121'],
            ['footer.note', 'contact', 'Footer paragraph', 'textarea', 'TechCo Signature Limited is registered with the Corporate Affairs Commission under the Companies and Allied Matters Act 2020.'],
        ];

        foreach ($fields as $position => [$key, $section, $label, $type, $value]) {
            SiteContent::updateOrCreate(
                ['key' => $key],
                compact('section', 'label', 'type', 'value') + ['position' => $position],
            );
        }
    }

    /**
     * Repeatable blocks — the admin can add, reorder, hide or delete these.
     */
    private function items(): void
    {
        $collections = [
            'stats' => [
                ['value' => 'One to one', 'label' => 'Every candidate is trained by a real person'],
                ['value' => '90 days', 'label' => 'Free replacement guarantee for employers'],
                ['value' => 'Four', 'label' => 'Subjects you can study with us'],
            ],

            'process' => [
                ['number' => '01', 'title' => 'Register', 'body' => 'Tell us who you are. Confirm your email with the code we send you. It takes two minutes.'],
                ['number' => '02', 'title' => 'Get ready', 'body' => 'We rebuild your CV with you. We run a real mock interview. We show you how to present yourself.'],
                ['number' => '03', 'title' => 'Meet the employer', 'body' => 'When a job suits you, we introduce you in writing. You arrive prepared, screened and briefed.'],
                ['number' => '04', 'title' => 'Start work', 'body' => 'You take the job. We check in after 30, 60 and 90 days to make sure it is going well.'],
            ],

            'services' => [
                ['title' => 'Recruitment', 'body' => 'We find you staff who are ready on day one. Every hire comes with a 90-day free replacement.'],
                ['title' => 'Branding', 'body' => 'We work out what your brand stands for, then say it clearly. Research first. Design second.'],
                ['title' => 'Digital marketing', 'body' => 'We run your social media, content and adverts, and report on the numbers that matter to you.'],
                ['title' => 'Branding School', 'body' => 'Learn branding, digital marketing, technology, or English and presentation. Online, month by month.'],
            ],

            'programmes' => [
                ['title' => 'Job Readiness Programme', 'body' => 'We rebuild your CV, put you through a real mock interview, and coach how you present yourself. You finish with a certificate. You get all of it whether or not a job comes.'],
                ['title' => 'TechCo Branding School', 'body' => 'Four subjects, taught online. Take one or take several. Stop at the end of any month you have paid for. No long contract.'],
            ],

            'team' => [
                ['name' => 'Abel Joy Chidinma', 'role' => 'Founder and Chief Executive', 'bio' => 'Brand strategist and registered teacher. She leads our branding, media, recruitment and training work.'],
            ],

            'testimonials' => [],
        ];

        foreach ($collections as $collection => $rows) {
            SiteItem::query()->where('collection', $collection)->delete();

            foreach ($rows as $position => $data) {
                SiteItem::create(compact('collection', 'data', 'position'));
            }
        }
    }
}
